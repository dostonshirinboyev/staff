<?php

namespace backend\controllers\category;

use settings\forms\category\search\UniversityCategorySearchForm;
use settings\forms\category\UniversityCategoryForm;
use settings\readModels\category\UniversityCategoryReadRepository;
use settings\repositories\category\UniversityCategoryRepository;
use settings\services\category\UniversityCategoryService;
use settings\status\category\UniversityCategoryStatus;
use Throwable;
use Yii;
use yii\db\StaleObjectException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class UniversityCategoryController extends Controller
{
    private $universityCategoryService;
    private $universityCategoryReadRepository;
    private $universityCategoryRepository;

    public function __construct($id, $module,
        UniversityCategoryService        $universityCategoryService,
        UniversityCategoryReadRepository $universityCategoryReadRepository,
        UniversityCategoryRepository     $universityCategoryRepository,
        $config = []) {

        parent::__construct($id, $module, $config);
        $this->universityCategoryService        = $universityCategoryService;
        $this->universityCategoryReadRepository = $universityCategoryReadRepository;
        $this->universityCategoryRepository     = $universityCategoryRepository;
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
        $searchForm = new UniversityCategorySearchForm();

        $searchForm->load($queryParams);
        $dataProvider = $this->universityCategoryReadRepository->search($searchForm);

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
        $road = $this->universityCategoryRepository->get($id);
        return $this->render('view', [
            'model' => $road
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $form = new UniversityCategoryForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $model = $this->universityCategoryService->create($form);
                Yii::$app->session->setFlash('success', Yii::t('app', "Kategoriya saqlandi"));
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
        $model = $this->universityCategoryRepository->get($id);
        $form = new UniversityCategoryForm($model);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->universityCategoryService->edit($model->id, $form);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Kategoriya yangilandi').' (id: '.$model->id.')');
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
    public function actionActivate($id, $status)
    {
        try {
            $model = $this->universityCategoryRepository->get($id);
            $this->universityCategoryService->activate($model->id);
            Yii::$app->session->setFlash('success', UniversityCategoryStatus::getLabel(!$model->status).' (id: '.$model->id.') (title: '.$model->title_uz.')');
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
            $this->universityCategoryService->remove($id);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }
}