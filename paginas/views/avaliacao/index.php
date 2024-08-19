<?php

use app\models\Avaliacao;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\AvaliacaoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Avaliacaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avaliacao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Avaliacao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idAvaliacao',
            'comentario',
            'nota',
            'idCidade',
            'idUsuario',
            //'data',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Avaliacao $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idAvaliacao' => $model->idAvaliacao]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
