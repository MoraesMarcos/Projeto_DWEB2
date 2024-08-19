<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Avaliacao $model */

$this->title = $model->idAvaliacao;
$this->params['breadcrumbs'][] = ['label' => 'Avaliacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="avaliacao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idAvaliacao' => $model->idAvaliacao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idAvaliacao' => $model->idAvaliacao], [
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
            'idAvaliacao',
            'comentario',
            'nota',
            'idCidade',
            'idUsuario',
            'data',
        ],
    ]) ?>

</div>
