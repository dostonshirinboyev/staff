<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAuthAsset;
use yii\helpers\Html;

AppAuthAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <?php $this->head() ?>
</head>

<body>

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="/login" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block"><?=Yii::t('app', 'SSUV.UZ STAFF')?></span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">
                                <?= $content?>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

<?= Html::a(
    Html::tag('i', '', ['class' => 'bi bi-arrow-up-short']),
    '#', ['class' => 'back-to-top d-flex align-items-center justify-content-center']
) ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();