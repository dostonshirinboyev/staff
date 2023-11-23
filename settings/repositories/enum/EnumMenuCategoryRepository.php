<?php

namespace settings\repositories\enum;

use settings\entities\enums\EnumMenuCategory;
use settings\entities\NotFoundException;
use settings\helpers\DeleteHelper;
use settings\status\GeneralStatus;
use Yii;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

class EnumMenuCategoryRepository
{
    /**
     * @param $id
     * @return array|EnumMenuCategory|ActiveRecord|null
     */
    public function get($id)
    {
        return $this->getBy(['id' => $id]);
    }

    /**
     * @return array|EnumMenuCategory[]|ActiveRecord[]
     */
    public static function findAllForSelect(): array
    {
        $enumMenuCategory = 'emc';
        return EnumMenuCategory::find()
            ->select('*')
            ->alias("{$enumMenuCategory}")
            ->andWhere(["{$enumMenuCategory}.status" => GeneralStatus::STATUS_ENABLED])
            ->andWhere(["{$enumMenuCategory}.is_deleted" => DeleteHelper::DELETE_NO])
            ->asArray()
            ->all();
    }

    /**
     * @param $fields
     * @return array|EnumMenuCategory[]|ActiveRecord[]
     */
    public function fieldAll($fields): array
    {
        return EnumMenuCategory::find()
            ->where(['in', 'id', $fields])
            ->all();
    }

    /**
     * @param array $condition
     * @return array|EnumMenuCategory|ActiveRecord|null
     */
    private function getBy(array $condition)
    {
        if (!empty($enumMenuCategory = EnumMenuCategory::find()->where($condition)->limit(1)->one())) {
            return $enumMenuCategory;
        }
        throw new NotFoundException(Yii::t('app', 'Enum Menu Category is not found!'));
    }

    /**
     * @param EnumMenuCategory $enumMenuCategory
     */
    public function save(EnumMenuCategory $enumMenuCategory)
    {
        if (!$enumMenuCategory->save()) {
            throw new \RuntimeException(Yii::t('app', 'Saving error.'));
        }
    }

    /**
     * @param EnumMenuCategory $enumMenuCategory
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove(EnumMenuCategory $enumMenuCategory)
    {
        if (!$enumMenuCategory->delete()) {
            throw new \RuntimeException(Yii::t('app', 'Removing error.'));
        }
    }
}