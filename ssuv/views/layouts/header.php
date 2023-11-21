<?php

use settings\helpers\UserTypeHelper;
use settings\repositories\user\UserPersonalDataRepository;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $userPersonalData UserPersonalDataRepository */

?>
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <?= $this->render(
            'logo'
        ); ?>
        <!-- Logo End -->

        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <!--Login button Start-->
        <ul class="buy-button list-inline mb-0">
            <li class="list-inline-item mb-0 pe-1">
                <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                    <i class="uil uil-search h5 text-dark align-middle"></i>
                </a>
            </li>
            <?php if (Yii::$app->user->isGuest): ?>
            <li class="list-inline-item ps-1 mb-0">
                <?=Html::a(Html::tag('i','', ['data-feather' => 'log-in', 'class' => 'fea icon-sm']), 'login', ['class' => 'btn btn-icon btn-pills btn-primary', 'title' => 'HemisID orqali kiring'])?>
            </li>
            <?php else: ?>
            <li class="list-inline-item mb-0">
                <div class="dropdown dropdown-primary">
                    <button type="button" class="btn btn-icon btn-pills btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="user" class="icons"></i></button>
                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 py-3" style="width: 200px;">
                        <a class="dropdown-item text-dark" href="#"><i class="uil uil-user align-middle me-1"></i> <?=ucwords(strtolower($userPersonalData->first_name.' '.$userPersonalData->last_name));?></a>
<!--                        <a class="dropdown-item text-dark" href="#"><i class="uil uil-user align-middle me-1"></i> Shaxsiy kabinet</a>-->
                        <a class="dropdown-item text-dark" href="#"><i class="uil uil-clipboard-notes align-middle me-1"></i> Kirishlar tarixi</a>
                        <div class="dropdown-divider my-3 border-top"></div>
                        <?= Html::a(Html::tag('i', '', ['class' => 'uil uil-sign-out-alt align-middle me-1']).' '.Yii::t('app', "Chiqish"), 'logout', ['class' => 'dropdown-item text-dark', 'method' => 'post'])?>
                    </div>
                </div>
            </li>
            <?php endif; ?>
        </ul>
        <!--Login button End-->

        <?= $this->render(
            'menu'
        ); ?>

    </div><!--end container-->
</header><!--end header-->