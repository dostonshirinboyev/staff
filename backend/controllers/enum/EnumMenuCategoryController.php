<?php

namespace backend\controllers\enum;

use settings\forms\enum\EnumMenuCategoryForm;
use settings\forms\enum\search\EnumMenuCategorySearchForm;
use settings\readModels\enum\EnumMenuCategoryReadRepository;
use settings\repositories\enum\EnumMenuCategoryRepository;
use settings\services\enum\EnumMenuCategoryService;
use settings\status\menu\MenuStatus;
use Throwable;
use Yii;
use yii\db\StaleObjectException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class EnumMenuCategoryController extends Controller
{
    private $enumMenuCategoryService;
    private $enumMenuCategoryReadRepository;
    private $enumMenuCategoryRepository;

    public function __construct($id, $module,
        EnumMenuCategoryService         $enumMenuCategoryService,
        EnumMenuCategoryReadRepository  $enumMenuCategoryReadRepository,
        EnumMenuCategoryRepository      $enumMenuCategoryRepository,
        $config = []) {

        parent::__construct($id, $module, $config);
        $this->enumMenuCategoryService        = $enumMenuCategoryService;
        $this->enumMenuCategoryReadRepository = $enumMenuCategoryReadRepository;
        $this->enumMenuCategoryRepository     = $enumMenuCategoryRepository;
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
        $searchForm = new EnumMenuCategorySearchForm();

        $searchForm->load($queryParams);
        $dataProvider = $this->enumMenuCategoryReadRepository->search($searchForm);

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
        $model = $this->enumMenuCategoryRepository->get($id);
        return $this->render('view', [
            'model' => $model
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $form = new EnumMenuCategoryForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $model = $this->enumMenuCategoryService->create($form);
                Yii::$app->session->setFlash('success', Yii::t('app', "Enum Menu Category saqlandi"));
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
        $model = $this->enumMenuCategoryRepository->get($id);
        $form = new EnumMenuCategoryForm($model);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->enumMenuCategoryService->edit($model->id, $form);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Enum Menu Category yangilandi').' (id: '.$model->id.')');
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
            $model = $this->enumMenuCategoryRepository->get($id);
            $this->enumMenuCategoryService->activate($model->id);
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
            $model = $this->enumMenuCategoryRepository->get($id);
            $this->enumMenuCategoryService->remove($model->id);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }
}