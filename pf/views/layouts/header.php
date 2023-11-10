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
            <li class="list-inline-item mb-0">
                <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <div class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="settings" class="fea icon-sm"></i></div>
                </a>
            </li>

            <li class="list-inline-item ps-1 mb-0">
                <a href="https://1.envato.market/4n73n" target="_blank">
                    <div class="btn btn-icon btn-pills btn-primary"><i data-feather="shopping-cart" class="fea icon-sm"></i></div>
                </a>
            </li>
        </ul>
        <!--Login button End-->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li><a href="index.html" class="sub-menu-item">Bosh sahifa</a></li>
                <li><a href="index.html" class="sub-menu-item">O'qituvchilar</a></li>
                <li><a href="index.html" class="sub-menu-item">Statistika</a></li>
                <li><a href="index.html" class="sub-menu-item">Texnik yordam</a></li>
                <li><a href="index.html" class="sub-menu-item">Bog'lanish</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->