<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerCssFile('@web/css/register.css');
$this->title = 'Registrar-se';
?>
<div class="site-signup">
  <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['enctype' => 'multipart/form-data']]); ?>

  <h1 class="titl text-center fw-bold">Cadastre-se</h1>
  <p class="subtitle text-center">Prossiga com seus dados para realizar o cadastro no sistema</p>

  <div class="profileImage">
    <img id="profileImagePreview" src="<?= $model->fotoPerfil ? Yii::getAlias('@web/') . $model->fotoPerfil : 'https://www.ibimirim.pe.leg.br/imagens/semimagemavatar.png/image_preview' ?>" alt="Profile Image" class="selectedImage">
  </div>

  <div class="profileImage">
    <?= $form->field($model, 'uploadedFotoPerfil')->fileInput(['accept' => 'image/*', 'id' => 'uploadFotoPerfilInput']) ?>
  </div>

  <div class="row mb-3 textArea">
    <?= $form->field($model, 'nome', ['options' => ['class' => 'col-sm-7']])->textInput(['placeholder' => '']) ?>
  </div>

  <div class="row mb-3 textArea">
    <?= $form->field($model, 'email', ['options' => ['class' => 'col-sm-7']])->textInput(['type' => 'email']) ?>
  </div>

  <div class="row mb-3 textArea">
    <?= $form->field($model, 'telefone', ['options' => ['class' => 'col-sm-7']])->textInput(['type' => 'text']) ?>
  </div>

  <div class="row mb-3 textArea">
    <?= $form->field($model, 'senha', ['options' => ['class' => 'col-sm-7']])->passwordInput() ?>
  </div>

  <div class="signupButton">
    <?= Html::submitButton('Cadastrar-se', ['class' => 'buttonStyle', 'name' => 'signup-button']) ?>
  </div>

  <?php ActiveForm::end(); ?>
</div>

<?php
$this->registerJs("
  document.getElementById('uploadFotoPerfilInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('profileImagePreview').src = e.target.result;
      };
      reader.readAsDataURL(file);
    }
  });
");
?>