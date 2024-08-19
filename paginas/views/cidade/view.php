<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Cidade $model */

$this->title = $model->idCidade;
$this->params['breadcrumbs'][] = ['label' => 'Cidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cidade-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idCidade' => $model->idCidade], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idCidade' => $model->idCidade], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idCidade',
            'nome',
            'descricao',
            'banner',
        ],
    ]) ?>

</div>
