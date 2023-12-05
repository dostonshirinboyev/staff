<?php

namespace settings\widgets\menu;

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
            ->alias("{$menuAlias}")
            ->andWhere(["{$menuAlias}.parent_id" => null])
            ->andWhere(["{$menuAlias}.status" => GeneralStatus::STATUS_ENABLED])
            ->all();
        return $this->render('menuArm', [
            'menus' => $menus
        ]);
    }
}