<?php

namespace arm\controllers\library;

use settings\forms\library\search\LibraryUnilibrarySearchForm;
use settings\integrations\library\LibraryCategoryUnilibraryIntegration;
use settings\integrations\library\LibraryUnilibraryIntegration;
use settings\readModels\library\LibraryUnilibraryReadRepository;
use Yii;
use yii\web\Controller;

class LibraryUnilibraryController extends Controller
{
    private $libraryCategoryUnilibraryIntegration;
    private $libraryUnilibraryIntegration;
    private $libraryUnilibraryReadRepository;

    public function __construct(
        $id,
        $module,
        LibraryCategoryUnilibraryIntegration  $libraryCategoryUnilibraryIntegration,
        LibraryUnilibraryIntegration          $libraryUnilibraryIntegration,
        LibraryUnilibraryReadRepository       $libraryUnilibraryReadRepository,

        $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->libraryCategoryUnilibraryIntegration = $libraryCategoryUnilibraryIntegration;
        $this->libraryUnilibraryIntegration         = $libraryUnilibraryIntegration;
        $this->libraryUnilibraryReadRepository      = $libraryUnilibraryReadRepository;
    }

    public function actionLists()
    {
        $page = Yii::$app->request->get('page');
        $categorys = $this->libraryCategoryUnilibraryIntegration->libraryUnilibraryCurl();
        $queryParams = Yii::$app->request->queryParams;
        $searchForm = new LibraryUnilibrarySearchForm();

        $searchForm->load($queryParams);
        $dataProvider = $this->libraryUnilibraryReadRepository->search();
        return $this->render('lists', [
            'searchForm' => $searchForm,
            'dataProvider' => $dataProvider,
            'categorys' => $categorys
        ]);
    }
    public function actionList()
    {
        $id = Yii::$app->request->get('id');
        $model = $this->libraryUnilibraryIntegration->libraryUnilibraryCurl($id);
        return $this->render('list', [
            'model' => $model
        ]);

    }
    public function actionCategory()
    {
        $id = Yii::$app->request->get('id');
        $categorys = $this->libraryCategoryUnilibraryIntegration->libraryUnilibraryCurl();
    }

    public function actionTest()
    {
        $library = $this->libraryUnilibraryIntegration->libraryUnilibraryCurl();
        echo "<pre>";
        print_r($library);
    }
}