<?php

use settings\entities\menu\Menu;

/* @var $menus Menu */
?>
<ul class="nav-menu mobile-menu navigation">
    <?php foreach ($menus as $key => $menu): ?>
    <?php if ($menu->menus == null): ?>

        <li><a href="#"><?= ucfirst(strtolower($menu->title_oz));?></a></li>

    <?php elseif ($menu->menus != null): ?>

        <li class="active"><a href="#"><?= ucfirst(strtolower($menu->title_oz));?><i class="far fa-angle-down"></i></a>
            <ul class="sub-menu">

                <?php foreach ($menu->menus as $subKey => $subMenu): ?>

                <li class="active"><a href="#"><?= ucfirst(strtolower($subMenu->title_oz));?></a></li>

                <?php endforeach; ?>
            </ul>
        </li>

    <?php endif; ?>
    <?php endforeach;?>
</ul>