<?php

namespace settings\repositories\user;

use settings\entities\NotFoundException;
use settings\entities\user\UserPersonalData;
use Yii;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

class UserPersonalDataRepository
{
    /**
     * @param $user_id
     * @return array|UserPersonalData|ActiveRecord|null
     */
    public function get($user_id)
    {
        if ($user_id != null) {
            return $this->getBy(['user_id' => $user_id]);
        }
    }

    /**
     * @param $user_id
     * @return array|UserPersonalData|ActiveRecord|null
     */
    public function find($user_id)
    {
        return UserPersonalData::find()->andWhere(['user_id' => $user_id])->limit(1)->one();
    }

    /**
     * @param $fields
     * @return array|UserPersonalData[]|ActiveRecord[]
     */
    public function fieldAll($fields){
        return UserPersonalData::find()
            ->where(['in', 'id', $fields])
            ->all();
    }

    /**
     * @param array $condition
     * @return array|UserPersonalData|ActiveRecord|null
     */
    private function getBy(array $condition)
    {
        if (!empty($item = UserPersonalData::find()->where($condition)->limit(1)->one())) {
            return $item;
        }
        throw new NotFoundException(Yii::t('app', 'User Personal Data is not found!'));
    }

    /**
     * @param UserPersonalData $item
     */
    public function save(UserPersonalData $item)
    {
        if (!$item->save()) {
            throw new \RuntimeException(Yii::t('app', 'Saving error.'));
        }
    }

    /**
     * @param UserPersonalData $item
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove(UserPersonalData $item)
    {
        if (!$item->delete()) {
            throw new \RuntimeException(Yii::t('app', 'Removing error.'));
        }
    }
}