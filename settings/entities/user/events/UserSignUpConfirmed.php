<?php

namespace settings\entities\user\events;

use settings\entities\user;

class UserSignUpConfirmed
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}