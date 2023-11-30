<?php

namespace arm\controllers;
use settings\entities\menu\Menu;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions(): array
    {
//        $this->layout = 'main-error';
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionIndex(){
//        $menu =  Menu::find()
//            ->andWhere(['parent_id' => null])
//            ->asArray()
//            ->all();
//        echo "<pre>";
//        print_r($menu);die();
        return $this->render('index');
    }

    public function actionTest(){
        echo 'test';
    }
}
