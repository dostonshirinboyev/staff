<?php

namespace settings\services\auth;

use settings\access\Rbac;
use settings\auth\HemisID;
use settings\entities\user\User;
use settings\entities\user\UserPersonalData;
use settings\entities\user\UserPersonalNetworks;
use settings\helpers\GenderHelper;
use settings\helpers\Transaction;
use settings\integrations\HemisEmployeeIntegration;
use settings\repositories\user\UserPersonalDataRepository;
use settings\repositories\user\UserPersonalNetworksRepository;
use settings\repositories\user\UserRepository;
use settings\services\RoleManager;
use Yii;
use yii\base\Exception;
use yii\base\Security;

class HemisIdAuthService
{
    private $client;
    private $userRepository;
    private $userPersonalData;
    private $userPersonalNetwork;
    private $transaction;
    private $security;
    private $roles;
    private $hemisEmployeeIntegration;

    public function __construct(
        HemisID $client,
        UserRepository $userRepository,
        UserPersonalDataRepository $userPersonalData,
        UserPersonalNetworksRepository $userPersonalNetwork,
        Transaction $transaction,
        Security $security,
        RoleManager $roles,
        HemisEmployeeIntegration $hemisEmployeeIntegration
    )
    {
        $this->client = $client;
        $this->userRepository           = $userRepository;
        $this->userPersonalData         = $userPersonalData;
        $this->userPersonalNetwork      = $userPersonalNetwork;
        $this->transaction              = $transaction;
        $this->security                 = $security;
        $this->roles                    = $roles;
        $this->hemisEmployeeIntegration = $hemisEmployeeIntegration;
    }

    /**
     * @param $code
     * @param $state
     * @return User|null
     * @throws Exception
     * @throws \Throwable
     */
    public function authEmployee($code, $state): ?User
    {
        $hemisIdUserData = $this->client->fetchAuthHemis($code, $state, HemisID::TYPE_EMPLOYEE);
        if (empty($hemisUserData = $hemisIdUserData['hemis_user_data'])) {
            throw new \RuntimeException(Yii::t('app', "HemisID ning fetchAuthHemis() metodida xatolik yuz berdi!"));
        }
        $user = $this->userRepository->findByHemisIdNumber($hemisUserData['employee_id_number']);
        if ($user === null) {
            $user = User::createAuthHemis(
                $hemisUserData['login'],
                $hemisUserData['employee_id_number'],
                $this->security->generateRandomString(11),
                $hemisUserData['type'],
                $hemisUserData['id'],
                $hemisUserData['uuid'],
                $hemisIdUserData['access_token'],
            );

        } else {
            $user->editAuthHemis(
                $hemisUserData['login'],
                $hemisUserData['employee_id_number'],
                $this->security->generateRandomString(11),
                $hemisUserData['type'],
                $hemisUserData['uuid'],
                $hemisIdUserData['access_token'],
            );
        }
        $this->transaction->wrap(function () use ($user, $hemisUserData) {
            $this->userRepository->save($user);
            $hemisEmployee = $this->hemisEmployeeIntegration->hemisEmployeeCurl($user->type, $user->hemis_id_number);
            if ($hemisEmployee['data']['items'] == null) {
                $hemisData = [
                    'gender' => ['code' => GenderHelper::GENDER_MALE],
                    'hash' => 'hash file'
                ];
            } else {
                $hemisData = $hemisEmployee['data']['items'][0];
            }
            $this->roles->assign($user->id, $hemisUserData['type']);
            $userPersonalData = $this->userPersonalData->find($user->id);
            $userPersonalNetwork = $this->userPersonalNetwork->find($user->id);
            if ($userPersonalData === null && $userPersonalNetwork === null) {
                $userPersonalData = UserPersonalData::createAuthHemis(
                    $user->id,
                    $hemisUserData['firstname'],
                    $hemisUserData['surname'],
                    $hemisUserData['patronymic'],
                    $hemisUserData['surname'].' '.$hemisUserData['firstname'].' '.$hemisUserData['patronymic'],
                    $hemisUserData['surname']. ' '.substr($hemisUserData['firstname'], 0, 1). '. '.substr($hemisUserData['patronymic'], 0, 1). '.',
                    date("Y-m-d", strtotime($hemisUserData['birth_date'])),
                    $hemisData['gender']['code'],
                    $hemisUserData['picture'],
                    null,
                    null,
                    null,
                    null,
                    $hemisData['hash'],
                    $user->id,
                );
                $userPersonalNetwork = UserPersonalNetworks::createAuthHemis(
                    $user->id,
                    $hemisUserData['phone'],
                    $hemisUserData['email'],
                    $user->id,
                );
            } else {
                $userPersonalData->editAuthHemis(
                    $hemisUserData['firstname'],
                    $hemisUserData['surname'],
                    $hemisUserData['patronymic'],
                    $hemisUserData['surname'].' '.$hemisUserData['firstname'].' '.$hemisUserData['patronymic'],
                    $hemisUserData['surname']. ' '.substr($hemisUserData['firstname'], 0, 1). '. '.substr($hemisUserData['patronymic'], 0, 1). '.',
                    date("Y-m-d", strtotime($hemisUserData['birth_date'])),
                    $hemisData['gender']['code'],
                    $hemisUserData['picture'],
                    null,
                    null,
                    null,
                    null,
                    $hemisData['hash'],
                    $user->id,
                );
                $userPersonalNetwork->editAuthHemis(
                    $hemisUserData['phone'],
                    $hemisUserData['email'],
                    $user->id,
                );
            }
            $this->userPersonalData->save($userPersonalData);
            $this->userPersonalNetwork->save($userPersonalNetwork);
        });
        return $user;
    }

    /**
     * @param $code
     * @param $state
     * @return User|null
     * @throws \Throwable
     * @throws Exception
     */
    public function authStudent($code, $state): ?User
    {
        $hemisIdUserData = $this->client->fetchAuthHemis($code, $state, HemisID::TYPE_STUDENT);

        if (empty($hemisUserData = $hemisIdUserData['hemis_user_data'])) {
            throw new \RuntimeException(Yii::t('app', "HemisID ning fetchAuthHemis() metodida xatolik yuz berdi!"));
        }

        if (empty($hemisData = $hemisUserData['data'])) {
            throw new \RuntimeException(Yii::t('app', "HemisID tizimidan data kelmayapti!"));
        }
        $user = $this->userRepository->findByHemisIdNumber($hemisUserData['student_id_number']);
        if ($user === null) {
            $user = User::createAuthHemis(
                $hemisUserData['login'],
                $hemisUserData['student_id_number'],
                $this->security->generateRandomString(11),
                $hemisUserData['type'],
                $hemisUserData['id'],
                $hemisUserData['uuid'],
                $hemisIdUserData['access_token'],
            );

        } else {
            $user->editAuthHemis(
                $hemisUserData['login'],
                $hemisUserData['student_id_number'],
                $this->security->generateRandomString(11),
                $hemisUserData['type'],
                $hemisUserData['uuid'],
                $hemisIdUserData['access_token'],
            );
        }

        $this->transaction->wrap(function () use ($user, $hemisData) {
            $this->userRepository->save($user);
            $this->roles->assign($user->id, Rbac::ROLE_STUDENT);
            $userPersonalData = $this->userPersonalData->find($user->id);
            $userPersonalNetwork = $this->userPersonalNetwork->find($user->id);

            if ($userPersonalData === null && $userPersonalNetwork === null) {
                $userPersonalData = UserPersonalData::createAuthHemis(
                    $user->id,
                    $hemisData['first_name'],
                    $hemisData['second_name'],
                    $hemisData['third_name'],
                    $hemisData['full_name'],
                    $hemisData['short_name'],
                    date("Y-m-d", $hemisData['birth_date']),
                    $hemisData['gender']['code'],
                    $hemisData['image'],
                    $hemisData['country']['code'],
                    $hemisData['province']['code'],
                    $hemisData['district']['code'],
                    $hemisData['address'],
                    $hemisData['hash'],
                    $user->id,
                );
                $userPersonalNetwork = UserPersonalNetworks::createAuthHemis(
                    $user->id,
                    $hemisData['phone'],
                    $hemisData['email'],
                    $user->id,
                );
            } else {
                $userPersonalData->editAuthHemis(
                    $hemisData['first_name'],
                    $hemisData['second_name'],
                    $hemisData['third_name'],
                    $hemisData['full_name'],
                    $hemisData['short_name'],
                    date("Y-m-d", $hemisData['birth_date']),
                    $hemisData['gender']['code'],
                    $hemisData['image'],
                    $hemisData['country']['code'],
                    $hemisData['province']['code'],
                    $hemisData['district']['code'],
                    $hemisData['address'],
                    $hemisData['hash'],
                    $user->id,
                );

                $userPersonalNetwork->editAuthHemis(
                    $hemisData['phone'],
                    $hemisData['email'],
                    $user->id,
                );
            }
            $this->userPersonalData->save($userPersonalData);
            $this->userPersonalNetwork->save($userPersonalNetwork);
        });
        return $user;
    }
}