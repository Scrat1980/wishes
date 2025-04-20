<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\web\View;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
<!--    <div class="container">-->
<!--        <div class="row text-muted">-->
<!--            <div class="col-md-6 text-center text-md-start">&copy; Ivan Zavadsky --><?php //= date('Y') ?><!--</div>-->
<!--            <div class="col-md-6 text-center text-md-end">--><?php //= Yii::powered() ?><!--</div>-->
<!--        </div>-->
<!--    </div>-->
</footer>

<?php if(!Yii::$app->user->isGuest) {?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <div class="row justify-content-md-center">
<!--            <div class="col col-3">-->
<!--                <a class="navbar-brand" href="#">-->
<!--                    <img src="/favicon.ico" alt="">-->
<!--                </a>-->
<!--            </div>-->
            <div class="col col-3">
                <?= Html::beginForm(['/site/logout'])?>
                <?= Html::submitButton(
                    '<span class="bi bi-box-arrow-right"></span>',
                    [
                        'class' => 'nav-link btn btn-link logout',
                        'style' => 'float: right; font-size: 1.8rem; color: #303030;'
                    ]
                )?>
                <?= Html::endForm()?>
            </div>
            <div class="col col-3">
                <a class="nav-link active" aria-current="page" href="/wish">
                    <i class="bi bi-house" style="font-size: 1.8rem; color: #303030;"></i>
                </a>
            </div>
            <div class="col col-3">
                <a class="nav-link" href="/site/upload">
                    <i class="bi bi-gear" style="font-size: 1.8rem; color: #303030;"></i>
                </a>
            </div>
            <div class="col col-3">
                <a class="nav-link" href="/wish/create">
                    <i class="bi bi-plus-circle" style="font-size: 1.8rem; color: #303030;"></i>
                </a>
            </div>
        </div>

    </div>
</nav>
<?php } else {?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-3">
                    <a class="navbar-brand" href="#">
                        <img src="/favicon.ico" alt="">
                    </a>
                </div>
                <div class="col col-3">
                    <a class="nav-link" href="/wish/create">
<!--                        <i class="bi bi-plus-circle-fill" style="font-size: 1.8rem; color: #303030;"></i>-->
                    </a>
                </div>
                <div class="col col-3">
                    <a class="nav-link active" aria-current="page" href="/site/login">
                        <i class="bi bi-box-arrow-in-right" style="font-size: 1.8rem; color: #303030;"></i>
                    </a>
                </div>
                <div class="col col-3">
                    <a class="nav-link" href="/site/register">
                        <i class="bi bi-clipboard2-plus" style="font-size: 1.8rem; color: #303030;"></i>
                    </a>
                </div>
            </div>

        </div>
    </nav>

<?php }?>


<?php $this->endBody() ?>
</body>
<?php //$this->registerJsFile('@web/js/_register_js.php', ['position' => View::POS_END,]);?>
<?= $this->render('_register_js.php') ?>

</html>
<?php $this->endPage() ?>
