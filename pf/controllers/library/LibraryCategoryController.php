<?php

namespace pf\controllers\library;

use settings\forms\library\LibraryCategoryForm;
use settings\forms\library\search\LibraryCategorySearchForm;
use settings\readModels\library\LibraryCategoryReadRepository;
use settings\repositories\library\LibraryCategoryRepository;
use settings\services\library\LibraryCategoryService;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class LibraryCategoryController extends Controller
{
    private $libraryService;
    private $libraryReadRepository;
    private $libraryRepository;

    public function __construct($id, $module,
        LibraryCategoryService          $libraryService,
        LibraryCategoryReadRepository   $libraryReadRepository,
        LibraryCategoryRepository       $libraryRepository,
        $config = []) {

        parent::__construct($id, $module, $config);
        $this->libraryService           = $libraryService;
        $this->libraryReadRepository    = $libraryReadRepository;
        $this->libraryRepository        = $libraryRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
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
        $searchForm = new LibraryCategorySearchForm();

        $searchForm->load($queryParams);
        $dataProvider = $this->libraryReadRepository->search($searchForm);

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
        $road = $this->libraryRepository->get($id);
        return $this->render('view', [
            'model' => $road
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $form = new LibraryCategoryForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $model = $this->libraryService->create($form);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Toifa saqlandi saqlandi'));
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
        $model = $this->libraryRepository->get($id);
        $form = new LibraryCategoryForm($model);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->libraryService->edit($model->id, $form);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Toifa yangilandi').' (id: '.$model->id.')');
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
}