<?php

use arm\assets\AppAuthAsset;
use settings\repositories\user\UserPersonalDataRepository;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $userPersonalData UserPersonalDataRepository */

$userPersonalData = (new UserPersonalDataRepository())->get(Yii::$app->user->id);
AppAuthAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<!-- Mirrored from themes.lunartechit.com/dataxo/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Jul 2021 05:29:06 GMT -->
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="#">
    <meta name="description" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="img/favicon.png">

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
    'header',
    ['userPersonalData' => $userPersonalData]
); ?>


<section class="breadcrumbs">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumb-content">
<!--                    <p>We keep safe & secure your data</p>-->
                    <h3>Hemis orqali kirish</h3>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumb-menu">
                    <ul>
                        <li><a href="/">Bosh sahifa</a></li>
                        <li class="active"><a href="#">Hemis orqali kirish</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<?= $content?>


<?= $this->render(
    'footer'
); ?>


<a href="#" class="scrollToTop"><i class="far fa-long-arrow-up"></i></a>

<?php $this->endBody() ?>
</body>

<!-- Mirrored from themes.lunartechit.com/dataxo/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Jul 2021 05:29:06 GMT -->
</html>
<?php $this->endPage();