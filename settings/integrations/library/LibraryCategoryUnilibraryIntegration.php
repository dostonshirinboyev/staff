<?php

namespace settings\integrations\library;

use Yii;
use yii\helpers\Json;
use linslin\yii2\curl;

class LibraryCategoryUnilibraryIntegration
{
    private $apiUnilibraryDomain = 'https://api.unilibrary.uz/api/crm/i18n/lists';

    CONST LANGUAGE_UZ  = 'uz';
    CONST LANGUAGE_OZ  = 'oz';
    CONST LANGUAGE_RU  = 'ru';
    CONST LANGUAGE_EN  = 'en';

    public function libraryUnilibraryCurl()
    {
        $curl = new curl\Curl();

        $unilibraryParams = [
            'language'     => self::LANGUAGE_UZ,
            'category'     => 'front',
        ];

        $apiUnilibraryDomain = $this->apiUnilibraryDomain;

        $response = Json::decode($curl->setGetParams($unilibraryParams)->get($apiUnilibraryDomain));
        try {
            if (!empty($result = $response['result'])) {
                return [
                    [
                        'id'    => 1,
                        'name'  => $result['All_literatures'],
                    ],
                    [
                        'id'    => 4,
                        'name'  => $result['All_articles'],
                    ],
                    [
                        'id'    => 3,
                        'name'  => $result['Dissertations'],
                    ],
                    [
                        'id'    => 2,
                        'name'  => $result['Monographs'],
                    ],
                    [
                        'id'    => 'journal',
                        'name'  => $result['Journals'],
                    ],
                ];
            } else {
                return Yii::t('app', "Unilibrary kategory kutubxonasidan kelmayapti!");
            }
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }
}