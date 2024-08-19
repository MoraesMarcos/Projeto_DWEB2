<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Items $model */

$this->title = $model->idItems;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="items-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idItems' => $model->idItems], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idItems' => $model->idItems], [
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
            'idItems',
            'nome',
            'descricao',
            'imagem',
            'link',
            'idUsuario',
            'idCidade',
        ],
    ]) ?>

</div>
