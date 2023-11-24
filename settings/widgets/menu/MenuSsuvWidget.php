<?php

namespace settings\widgets\menu;

use settings\entities\menu\Menu;
use settings\helpers\DeleteHelper;
use settings\status\GeneralStatus;
use yii\base\Widget;
use yii\data\ArrayDataProvider;

class MenuSsuvWidget extends Widget
{
    public $message;

    public function init()
    {
//        $menu =  Menu::find()
//            ->andWhere(['parent_id' => null])
//            ->asArray()
//            ->all();
//        echo "<pre>";
//        print_r($menu);die();
//        parent::init();
//        if ($this->message === null) {
//            $this->message = 'Hello World';
//        }
    }

    public function run()
    {
        $menuAlias = 'm';
        $menus =  Menu::find()
            ->joinWith('menus.menus')
            ->alias("{$menuAlias}")
            ->andWhere(["{$menuAlias}.parent_id" => null])
            ->all();
        return $this->render('menuSsuv', [
            'menus' => $menus
        ]);
    }
}