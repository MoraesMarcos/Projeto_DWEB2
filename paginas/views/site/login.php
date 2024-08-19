<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\models\Usuario; // Importe o modelo Usuario

$this->registerCssFile('@web/css/login.css');
$this->title = 'Login';
?>

<div class="site-login">
    <p class="loginText"><?= Html::encode($this->title) ?></p>
    <p class="loginSubText">Prossiga com seus dados para realizar o login no sistema</p>

    <div class="loginArea">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary loginButton', 'name' => 'login-button']) ?>
                </div>
                <?php if ($model->hasErrors('email') || $model->hasErrors('password')) : ?>
                    <div class="alert alert-danger mt-3">
                        <?php
                        $user = Usuario::find()->where(['email' => $model->email])->one();
                        if ($user === null) {
                            echo '<strong>Usuário não encontrado!</strong> Verifique o email inserido.<br>';
                        } else {
                            echo '<strong>Erro de login!</strong> Verifique o email e senha inseridos.<br>';
                        }
                        ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="registerTextArea">
        <p>Não tem uma conta?</p>
        <p class="registerText"><a href="<?= Yii::$app->urlManager->createUrl('site/signup') ?>">Faça já o seu cadastro</a></p>
    </div>
</div>