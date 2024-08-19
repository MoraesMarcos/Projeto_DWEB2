<?php

namespace app\controllers;

use app\models\Avaliacao;
use app\models\AvaliacaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AvaliacaoController implements the CRUD actions for Avaliacao model.
 */
class AvaliacaoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Avaliacao models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AvaliacaoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Avaliacao model.
     * @param int $idAvaliacao Id Avaliacao
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idAvaliacao)
    {
        return $this->render('view', [
            'model' => $this->findModel($idAvaliacao),
        ]);
    }

    /**
     * Creates a new Avaliacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Avaliacao();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idAvaliacao' => $model->idAvaliacao]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Avaliacao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idAvaliacao Id Avaliacao
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idAvaliacao)
    {
        $model = $this->findModel($idAvaliacao);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idAvaliacao' => $model->idAvaliacao]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Avaliacao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idAvaliacao Id Avaliacao
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idAvaliacao)
    {
        $this->findModel($idAvaliacao)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Avaliacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idAvaliacao Id Avaliacao
     * @return Avaliacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idAvaliacao)
    {
        if (($model = Avaliacao::findOne(['idAvaliacao' => $idAvaliacao])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
