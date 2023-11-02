<?php
namespace frontend\controllers\auth;

use common\auth\Identity;
use settings\forms\auth\student\LoginStudentForm;
use settings\services\auth\HemisIdAuthService;
use Yii;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use Throwable;
use yii\base\Exception;

class AuthController extends Controller
{
    private $hemisIdAuthService;
//    private $service;

    public function __construct(
        $id,
        $module,
        HemisIdAuthService $hemisIdAuthService,
//        AuthService $service,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->hemisIdAuthService = $hemisIdAuthService;
//        $this->service = $service;
    }

    /**
     * @return array[]
     */
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'hemis-student-login' => ['GET'],
                    'hemis-employee-login' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = 'main-login';
        
        $form = new LoginStudentForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $user = $this->service->auth($form);
                Yii::$app->user->login(new Identity($user), $form->rememberMe ? Yii::$app->params['user.rememberMeDuration'] : 0);
                return $this->goBack();
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('login', [
            'model' => $form,
        ]);
    }

    /**
     * @return Response
     * @throws BadRequestHttpException
     * @throws Exception
     * @throws Throwable
     */
    public function actionHemisStudentLogin(): Response
    {
        $code = Yii::$app->request->get('code');
        $state = Yii::$app->request->get('state');
        try {
            $user = $this->hemisIdAuthService->authStudent($code, $state);
            Yii::$app->user->login(new Identity($user), 86400);
            return $this->goBack();
        } catch (\DomainException $e) {
            throw new BadRequestHttpException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @return Response
     * @throws BadRequestHttpException
     * @throws Exception
     * @throws Throwable
     */
    public function actionHemisEmployeeLogin(): Response
    {
        $code = Yii::$app->request->get('code');
        $state = Yii::$app->request->get('state');
        try {
            $user = $this->hemisIdAuthService->authEmployee($code, $state);
            Yii::$app->user->login(new Identity($user), 86400);
            return $this->goBack();
        } catch (\DomainException $e) {
            throw new BadRequestHttpException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
