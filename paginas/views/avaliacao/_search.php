<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AvaliacaoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="avaliacao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idAvaliacao') ?>

    <?= $form->field($model, 'comentario') ?>

    <?= $form->field($model, 'nota') ?>

    <?= $form->field($model, 'idCidade') ?>

    <?= $form->field($model, 'idUsuario') ?>

    <?php // echo $form->field($model, 'data') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
