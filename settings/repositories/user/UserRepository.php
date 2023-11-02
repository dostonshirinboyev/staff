<?php

namespace settings\repositories\user;

use settings\entities\NotFoundException;
use settings\entities\user\User;
use yii\db\ActiveRecord;

class UserRepository
{
    /**
     * @param int $user_id
     * @return array|User|ActiveRecord
     */
    public function findByUser($user_id): User
    {
        return $this->findBy(['id' => $user_id]);
    }

    public function get($id) //: User
    {
        return $this->getBy(['id' => $id]);
    }

    public function findByHemisIdNumber(int $hemis_id_number): ?User
    {
        return User::find()->andWhere(['hemis_id_number' => $hemis_id_number])->limit(1)->one();
    }

    public function getByUsername($username) //: User
    {
        return $this->getBy(['username' => $username]);
    }

    public function save(User $user, $runValidation = true) //: void
    {
        if (!$user->save($runValidation)) {
            \Yii::error($user->getErrors());
            throw new \RuntimeException('Saving error.');
        }
    }

    private function getBy($condition) //: User
    {
        if (empty($item = User::find()->andWhere($condition)->limit(1)->one())) {
            throw new NotFoundException('User is not found.');
        }
        return $item;
    }

    /**
     * @param $condition
     * @return null|User|ActiveRecord
     */
    private function findBy($condition)
    {
        if (empty($item = User::find()->andWhere($condition)->limit(1)->one())) {
            return null;
        }
        return $item;
    }

    /**
     * @param $condition
     * @return array|User|ActiveRecord
     */
    private function findAllBy($condition)
    {
        return User::find()->andWhere($condition)->all();
    }
}