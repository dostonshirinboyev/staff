<?php

namespace settings\integrations\library;

use Yii;
use yii\helpers\Json;
use linslin\yii2\curl;

class LibraryCategoryUnilibraryIntegration
{
    private $apiUnilibraryDomain    = 'https://api.unilibrary.uz/api/user/guest-publisher-resources';

    CONST LANGUAGE_UZ  = 'uz';
    CONST LANGUAGE_OZ  = 'oz';
    CONST LANGUAGE_RU  = 'ru';
    CONST LANGUAGE_EN  = 'en';

    public function libraryUnilibraryCurl()
    {
        $curl = new curl\Curl();

        $unilibraryParams = [
            'language'     => self::LANGUAGE_UZ,
        ];

        $apiUnilibraryDomain = $this->apiUnilibraryDomain;

//        $response = Json::decode($curl->setGetParams($ziyonetParams)->get($apiZiyonetDomain));
//        try {
//            if (!empty($response['data'])) {
//                return $response['data'];
//            } else {
//                return Yii::t('app', "Ziyonetdan kutubxonasi kelmayapti!");
//            }
//        } catch (\DomainException $e) {
//            Yii::$app->errorHandler->logException($e);
//            Yii::$app->session->setFlash('error', $e->getMessage());
//        }
    }
}