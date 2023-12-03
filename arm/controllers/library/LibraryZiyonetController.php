<?php

namespace arm\controllers\library;

use settings\forms\library\search\LibraryZiyonetSearchForm;
use settings\integrations\library\LibraryCategoryZiyonetIntegration;
use settings\integrations\library\LibraryZiyonetIntegration;
use settings\readModels\library\LibraryZiyonetReadRepository;
use Yii;
use yii\base\BaseObject;
use yii\web\Controller;

class LibraryZiyonetController extends Controller
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

        public function actionLists()
        {
            $page = Yii::$app->request->get('page');
            $categorys = $this->libraryCategoryZiyonetIntegration->libraryZiyonetCategoryCurl();
            $queryParams = Yii::$app->request->queryParams;
            $searchForm = new LibraryZiyonetSearchForm();

            $searchForm->load($queryParams);
            $dataProvider = $this->libraryZiyonetReadRepository->search($searchForm, null, $page);

            return $this->render('lists', [
                'searchForm' => $searchForm,
                'dataProvider' => $dataProvider,
                'categorys' => $categorys
            ]);
        }

    public function actionCategoryList()
    {
        $id = Yii::$app->request->get('id');
        $categorys = $this->libraryCategoryZiyonetIntegration->libraryZiyonetCategoryCurl();
        $queryParams = Yii::$app->request->queryParams;
        $searchForm = new LibraryZiyonetSearchForm();

        $searchForm->load($queryParams);
        $dataProvider = $this->libraryZiyonetReadRepository->search($searchForm, $id);

        return $this->render('category-list', [
            'searchForm' => $searchForm,
            'dataProvider' => $dataProvider,
            'categorys' => $categorys
        ]);
    }

    public function actionView()
    {
        return $this->render('view');
    }
}