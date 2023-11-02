<?php

namespace settings\repositories\user;

use settings\entities\NotFoundException;
use settings\entities\user\UserTelegram;
use Yii;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;
use Throwable;

class UserTelegramRepository
{
    /**
     * @param $user_id
     * @return array|UserTelegram|ActiveRecord|null
     */
    public function get($user_id)
    {
        return $this->getBy(['user_id' => $user_id]);
    }

    /**
     * @param $user_id
     * @return array|UserTelegram|ActiveRecord|null
     */
    public function find($user_id)
    {
        return UserTelegram::find()->andWhere(['user_id' => $user_id])->limit(1)->one();
    }

    /**
     * @param $fields
     * @return array|UserTelegram[]|ActiveRecord[]
     */
    public function fieldAll($fields): array
    {
        return UserTelegram::find()
            ->where(['in', 'id', $fields])
            ->all();
    }

    /**
     * @param array $condition
     * @return array|UserTelegram|ActiveRecord|null
     */
    private function getBy(array $condition)
    {
        if (!empty($item = UserTelegram::find()->where($condition)->limit(1)->one())) {
            return $item;
        }
        throw new NotFoundException(Yii::t('app', 'User Telegram is not found!'));
    }

    /**
     * @param UserTelegram $item
     */
    public function save(UserTelegram $item)
    {
        if (!$item->save()) {
            throw new \RuntimeException(Yii::t('app', 'Saving error.'));
        }
    }

    /**
     * @param UserTelegram $item
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function remove(UserTelegram $item)
    {
        if (!$item->delete()) {
            throw new \RuntimeException(Yii::t('app', 'Removing error.'));
        }
    }
}