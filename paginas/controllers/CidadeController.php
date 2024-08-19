<?php

namespace app\controllers;

use app\models\Cidade;
use app\models\CidadeSearch;
use yii\web\Controller;
use app\models\Avaliacao;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CidadeController implements the CRUD actions for Cidade model.
 */
class CidadeController extends Controller
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
     * Lists all Cidade models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CidadeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cidade model.
     * @param int $idCidade Id Cidade
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $avaliacoes = Avaliacao::find()->where(['idCidade' => $id])->all();

        return $this->render('view', [
            'avaliacoes' => $avaliacoes,
        ]);
    }

    /**
     * Creates a new Cidade model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Cidade();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idCidade' => $model->idCidade]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cidade model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idCidade Id Cidade
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idCidade)
    {
        $model = $this->findModel($idCidade);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCidade' => $model->idCidade]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cidade model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idCidade Id Cidade
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idCidade)
    {
        $this->findModel($idCidade)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cidade model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idCidade Id Cidade
     * @return Cidade the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCidade)
    {
        if (($model = Cidade::findOne(['idCidade' => $idCidade])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
