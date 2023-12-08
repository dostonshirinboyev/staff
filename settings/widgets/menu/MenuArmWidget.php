<?php

namespace settings\widgets\menu;

use settings\entities\enums\EnumMenuCategory;
use settings\entities\menu\Menu;
use settings\status\GeneralStatus;
use yii\base\Widget;

class MenuArmWidget extends Widget
{
    public function run()
    {
        $menuAlias = 'm';
        $menus =  Menu::find()
            ->joinWith('menus.menus')
            ->joinWith('category')
            ->alias("{$menuAlias}")
            ->andWhere(["{$menuAlias}.parent_id" => null])
            ->andWhere(["{$menuAlias}.status" => GeneralStatus::STATUS_ENABLED])
            ->andWhere(["enum_menu_category.code_name" => 'arm_menu'])
            ->all();
        return $this->render('menuArm', [
            'menus' => $menus
        ]);
    }
}