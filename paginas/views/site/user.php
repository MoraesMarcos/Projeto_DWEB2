<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->registerCssFile('@web/css/user.css');
$this->title = 'Página do usuário';
$user = Yii::$app->user->identity;
?>

<div class="site-user">
  <div class="user-content">
    <p class="helloUser">Olá, <b style="color: #000"><?= Html::encode($user->nome) ?></b></p>
    <div class="userCard">
      <img src="<?= $user->fotoPerfil ?>" alt="" class="userImg">
      <div class="userCardText">
        <div class="infoEdit">
          <p class="userCardInfo"><?= Html::encode($user->nome) ?></p>
          <p class="editLabel"><a href="<?= Url::to(['usuario/update', 'id' => $user->idUsuario]) ?>">Alterar</a></p>
        </div>
        <div class="infoEdit">
          <p class="userCardInfo"><?= Html::encode($user->email) ?></p>
          <p class="editLabel"><a href="<?= Url::to(['usuario/update-email', 'id' => $user->idUsuario]) ?>">Alterar</a></p>
        </div>
        <div class="infoEdit">
          <p class="userCardInfo">*************</p>
          <p class="editLabel"><a href="<?= Url::to(['usuario/update-password', 'id' => $user->idUsuario]) ?>">Alterar</a></p>
        </div>
        <button type="button" class="btn btn-primary logoutButton" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Sair
        </button>
      </div>
    </div>
  </div>

  <form id="logout-form" action="<?= Url::to(['site/logout']) ?>" method="post" style="display: none;">
    <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>
  </form>

  <div class="contentHeader">
    <div class="filtersArea">
      <p class="contentTitle">Envios</p>
      <div class="filter">
        <img src="<?= Yii::getAlias('@web') ?>/assets/filter_icon.png" alt="Filter" class="filterImg">
        <p class="filterText">Filtros</p>
      </div>
    </div>
    <div class="searcBox">
      <input type="text" class="form-control textInput" name="" id="" placeholder="Pesquisar..." />
    </div>
  </div>
  <div class="reviewTitle">Avaliações</div>
  <div class="reviewsSection">
    <?php foreach ($user->avaliacoes as $avaliacao) : ?>
      <div class="reviewCard">
        <div class="reviewHeader">
          <div class="reviewCity"><?= Html::encode($avaliacao->cidade->nome) ?></div>
          <div class="reviewDate">
            <?php
            list($day, $month, $year) = explode('/', $avaliacao->data);
            $newDate = "$year-$month-$day";
            echo Yii::$app->formatter->asDate($newDate, 'dd/MM/yyyy');
            ?>
          </div>
        </div>
        <div class="rateStar">
          <?php for ($i = 0; $i < 5; $i++) : ?>
            <span class="fa fa-star <?= $i < $avaliacao->nota ? 'checked' : '' ?>"></span>
          <?php endfor; ?>
        </div>
        <div class="reviewComment">
          <?= Html::encode($avaliacao->comentario) ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="loadMore">Carregar mais...</div>
</div>