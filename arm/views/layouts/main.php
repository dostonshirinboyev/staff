<?php

use arm\assets\AppAsset;
use settings\repositories\user\UserPersonalDataRepository;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $userPersonalData UserPersonalDataRepository */

$userPersonalData = (new UserPersonalDataRepository())->get(Yii::$app->user->id);
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

    <link rel="icon" href="/img/logo/logo.png">

    <title><?= Html::encode($this->title) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;0,500;0,600;0,700;0,900;1,500;1,700&amp;display=swap" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<marquee width="100%" direction="left" >
    <p style="color: red;">Sayt test rejimida ishlamoqda.</p>
</marquee>

<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">

                <div class="topbar-Social">
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="active"><a href="#"><i class="fab fa-telegram"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">

                <div class="topbar-Contact">
                    <ul>
                        <li><a href="#"><i class="far fa-phone"></i>+99866 234-98-73</a></li>
                        <li><a href="#"><i class="far fa-envelope"></i><span class="__cf_email__" data-cfemail="325b5c545d72574a535f425e571c515d5f">arm@ssuv.uz</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="preeloader">
    <div class="loader">
        <div></div><div></div><div></div><div></div><div></div><div></div><div></div>
    </div>
</div>

<?= $this->render(
    'header',
    ['userPersonalData' => $userPersonalData]
); ?>
<section class="hero-area hero2-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">

                <div class="hero-content animation-2">
                    <span></span>
                    <p>SAMARQAND DAVLAT VETERINARIYA MEDITSINASI, CHORVACHILIK VA BIOTEXNOLOGIYALAR UNIVERSITETI</p>
                    <h1>AXBOROT RESURS MARKAZI</h1>

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
                    <img src="/img/banner/banner-1.png" alt="#">
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