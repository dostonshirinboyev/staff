<?php

namespace settings\integrations\library;

use Yii;
use yii\helpers\Json;
use linslin\yii2\curl;

class LibraryCategoryZiyonetIntegration
{
    private $apiZiyonetDomain       = 'https://api.ziyonet.uz/api';
    private $libraryZiyonetCategory = 'library/categories';

    CONST LANGUAGE_UZ  = 'uz';
    CONST LANGUAGE_OZ  = 'oz';
    CONST LANGUAGE_RU  = 'ru';
    CONST LANGUAGE_EN  = 'en';

    public function libraryZiyonetCategoryCurl($language = self::LANGUAGE_UZ)
    {
        $curl = new curl\Curl();

        $apiZiyonetDomain = $this->apiZiyonetDomain .'/'. $language .'/'. $this->libraryZiyonetCategory;

        $response = Json::decode($curl->get($apiZiyonetDomain));
        try {
            if (!empty($response['data'])) {
                return $response['data'];
            } else {
                return Yii::t('app', "Ziyonetdan kategoriya kelmayapti!");
            }
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }
}