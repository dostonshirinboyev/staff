<?php

namespace settings\integrations\library\unilibrary;
use Yii;
use yii\helpers\Json;
use linslin\yii2\curl;

class UnilibraryBookIntegration
{
    private $apiUnilibraryDomain = 'https://api.unilibrary.uz/api/user/guest-publisher-resources/321?language=uz';
    private $employee_list  = 'employee-list';

    CONST LANGUAGE_UZ  = 'uz';
    CONST LANGUAGE_OZ  = 'oz';
    CONST LANGUAGE_RU  = 'ru';
    CONST LANGUAGE_EN  = 'en';

    public function unilibraryBookCurl($language = self::LANGUAGE_UZ)
    {
        $curl = new curl\Curl();

        $hemisParams = [
            'language'      => $language
        ];

        $response = $curl->setGetParams($hemisParams)->get($this->apiUnilibraryDomain);

        if ($response == true) {
            return Json::decode($response);
        } else {
            return Yii::t('app', "Manzil domeni topilmadi!");
        }
    }
}