<?php

namespace pf\controllers\cabinet;

use settings\auth\TelegramAuth;
use settings\forms\user\UserTelegramForm;
use settings\repositories\user\UserTelegramRepository;
use settings\services\user\UserTelegramService;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class TelegramController extends Controller
{
    private $telegramAuth;
    private $userTelegramService;
    private $userTelegramRepository;

    public function __construct(
        $id,
        $module,
        TelegramAuth            $telegramAuth,
        UserTelegramService     $userTelegramService,
        UserTelegramRepository  $userTelegramRepository,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->telegramAuth             = $telegramAuth;
        $this->userTelegramService      = $userTelegramService;
        $this->userTelegramRepository   = $userTelegramRepository;
    }

    /**
     * @return Response
     */
    public function actionCreate(): Response
    {
        $form = new UserTelegramForm();
        if ($form->load($this->telegramAuth->checkTelegramAuth(Yii::$app->request->get()),'') && $form->validate()) {
            try {
                $this->userTelegramService->create($form);
                Yii::$app->session->setFlash('success', Yii::t('app', "Telegram xabarnomasi ulandi!"));
                return $this->redirect(['/cabinet']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
    }


    public function actionUpdate()
    {
        $model = $this->userTelegramRepository->get(Yii::$app->user->id);
        $form = new UserTelegramForm();
        if ($form->load($this->telegramAuth->checkTelegramAuth(Yii::$app->request->get()),'') && $form->validate()) {
            try {
                $this->userTelegramService->edit($model->user_id, $form);
                Yii::$app->session->setFlash('success', Yii::t('app', "Telegram xabarnomasi ulandi!"));
                return $this->redirect(['/cabinet']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
    }

    /**
     * @return Response
     */
    public function actionDelete(): Response
    {
        try {
            $this->userTelegramService->remove(Yii::$app->user->id);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['/cabinet']);
    }
}