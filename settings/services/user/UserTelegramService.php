<?php

namespace settings\services\user;

use settings\entities\user\UserTelegram;
use settings\forms\user\UserTelegramForm;
use settings\repositories\user\UserTelegramRepository;
use yii\db\StaleObjectException;
use Yii;

class UserTelegramService
{
    private $userTelegram;

    /**
     * UserTelegramService constructor.
     * @param UserTelegramRepository $userTelegram
     */
    public function __construct(
        UserTelegramRepository $userTelegram
    ){
        $this->userTelegram = $userTelegram;
    }

    public function create(UserTelegramForm $form)
    {
        $userTelegram = UserTelegram::create(
            $form->id,
            $form->username,
            $form->first_name,
            $form->last_name,
            $form->photo_url,
            $form->auth_date,
            $form->phone
        );
        $this->userTelegram->save($userTelegram);
        return $userTelegram;
    }

    public function edit($id, UserTelegramForm $form)
    {
        $userTelegram = $this->userTelegram->get($id);
        $userTelegram->edit(
            $form->username,
            $form->first_name,
            $form->last_name,
            $form->photo_url,
            $form->phone
        );
        $this->userTelegram->save($userTelegram);
    }

    /**
     * @param $user_id
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove($user_id)
    {
        $user_telegram = $this->userTelegram->get($user_id);
        $this->userTelegram->remove($user_telegram);
    }
}