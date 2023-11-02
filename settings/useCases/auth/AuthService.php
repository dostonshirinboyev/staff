<?php

namespace settings\useCases\auth;

use settings\entities\user\User;
use settings\forms\auth\LoginStudentForm;
use settings\repositories\UserRepository;

class AuthService
{
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function auth(LoginStudentForm $form): User
    {
        $user = $this->users->findByUsernameOrEmail($form->username);
        if (!$user || !$user->isActive() || !$user->validatePassword($form->password)) {
            throw new \DomainException('Login yoki parol xato.');
        }
        return $user;
    }
}