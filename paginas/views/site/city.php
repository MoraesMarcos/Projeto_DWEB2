<?php

/** @var yii\web\View $this */
/** @var app\models\Cidade $cidade */
/** @var app\models\Avaliacao[] $avaliacoes */
/** @var float $mediaAvaliacoes */

use yii\helpers\Html;

$this->registerCssFile('@web/css/city.css');

$this->title = 'Cidade';

// Defina a URL do banner dinamicamente
$bannerUrl = $cidade->banner ? $cidade->banner : '@web/assets/default_banner.png';
?>

<div class="cityBanner" style="background-image: url('<?= $bannerUrl ?>');">
  <div class="cityInfo">
    <div class="infoButton">
      <button type="button" class="btn btn-primary addInfoButton">
        Adicionar informação
      </button>
    </div>
    <div class="cityTitle"><?= Html::encode($cidade->nome) ?></div>
    <div class="containerDetails">
      <div class="cityDescription"><?= Html::encode($cidade->descricao) ?></div>
      <div class="rateStar">
        <?php for ($i = 0; $i < 5; $i++) : ?>
          <span class="fa fa-star <?= $i < round($mediaAvaliacoes) ? 'checked' : '' ?>"></span>
        <?php endfor; ?>
      </div>
    </div>
  </div>
  <div class="imageOverlay"></div>
</div>

<div class="reviewTitle">Avaliações</div>
<div class="reviewsSection">
  <?php foreach ($avaliacoes as $avaliacao) : ?>
    <div class="reviewCard">
      <div class="reviewHeader">
        <div class="reviewer"><?= Html::encode($avaliacao->idUsuario0->nome) ?></div>
        <div class="reviewDate">
          <?= Yii::$app->formatter->asDate($avaliacao->getFormattedData()) ?>
        </div>
      </div>
      <div class="rateStar">
        <?php for ($i = 0; $i < 5; $i++) : ?>
          <span class="fa fa-star <?= $i < $avaliacao->nota ? 'checked' : '' ?>"></span>
        <?php endfor; ?>
      </div>
      <div class="reviewText"><?= Html::encode($avaliacao->comentario) ?></div>
    </div>
  <?php endforeach; ?>
</div>