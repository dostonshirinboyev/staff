<?php

namespace arm\controllers\auth;

use settings\auth\GoogleID;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class GoogleController extends Controller
{
    private $googleID;

    public function __construct(
        $id,
        $module,
        GoogleID $googleID,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->googleID = $googleID;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSend(): Response
    {
        return $this->redirect($this->googleID->provider()->createAuthUrl());
    }

    public function actionAcceptance()
    {
        $login_url = $this->googleID->fetchAuthGoogle(Yii::$app->request->get('code'));
        echo "<pre>";
        print_r($login_url);die();
    }
}