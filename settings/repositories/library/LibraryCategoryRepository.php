<?php

namespace settings\repositories\library;

use settings\entities\library\LibraryCategory;
use settings\entities\NotFoundException;
use settings\helpers\LanguageHelper;
use Yii;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

class LibraryCategoryRepository
{
    /**
     * @param $id
     * @return array|LibraryCategory|ActiveRecord|null
     */
    public function get($id)
    {
        return $this->getBy(['id' => $id]);
    }

    /**
     * @param $id
     * @return array|LibraryCategory|ActiveRecord|null
     */
    public function find($id)
    {
        return LibraryCategory::find()->andWhere(['id' => $id])->limit(1)->one();
    }

    /**
     * @param $fields
     * @return array|LibraryCategory[]|ActiveRecord[]
     */
    public function fieldAll($fields){
        return LibraryCategory::find()
            ->where(['in', 'id', $fields])
            ->all();
    }

    /**
     * @param array $condition
     * @return array|LibraryCategory|ActiveRecord|null
     */
    private function getBy(array $condition)
    {
        if (!empty($item = LibraryCategory::find()->where($condition)->limit(1)->one())) {
            return $item;
        }
        throw new NotFoundException(Yii::t('app', 'Library Category is not found!'));
    }

    /**
     * @return array
     */
    public function findAll()
    {
        $title = LanguageHelper::getTitleLang();
        return LibraryCategory::find()
            ->select(["id", "{$title} as title"])
            ->asArray()
            ->all();
    }

    /**
     * @param LibraryCategory $item
     */
    public function save(LibraryCategory $item)
    {
        if (!$item->save()) {
            throw new \RuntimeException(Yii::t('app', 'Saving error.'));
        }
    }

    /**
     * @param LibraryCategory $item
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove(LibraryCategory $item)
    {
        if (!$item->delete()) {
            throw new \RuntimeException(Yii::t('app', 'Removing error.'));
        }
    }
}