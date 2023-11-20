<?php

use yii\helpers\Url;

?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="bi bi-house-fill"></i>
                <span><?= Yii::t('app', 'Bosh sahifa')?></span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link" href="<?=Url::to('/user/employee/lists')?>">
                <i class="bi bi-menu-button-wide"></i>
                <span>O'qituvchilar</span>
            </a>
        </li><!-- End Components Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

    </ul>

</aside><!-- End Sidebar-->