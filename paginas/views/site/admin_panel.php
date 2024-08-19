<?php

/** @var yii\web\View $this */
/** @var app\models\User $user */
/** @var app\models\User[] $users */

use yii\helpers\Html;

$this->registerCssFile('@web/css/admin_panel.css');
$this->title = 'Paínel de Administrador';
?>

<div class="container">
  <p class="helloUser">Olá, <b style="color: #000"><?= Html::encode($user->nome) ?></b></p>
  <div class="userCard">
    <img src="<?= Html::encode($user->fotoPerfil) ?>" alt="" class="userImg">
    <div class="userCardText">
      <div class="infoEdit">
        <p class="userCardInfo"><?= Html::encode($user->nome) ?></p>
        <p class="editLabel">Alterar</p>
      </div>
      <div class="infoEdit">
        <p class="userCardInfo"><?= Html::encode($user->email) ?></p>
        <p class="editLabel">Alterar</p>
      </div>
      <div class="infoEdit">
        <p class="userCardInfo">*************</p>
        <p class="editLabel">Alterar</p>
      </div>
      <button type="button" class="logoutButton">
        Sair
      </button>
    </div>
  </div>

  <div class="contentHeader">
    <div class="filtersArea">
      <p class="contentTitle">Usuários</p>
    </div>
    <div class="searchBox">
      <input type="text" class="form-control textInput" name="" id="" placeholder="Pesquisar..." />
    </div>
  </div>

  <div class="row">
    <?php foreach ($users as $user) : ?>
      <div class="col-md-4 userInfoCard">
        <div class="card" style="width: 18rem;">
          <img src="<?= Html::encode($user->fotoPerfil) ?>" class="card-img-top userInfoImg" alt="...">
          <div class="card-body">
            <p class="userCard"><?= Html::encode($user->nome) ?></p>
            <p class="userCard"><?= Html::encode($user->email) ?></p>
            <div class="deleteText userCard">Deletar</div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="loadMore">Carregar mais...</div>
</div>