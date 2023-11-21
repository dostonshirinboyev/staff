<?php

namespace settings\status\category;

use Yii;
use yii\helpers\Html;

class UniversityCategoryStatus
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * @return array
     */
    public static function setLabel(): array
    {
        return [
            self::STATUS_ACTIVE   => Yii::t('app', 'Faol'),
            self::STATUS_INACTIVE => Yii::t('app', 'Faol emas'),
        ];
    }

    /**
     * @param int $status
     * @return mixed
     */
    public static function getLabel(int $status)
    {
        return self::setLabel()[$status];
    }

    /**
     * @param $data
     * @param $url
     * @return string
     */
    public static function getStatusHtml($data, $url): string
    {
        return Html::a(self::getLabel($data->status),
            ['activate', 'id' => $data->id, 'status' => $url],
            [
                'title' => self::setLabel()[(!$data->status == self::STATUS_ACTIVE || $data->status == self::STATUS_INACTIVE)]." qilish",
                'class' => $data->status === self::STATUS_ACTIVE ? 'btn btn-success btn-sm text-white' : 'btn btn-danger btn-sm text-white',
            ]
        );
    }

    /**
     * @return array
     */
    public static function getStatusForSelect(): array
    {
        $list = [];
        foreach (self::setLabel() as $key => $item) {
            $list[] = [
                'id'    => $key,
                'value' => $item
            ];
        }
        return $list;
    }
}