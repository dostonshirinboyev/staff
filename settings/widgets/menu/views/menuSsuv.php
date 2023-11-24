<?php

use settings\entities\menu\Menu;

/* @var $menus Menu */

?>
<ul class="navigation-menu">
    <?php foreach ($menus as $key => $menu): ?>
    <?php if ($menu->menus == null): ?>
        <li><a href="index.html" class="sub-menu-item"><?=$menu->title_oz;?></a></li>
    <?php elseif ($menu->menus != null): ?>
        <li class="has-submenu parent-parent-menu-item">
            <a href="javascript:void(0)"><?=$menu->title_oz;?></a><span class="menu-arrow"></span>
            <ul class="submenu">
                <?php foreach ($menu->menus as $subKey => $subMenu_1): ?>
                <?php if ($subMenu_1->menus == null): ?>
                <li><a href="footer.html" class="sub-menu-item"><?=$subMenu_1->title_oz;?> </a></li>
                <?php elseif ($subMenu_1->menus != null): ?>
                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> <?=$subMenu_1->title_oz;?> </a><span class="submenu-arrow"></span>
                    <ul class="submenu">
                        <?php foreach ($subMenu_1->menus as $subKey2 => $subMenu_2): ?>
                        <li><a href="page-aboutus.html" class="sub-menu-item"> <?=$subMenu_2->title_oz;?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endif; ?>
    <?php endforeach; ?>
</ul>