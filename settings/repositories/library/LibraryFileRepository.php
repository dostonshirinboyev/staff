<?php

namespace settings\repositories\library;

use settings\entities\library\LibraryFile;
use settings\entities\NotFoundException;
use Yii;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

class LibraryFileRepository
{
    /**
     * @param $id
     * @return array|LibraryFile|ActiveRecord|null
     */
    public function get($id)
    {
        return $this->getBy(['id' => $id]);
    }

    /**
     * @param $id
     * @return array|LibraryFile|ActiveRecord|null
     */
    public function find($id)
    {
        return LibraryFile::find()->andWhere(['id' => $id])->limit(1)->one();
    }

    /**
     * @param $fields
     * @return array|LibraryFile[]|ActiveRecord[]
     */
    public function fieldAll($fields){
        return LibraryFile::find()
            ->where(['in', 'id', $fields])
            ->all();
    }

    /**
     * @param array $condition
     * @return array|LibraryFile|ActiveRecord|null
     */
    private function getBy(array $condition)
    {
        if (!empty($item = LibraryFile::find()->where($condition)->limit(1)->one())) {
            return $item;
        }
        throw new NotFoundException(Yii::t('app', 'Library File is not found!'));
    }

    /**
     * @param LibraryFile $item
     */
    public function save(LibraryFile $item)
    {
        if (!$item->save()) {
            throw new \RuntimeException(Yii::t('app', 'Saving error.'));
        }
    }

    /**
     * @param LibraryFile $item
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove(LibraryFile $item)
    {
        if (!$item->delete()) {
            throw new \RuntimeException(Yii::t('app', 'Removing error.'));
        }
    }
}