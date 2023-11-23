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
        $menu =  Menu::find()->all();
        echo "<pre>";
        print_r($menu);
//        parent::init();
//        if ($this->message === null) {
//            $this->message = 'Hello World';
//        }
    }

//    public function run()
//    {
//        $menuAlias = 'm';
//        $menu =  Menu::find()
////            ->select('*')
////            ->alias("{$menuAlias}")
////            ->andWhere(["status" => GeneralStatus::STATUS_ENABLED])
////            ->andWhere(["is_deleted" => DeleteHelper::DELETE_NO])
////            ->andWhere(["{$menuAlias}.status" => GeneralStatus::STATUS_ENABLED])
////            ->andWhere(["{$menuAlias}.is_deleted" => DeleteHelper::DELETE_NO])
////            ->andWhere(["{$menuAlias}.parent_id" => null])
////            ->asArray()
//            ->all();
////        echo "<pre>";
////        print_r($menu);
////        die();
////        $dataProvider = new ArrayDataProvider([
////            'allModels' => $menu,
////            'pagination' => [
////                'pageSize' => 12
////            ],
////        ]);
//        echo "<pre>";
//        print_r($menu);
////        return $this->render('menuSsuv', ['menu' => $menu]);
//    }
}