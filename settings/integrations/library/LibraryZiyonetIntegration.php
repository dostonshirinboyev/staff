<?php

namespace settings\integrations\library;

use Yii;
use yii\helpers\Json;
use linslin\yii2\curl;

class LibraryZiyonetIntegration
{
    private $apiZiyonetDomain    = 'https://api.ziyonet.uz/api';
    private $libraryZiyonet      = 'library';

    private $category_id         = 'category_id';
    private $search_by_name      = 'search_by_name';
    private $search_by_desc      = 'search_by_desc';


    CONST LANGUAGE_UZ  = 'uz';
    CONST LANGUAGE_OZ  = 'oz';
    CONST LANGUAGE_RU  = 'ru';
    CONST LANGUAGE_EN  = 'en';

    public function libraryZiyonetCurl(
        int    $category_id    = null,
        string $search_by_name = null,
        string $search_by_desc = null,
        string $page           = null,
        $language              = self::LANGUAGE_UZ
    )
    {
        $curl = new curl\Curl();

        if (!empty($category_id) && !empty($search_by_name) && !empty($search_by_desc) && !empty($page)) {
            $ziyonetParams = null;
        } else {
            $ziyonetParams = [
                'category_id'     => $category_id,
                'search_by_name'  => $search_by_name,
                'search_by_desc'  => $search_by_desc,
                'page'            => $page,
            ];
        }

        $apiZiyonetDomain = $this->apiZiyonetDomain .'/'. $language .'/'. $this->libraryZiyonet;

        $response = Json::decode($curl->setGetParams($ziyonetParams)->get($apiZiyonetDomain));
        try {
            if (!empty($response['data'])) {
                return $response['data'];
            } else {
                return Yii::t('app', "Ziyonetdan kutubxonasi kelmayapti!");
            }
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }
}