<?php

namespace settings\integrations;

use Yii;
use yii\helpers\Json;
use linslin\yii2\curl;

class HemisEmployeeIntegration
{
    private $hemisToken     = '8saCt8FlABQWLbQFE2Kc-WyNBaA16Yki';
    private $apiHemisDomain = 'https://student.otmsamvmi.uz/rest/v1/data/';
    private $employee_list  = 'employee-list';

    public function hemisEmployeeCurl(string $type, $hemisId = null)
    {
        $curl = new curl\Curl();
        $hemisAuthorization = [
            "Accept"        => "application/json",
            "Authorization" => "Bearer {$this->hemisToken}"
        ];
        if ($hemisId == null) {
            $hemisParams = [
                'type'      => $type
            ];
        } else {
            $hemisParams = [
                'type'      => $type,
                'search'    => $hemisId,
            ];
        }

        $apiHemisDomain = $this->apiHemisDomain . $this->employee_list;

        $response = $curl->setHeaders($hemisAuthorization)->setGetParams($hemisParams)->get($apiHemisDomain);

        if ($response == true) {
            return Json::decode($response);
        } else {
            return Yii::t('app', "Manzil domeni topilmadi!");
        }
    }
}