<?php

namespace arm\controllers\cabinet;

use settings\auth\TelegramAuth;
use settings\repositories\user\UserPersonalDataRepository;
use settings\repositories\user\UserTelegramRepository;
use Yii;
use yii\web\Controller;

class ProfileController extends Controller
{
    private $personalDataRepository;
    private $telegramAuth;
    private $userTelegramRepository;

    public function __construct(
        $id,
        $module,
        UserPersonalDataRepository $personalDataRepository,
        TelegramAuth $telegramAuth,
        UserTelegramRepository $userTelegramRepository,
        $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->personalDataRepository = $personalDataRepository;
        $this->telegramAuth = $telegramAuth;
        $this->userTelegramRepository = $userTelegramRepository;
    }

    /**
     * @return string
     */
    public function actionList(): string
    {
        return $this->render('list', [
            'profile'  => $this->personalDataRepository->get(Yii::$app->user->id),
            'telegram' => $this->telegramAuth->buttonHtmTelegramAuth("cabinet/telegram/create", TelegramAuth::DATA_SIZE_MEDIUM)
        ]);
    }
}