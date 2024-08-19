<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Avaliacao $model */

$this->title = 'Update Avaliacao: ' . $model->idAvaliacao;
$this->params['breadcrumbs'][] = ['label' => 'Avaliacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAvaliacao, 'url' => ['view', 'idAvaliacao' => $model->idAvaliacao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="avaliacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
