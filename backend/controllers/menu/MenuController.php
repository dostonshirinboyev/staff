<?php

namespace backend\controllers\menu;

use settings\forms\menu\MenuForm;
use settings\forms\menu\search\MenuSearchForm;
use settings\readModels\menu\MenuReadRepository;
use settings\repositories\menu\MenuRepository;
use settings\services\menu\MenuService;
use settings\status\menu\MenuStatus;
use Throwable;
use Yii;
use yii\db\StaleObjectException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class MenuController extends Controller
{
    private $menuService;
    private $menuReadRepository;
    private $menuRepository;

    public function __construct($id, $module,
        MenuService        $menuService,
        MenuReadRepository $menuReadRepository,
        MenuRepository     $menuRepository,
        $config = []) {

        parent::__construct($id, $module, $config);
        $this->menuService        = $menuService;
        $this->menuReadRepository = $menuReadRepository;
        $this->menuRepository     = $menuRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    /**
     * @return string
     */
    public function actionIndex(): string
    {
        $queryParams = Yii::$app->request->queryParams;
        $searchForm = new MenuSearchForm();

        $searchForm->load($queryParams);
        $dataProvider = $this->menuReadRepository->search($searchForm);

        return $this->render('index', [
            'searchForm' => $searchForm,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * @param $id
     * @return string
     */
    public function actionView($id): string
    {
        $road = $this->menuRepository->get($id);
        return $this->render('view', [
            'model' => $road
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $form = new MenuForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $model = $this->menuService->create($form);
                Yii::$app->session->setFlash('success', Yii::t('app', "Menyu saqlandi"));
                return $this->redirect(['view', 'id' => $model->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('create', [
            'form' => $form,
            'model' => null,
        ]);
    }

    /**
     * @param $id
     * @return string|Response
     */
    public function actionUpdate($id)
    {
        $model = $this->menuRepository->get($id);
        $form = new MenuForm($model);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->menuService->edit($model->id, $form);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Menyu yangilandi').' (id: '.$model->id.')');
                return $this->redirect(['view', 'id' => $model->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'form' => $form,
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @param $status
     * @return Response
     */
    public function actionActivate($id, $status): Response
    {
        try {
            $model = $this->menuRepository->get($id);
            $this->menuService->activate($model->id);
            Yii::$app->session->setFlash('success', MenuStatus::getLabel(!$model->status).' (id: '.$model->id.') (title: '.$model->title_uz.')');
            if($status == 'index'){
                return $this->redirect(['index']);
            } elseif ($status == 'view') {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }

    /**
     * @param $id
     * @return Response
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id): Response
    {
        try {
            $this->menuRepository->remove($id);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }
}