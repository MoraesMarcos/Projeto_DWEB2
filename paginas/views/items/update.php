<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Items $model */

$this->title = 'Update Items: ' . $model->idItems;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idItems, 'url' => ['view', 'idItems' => $model->idItems]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
