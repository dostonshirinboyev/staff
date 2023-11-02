<?php

namespace settings\helpers;

use Yii;

class UserTypeHelper
{
    CONST TYPE_STUDENT  = 'student';
    CONST TYPE_TEACHER  = 'teacher';
    CONST TYPE_EMPLOYEE = 'employee';

    /**
     * @return array
     */
    public static function setLabel(): array
    {
        return [
            self::TYPE_STUDENT      => Yii::t('app', 'Talaba'),
            self::TYPE_TEACHER      => Yii::t('app', "O'qituvchi"),
            self::TYPE_EMPLOYEE     => Yii::t('app', 'Hodim'),
        ];
    }

    /**
     * @param string $item
     * @return mixed
     */
    public static function getLabel(string $item)
    {
        return self::setLabel()[$item];
    }

    /**
     * @param $item
     * @param $url
     * @return mixed
     */
    public static function getTypeHtml($item)
    {
        if ($item->type == self::TYPE_STUDENT) {
            return self::getLabel(self::TYPE_STUDENT);
        } elseif ($item->type == self::TYPE_TEACHER) {
            return self::getLabel(self::TYPE_TEACHER);
        } elseif ($item->type == self::TYPE_EMPLOYEE){
            return self::getLabel(self::TYPE_EMPLOYEE);
        } else {
            return Yii::t('app', "Typni qaytadan tekshiring!");
        }
    }

    /**
     * @return array
     */
    public static function getTypeForSelect(): array
    {
        $list = [];
        foreach (self::setLabel() as $key => $item) {
            $list[] = [
                'id' => $key,
                'value' => $item
            ];
        }
        return $list;
    }
}