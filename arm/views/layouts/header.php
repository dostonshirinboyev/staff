<?php

use yii\helpers\Html;

?>
<header class="header header-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-12">

                <div class="logo">
                    <a href="/" class="logo-1"><img src="/img/logo1.png" alt="#"></a>
                    <a href="/" class="logo-2"><img src="/img/logo1.png" alt="#"></a>
                </div>
                <div class="mobile-nav"></div>
            </div>
            <div class="col-lg-7 col-md-9 col-12">
                <?= $this->render(
                    'menu'
                ); ?>
            </div>
            <div class="col-lg-3 col-md-2 col-12">

                <div class="menu-right-btn">
<!--                    --><?//= Html::a(Yii::t('app', "Hemis orqali tizimga kirish") . Html::tag('i', '', ['class' => 'far fa-long-arrow-right']), ['auth/auth/login'], ['class' => 'theme-btn'])?>
                    <a href="#" class="theme-btn">Tizimga kirish<i class="far fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>