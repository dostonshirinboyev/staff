<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <!-- Error -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h2 class="mb-2 mx-2"><?= Html::encode($this->title) ?> :(</h2>
            <p class="mb-4 mx-2">Kechirasiz! 😖  bunday sahifa mavjud emas.</p>
            <a href="/" class="btn btn-primary"><?=Yii::t('app', "Bosh sahifaga o'tish")?></a>
            <div class="mt-3">
                <?= Html::img('/assets/img/illustrations/page-misc-error-light.png', [
                    'alt' => 'page-misc-error-light',
                    'width' => '500',
                    'class' => 'img-fluid',
                    'data-app-dark-img' => 'illustrations/page-misc-error-dark.png',
                    'data-app-light-img' => 'illustrations/page-misc-error-light.png'
                ])?>
            </div>
        </div>
    </div>
    <!-- /Error -->

    <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>404</h1>
        <h2>The page you are looking for doesn't exist.</h2>
        <a class="btn" href="index.html">Back to home</a>
        <img src="assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </section>

</div>
