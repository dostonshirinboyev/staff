<?php

namespace arm\controllers;
use settings\forms\library\search\LibraryZiyonetSearchForm;
use settings\integrations\library\LibraryCategoryZiyonetIntegration;
use settings\integrations\library\LibraryZiyonetIntegration;
use settings\integrations\library\unilibrary\UnilibraryBookIntegration;
use settings\readModels\library\LibraryZiyonetReadRepository;
use Yii;
use yii\web\Controller;

class TestController extends Controller
{
    private $libraryCategoryZiyonetIntegration;
    private $libraryZiyonetIntegration;
    private $libraryZiyonetReadRepository;

    public function __construct(
        $id,
        $module,
        LibraryCategoryZiyonetIntegration  $libraryCategoryZiyonetIntegration,
        LibraryZiyonetIntegration          $libraryZiyonetIntegration,
        LibraryZiyonetReadRepository       $libraryZiyonetReadRepository,
        $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->libraryCategoryZiyonetIntegration = $libraryCategoryZiyonetIntegration;
        $this->libraryZiyonetIntegration         = $libraryZiyonetIntegration;
        $this->libraryZiyonetReadRepository      = $libraryZiyonetReadRepository;
    }

//    public function actionIndex(){
////        $ziyonetCategory = $this->ziyonetBookCategoryIntegration->ziyonetBookCategoryCurl();
////        echo "<pre>";
////        print_r($ziyonetCategory); die();
//
//        $ziyonetBook = $this->libraryZiyonetIntegration->libraryZiyonetCurl();
//        echo "<pre>";
//        print_r($ziyonetBook); die();
//    }
    public function actionZiyonet(): string
    {
        $queryParams = Yii::$app->request->queryParams;
        $searchForm = new LibraryZiyonetSearchForm();

        $searchForm->load($queryParams);
        $dataProvider = $this->libraryZiyonetReadRepository->search($searchForm);

        return $this->render('lists', [
            'searchForm' => $searchForm,
            'dataProvider' => $dataProvider,
        ]);
    }
}