<?php

/** @var yii\web\View $this */
/** @var app\models\Cidade[] $cidades */

$this->title = 'DiscoveryPortugal';

use yii\helpers\Html;
use yii\helpers\Url;

// Importando os arquivos CSS e JavaScript do Bootstrap
$this->registerCssFile('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', ['integrity' => 'sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN', 'crossorigin' => 'anonymous']);
$this->registerJsFile('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', ['integrity' => 'sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r', 'crossorigin' => 'anonymous']);
$this->registerJsFile('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js', ['integrity' => 'sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+', 'crossorigin' => 'anonymous']);
$this->registerCssFile('@web/css/index.css');
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

?>
<div class="mainClass">
  <div class="site-index">
    <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <?php foreach ($cidades as $index => $cidade) : ?>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>" aria-current="<?= $index === 0 ? 'true' : 'false' ?>" aria-label="Slide <?= $index + 1 ?>"></button>
        <?php endforeach; ?>
      </div>
      <h1 class="centerMain">As cidades mais bem avaliadas</h1>
      <div class="carousel-inner">
        <?php foreach ($cidades as $index => $cidade) : ?>
          <div class="carousel-item <?= $index === 0 ? 'active' : '' ?> carousel-itemCustom">
            <img src="<?= Html::encode($cidade->banner) ?>" class="d-block carouselImg" alt="<?= Html::encode($cidade->nome) ?>">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="carouselTitle"><?= Html::encode($cidade->nome) ?></h5>
              <p class="carouselParagrafo"><?= Html::encode($cidade->descricao) ?></p>
            </div>
            <div class="carousel-overlay"></div>
            <div class="carousel-caption"></div>
          </div>
        <?php endforeach; ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="contentHeader">
      <div class="filtersArea">
        <p class="contentTitle">Cidades</p>
        <div class="filter">
          <img src="<?= Yii::getAlias('@web') ?>/assets/filter_icon.png" alt="Filter" class="filterImg">
          <p class="filterText">Filtros</p>
        </div>
      </div>

      <div class="searcBox">
        <input type="text" class="form-control textInput" name="" id="" placeholder="Pesquisar..." />
      </div>
    </div>
    <div class="cityList">
      <?php foreach ($cidades as $cidade) : ?>
        <div class="cityInfo">
          <img src="<?= Html::encode($cidade->banner) ?>" alt="<?= Html::encode($cidade->nome) ?>" class="cityImg">
          <div class="cardContent">
            <div class="cityTitleContent">
              <p class="cityName"><?= Html::encode($cidade->nome) ?></p>
              <div class="rateStar">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
              </div>
            </div>
            <p class="cityDescription"><?= Html::encode($cidade->descricao) ?></p>
            <p class="exploreLink">
              <a href="<?= Url::to(['site/city', 'id' => $cidade->idCidade]) ?>">Explorar</a>
            </p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>