<?php

namespace app\controllers;

use Yii;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Usuario;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Cidade;
use app\models\Avaliacao;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $cidades = Cidade::find()->all();
        return $this->render('index', [
            'cidades' => $cidades,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        if ($model->hasErrors('email')) {
            $user = Usuario::findOne(['email' => $model->email]);
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRegister()
    {
        $model = new Usuario();

        if ($model->load(Yii::$app->request->post())) {
            $model->cargo = 'USER';

            $maxIdUsuario = Usuario::find()->max('idUsuario');
            $model->idUsuario = $maxIdUsuario + 1;

            $model->uploadedFotoPerfil = UploadedFile::getInstance($model, 'uploadedFotoPerfil');
            if ($model->validate()) {
                if ($model->uploadedFotoPerfil) {
                    $filePath = 'uploads/' . $model->uploadedFotoPerfil->baseName . '.' . $model->uploadedFotoPerfil->extension;
                    if ($model->uploadedFotoPerfil->saveAs($filePath)) {
                        $model->fotoPerfil = $filePath;
                    }
                }

                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', 'Conta criada com sucesso.');
                    return $this->redirect(['login']);
                }
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionAdminPanel()
    {
        $user = Usuario::findOne(Yii::$app->user->id);
        $users = Usuario::find()->where(['!=', 'idUsuario', $user->id])->all();

        return $this->render('admin_panel', [
            'user' => $user,
            'users' => $users,
        ]);
    }


    public function actionCity($id)
    {
        $cidade = Cidade::findOne($id);
        if ($cidade === null) {
            throw new \yii\web\NotFoundHttpException("A cidade com ID $id não foi encontrada.");
        }

        $avaliacoes = Avaliacao::find()->where(['idCidade' => $id])->all();
        $mediaAvaliacoes = Avaliacao::find()->where(['idCidade' => $id])->average('nota');

        return $this->render('city', [
            'cidade' => $cidade,
            'avaliacoes' => $avaliacoes,
            'mediaAvaliacoes' => $mediaAvaliacoes,
        ]);
    }

    public function actionRegister_City()
    {
        return $this->render('register_city');
    }

    public function actionUser()
    {
        return $this->render('user');
    }
}
