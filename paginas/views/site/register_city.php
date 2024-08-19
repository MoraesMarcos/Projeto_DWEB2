<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

$this->registerCssFile('@web/css/register_city.css');
$this->title = "Cadastrar cidade";
?>


<div class="main">
  <div class="container">
    <h1 class="centerMain">Cadastrar nova cidade</h1>
    <div class="textCenter">
      <img src="../assets/cityBraga.jpg" class="card-img-top" alt="...">
      <div class="mb-3">
        <input type="text" class="form-control textInput mx-auto" name="" id="" placeholder="Cidade" />
      </div>
      <div class="mb-3">
        <input type="text" class="form-control textInput mx-auto" name="" id="" placeholder="Descrição" />
      </div>
      <button type="button" class="btn btn-primary buttonRegister">
        Cadastrar
      </button>
    </div>
  </div>
</div>