<?php

use app\models\Cidade;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\CidadeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cidade-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cidade', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCidade',
            'nome',
            'descricao',
            'banner',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cidade $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idCidade' => $model->idCidade]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
