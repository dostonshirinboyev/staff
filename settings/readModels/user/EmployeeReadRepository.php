<?php

namespace settings\readModels\user;

use settings\integrations\HemisEmployeeIntegration;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\helpers\Json;

class EmployeeReadRepository
{
    public function search($hemisId = null)
    {
        $response = (new HemisEmployeeIntegration())->hemisEmployeeCurl('teacher', $hemisId)['data'];
        if ($hemisId == null) {
            return new ArrayDataProvider([
                'allModels' => $response['items'],
                'pagination' => [
                    'pageSize' => 12
                ],
            ]);
        } else {
            return $response['items'][0];
        }
    }
}