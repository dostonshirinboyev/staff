<?php
//    echo "<pre>";
//    print_r($menu); die();
?>
<div id="navigation">
    <!-- Navigation Menu-->
    <ul class="navigation-menu">
        <?php foreach ($menu as $men): ?>
            <?php if ($men->parent_id == null): ?>
                <li><a href="index.html" class="sub-menu-item"><?=$men->title_oz;?></a></li>
            <?php elseif ($men->parent_id != null): ?>
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)"><?=$men->title_oz;?></a><span class="menu-arrow"></span>
<!--                    --><?php //foreach ($menu->getMenus as $paren): ?>
<!--                    <ul class="submenu">-->
<!--                        <li><a href="documentation.html" class="sub-menu-item">--><?//=$paren->title_oz?><!--</a></li>-->
<!--                    </ul>-->
<!--                    --><?php //endforeach; ?>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul><!--end navigation menu-->
</div><!--end navigation-->