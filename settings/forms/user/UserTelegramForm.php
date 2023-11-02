<?php

namespace settings\forms\user;

use settings\entities\user\User;
use settings\forms\user\traits\UserTelegramTrait;
use yii\base\Model;

class UserTelegramForm extends Model
{
    use UserTelegramTrait;

    public function rules(): array
    {
        return [
            [['id', 'first_name', 'auth_date'], 'required'],
//            [['id', 'auth_date', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['id', 'auth_date', 'created_by', 'updated_by'], 'integer'],
            [['photo_url', 'hash'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'first_name', 'last_name', 'phone', 'ip'], 'string', 'max' => 255],
//            [['telegram_id'], 'unique'],
//            [['username'], 'unique'],
//            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
//            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
//            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
}