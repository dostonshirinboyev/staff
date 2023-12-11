<?php

use settings\repositories\user\UserPersonalDataRepository;
use yii\helpers\Html;
/* @var $userPersonalData UserPersonalDataRepository */

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
                <?php if (Yii::$app->user->isGuest): ?>
                    <div class="menu-right-btn">
                        <?= Html::a(Yii::t('app', "Tizimga kirish") . Html::tag('i', '', ['class' => 'fa fa-sign-in']), ['auth/auth/login'], ['class' => 'theme-btn'])?>
                    </div>
                <?php else: ?>
                    <div class="menu-right-btn">
                        <div class="dropdown ">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                                <?= Html::tag('i', '', ['class' => 'fas fa-user-graduate'])?> <?=ucwords(strtolower($userPersonalData->short_name));?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Mening profilim</a></li>
                                <li><a class="dropdown-item" href="#">Mening kitoblarim</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <?= Html::tag('li', Html::a(Html::tag('i', '', ['class' => 'fas fa-sign-out-alt']) .' '. Yii::t('app', "Chiqish"), ['auth/auth/logout'], ['class' => 'dropdown-item','method' => 'post']))?>
                            </ul>
                        </div>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</header>