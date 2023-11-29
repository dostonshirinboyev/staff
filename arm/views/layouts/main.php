<?php

/* @var $this \yii\web\View */
/* @var $content string */

use arm\assets\AppAsset;
use yii\helpers\Html;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<!-- Mirrored from themes.lunartechit.com/dataxo/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Jul 2021 05:27:56 GMT -->
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="#">
    <meta name="description" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="assets/img/favicon.png">

    <title><?= Html::encode($this->title) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;0,500;0,600;0,700;0,900;1,500;1,700&amp;display=swap" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="preeloader">
    <div class="loader">
        <div></div><div></div><div></div><div></div><div></div><div></div><div></div>
    </div>
</div>

<?= $this->render(
    'header'
); ?>
<section class="hero-area hero2-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">

                <div class="hero-content animation-2">
                    <span>Safe & secure your data with us</span>
                    <h1>Data Science And Data Analysis Agency</h1>
                    <p>Proin bibendum est quis nisl cursus vehicula id ac tellus nteger tincidunt lacus quis quam efficitur pretium usce sit amet auctor lectus.</p>
                    <div class="hero-btn">
                        <a href="about.html" class="theme-btn primary">Learn More</a>

                        <div class="video-main">

                            <div class="promo-video">
                                <div class="waves-block">
                                    <div class="waves wave-1"></div>
                                    <div class="waves wave-2"></div>
                                    <div class="waves wave-3"></div>
                                </div>
                            </div>
                            <a href="https://www.youtube.com/watch?v=ckHzmP1evNU" class="video video-popup mfp-iframe"><i class="far fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">

                <div class="hero-image-2">
                    <img src="assets/img/banner/banner-1.png" alt="#">
                </div>
            </div>
        </div>
    </div>
</section>
<?= $content;?>

<?= $this->render(
    'footer'
); ?>

<a href="#" class="scrollToTop"><i class="far fa-long-arrow-up"></i></a>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();