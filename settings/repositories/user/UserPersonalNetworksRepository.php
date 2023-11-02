<?php

namespace settings\repositories\user;

use settings\entities\NotFoundException;
use settings\entities\user\UserPersonalNetworks;
use Yii;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

class UserPersonalNetworksRepository
{
    /**
     * @param $user_id
     * @return array|UserPersonalNetworks|ActiveRecord|null
     */
    public function get($user_id)
    {
        return $this->getBy(['user_id' => $user_id]);
    }

    /**
     * @param $user_id
     * @return array|UserPersonalNetworks|ActiveRecord|null
     */
    public function find($user_id)
    {
        return UserPersonalNetworks::find()->andWhere(['user_id' => $user_id])->limit(1)->one();
    }

    /**
     * @param $fields
     * @return array|UserPersonalNetworks[]|ActiveRecord[]
     */
    public function fieldAll($fields){
        return UserPersonalNetworks::find()
            ->where(['in', 'id', $fields])
            ->all();
    }

    /**
     * @param array $condition
     * @return array|UserPersonalNetworks|ActiveRecord|null
     */
    private function getBy(array $condition)
    {
        if (!empty($item = UserPersonalNetworks::find()->where($condition)->limit(1)->one())) {
            return $item;
        }
        throw new NotFoundException(Yii::t('app', 'User Personal Networks is not found!'));
    }

    /**
     * @param UserPersonalNetworks $item
     */
    public function save(UserPersonalNetworks $item)
    {
        if (!$item->save()) {
            throw new \RuntimeException(Yii::t('app', 'Saving error.'));
        }
    }

    /**
     * @param UserPersonalNetworks $item
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove(UserPersonalNetworks $item)
    {
        if (!$item->delete()) {
            throw new \RuntimeException(Yii::t('app', 'Removing error.'));
        }
    }
}