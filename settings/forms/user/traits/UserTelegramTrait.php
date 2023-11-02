<?php

namespace settings\forms\user\traits;

use settings\entities\user\UserTelegram;

trait UserTelegramTrait
{
    public $user_id;
    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $photo_url;
    public $auth_date;
    public $phone;
    public $ip;
    public $hash;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    /**
     * @return array
     */
//    public function attributeLabels(): array
//    {
//        $label = new UserTelegram();
//        return $label->attributeLabels();
//    }
}