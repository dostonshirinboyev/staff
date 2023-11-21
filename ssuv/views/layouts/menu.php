<?php

use settings\widgets\category\UniversityCategoryWidget; ?>

<?= UniversityCategoryWidget::widget()?>

<div id="navigation">
    <!-- Navigation Menu-->
    <ul class="navigation-menu">
        <li><a href="index.html" class="sub-menu-item">Bosh sahifa</a></li>
        <li><a href="index.html" class="sub-menu-item">Statistika</a></li>
        <li><a href="index.html" class="sub-menu-item">Texnik yordam</a></li>
        <li><a href="index.html" class="sub-menu-item">Bog'lanish</a></li>

        <li class="has-submenu parent-menu-item">
            <a href="javascript:void(0)">O'qituvchilar</a><span class="menu-arrow"></span>
            <ul class="submenu">
                <li><a href="documentation.html" class="sub-menu-item">O'qituvchilar ro'yxati</a></li>
                <li><a href="changelog.html" class="sub-menu-item">Statistika</a></li>
                <li><a href="components.html" class="sub-menu-item">Texnik yordam</a></li>
                <li><a href="widget.html" class="sub-menu-item">Bog'lanish</a></li>
            </ul>
        </li>
    </ul><!--end navigation menu-->
</div><!--end navigation-->