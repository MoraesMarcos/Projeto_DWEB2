<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/assets/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?><header id="header">
        <div class="navbar">
            <a href="<?= Yii::$app->homeUrl ?>">
                <div class="logo">
                    <p class="mainTitle">DiscoveryPortugal</p>
                    <img src="<?= Yii::getAlias('@web') ?>/assets/portugal_flag.png" alt="Logo" class="logoImg">
                </div>
            </a>
            <div class="navbarpagesGroup">
                <?php if (Yii::$app->user->isGuest) : ?>
                    <p class="navbarPage"><a href="<?= Url::to(['site/login']) ?>">Login</a></p>
                    <div class="pageDivider"></div>
                    <p class="navbarPage"><a href="<?= Url::to(['site/register']) ?>">Cadastre-se</a></p>
                <?php else : ?>
                    <?php if (Yii::$app->user->identity->cargo === 'ADMIN') : ?>
                        <p class="navbarPage"><a href="<?= Url::to(['site/admin-panel']) ?>">Painel de Admin.</a></p>
                        <div class="pageDivider"></div>
                        <p class="navbarPage"><a href="<?= Url::to(['site/register_city']) ?>">Cadastrar Cidade</a></p>
                        <div class="pageDivider"></div>
                        <p class="navbarPage"><a href="<?= Url::to(['site/logout']) ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></p>
                    <?php elseif (Yii::$app->user->identity->cargo === 'USER') : ?>
                        <p class="navbarPage"><a href="<?= Url::to(['site/user']) ?>">Meu perfil</a></p>
                        <div class="pageDivider"></div>
                        <p class="navbarPage"><a href="<?= Url::to(['site/logout']) ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></p>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (Yii::$app->user->identity->cargo != 'ADMIN') : ?>
                    <div class="pageDivider"></div>
                    <p class="navbarPage"><a href="<?= Url::to(['site/contact']) ?>">Contato</a></p>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?php if (!empty($this->params['breadcrumbs'])) : ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p class="footerText">Trabalho de Desenvolvimento Web 2024 | Desenvolvido por Julio Cesar e Marcos Moraes</p>
        </div>
    </footer>

    <form id="logout-form" action="<?= Url::to(['site/logout']) ?>" method="post" style="display: none;">
        <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>
    </form>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>