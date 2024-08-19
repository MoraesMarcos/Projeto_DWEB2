<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cidade $model */

$this->title = 'Update Cidade: ' . $model->idCidade;
$this->params['breadcrumbs'][] = ['label' => 'Cidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCidade, 'url' => ['view', 'idCidade' => $model->idCidade]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cidade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
