<?php

namespace settings\repositories\category;

use settings\entities\category\UniversityCategory;
use settings\entities\NotFoundException;
use settings\status\GeneralStatus;
use Yii;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

class UniversityCategoryRepository
{
    /**
     * @param $id
     * @return array|UniversityCategory|ActiveRecord|null
     */
    public function get($id)
    {
        return $this->getBy(['id' => $id]);
    }

    /**
     * @return array|UniversityCategory[]|ActiveRecord[]
     */
    public static function findAllForSelect(): array
    {
        $category = 'c';
        return UniversityCategory::find()
            ->select('*')
            ->alias("{$category}")
            ->where(["{$category}.status" => GeneralStatus::STATUS_ENABLED])
            ->asArray()
            ->all();
    }

    public static function findParentForSelect(): array
    {
        $category = 'c';
        return UniversityCategory::find()
            ->select('*')
            ->alias("{$category}")
            ->andWhere(["{$category}.status" => GeneralStatus::STATUS_ENABLED])
            ->andWhere(["{$category}.parent_id" => null])
            ->asArray()
            ->all();
    }

    /**
     * @param $fields
     * @return array|UniversityCategory[]|ActiveRecord[]
     */
    public function fieldAll($fields): array
    {
        return UniversityCategory::find()
            ->where(['in', 'id', $fields])
            ->all();
    }

    /**
     * @param array $condition
     * @return array|UniversityCategory|ActiveRecord|null
     */
    private function getBy(array $condition)
    {
        if (!empty($category = UniversityCategory::find()->where($condition)->limit(1)->one())) {
            return $category;
        }
        throw new NotFoundException(Yii::t('app', 'University Category is not found!'));
    }

    /**
     * @param UniversityCategory $category
     */
    public function save(UniversityCategory $category)
    {
        if (!$category->save()) {
            throw new \RuntimeException(Yii::t('app', 'Saving error.'));
        }
    }

    /**
     * @param UniversityCategory $category
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove(UniversityCategory $category)
    {
        if (!$category->delete()) {
            throw new \RuntimeException(Yii::t('app', 'Removing error.'));
        }
    }
}