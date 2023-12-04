<?php

namespace settings\integrations\library;

use Yii;
use yii\helpers\Json;
use linslin\yii2\curl;

class LibraryUnilibraryIntegration
{
    private $apiUnilibraryDomain = 'https://api.unilibrary.uz/api/user/guest-publisher-resources';

    CONST LANGUAGE_UZ  = 'uz';
    CONST LANGUAGE_OZ  = 'oz';
    CONST LANGUAGE_RU  = 'ru';
    CONST LANGUAGE_EN  = 'en';

    public function libraryUnilibraryCurl($id = null)
    {
        $curl = new curl\Curl();

        $unilibraryParams = [
            'language'       => self::LANGUAGE_UZ
        ];
        if ($id == null) {
            $listId = null;
        } else {
            $listId = '/'.$id;
        }
        $apiUnilibraryDomain = $this->apiUnilibraryDomain;

        $response = Json::decode($curl->setGetParams($unilibraryParams)->get($apiUnilibraryDomain . $listId));
        try {
            return $response['result'];
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }
}