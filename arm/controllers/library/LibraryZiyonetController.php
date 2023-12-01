<?php

namespace arm\controllers\library;

use settings\integrations\library\LibraryCategoryZiyonetIntegration;
use settings\integrations\library\LibraryZiyonetIntegration;
use settings\readModels\library\LibraryZiyonetReadRepository;
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

        public function actionLists(){
        $ziyonetCategory = $this->libraryCategoryZiyonetIntegration->libraryZiyonetCategoryCurl();
            return $this->render('lists', [
                'model' => $ziyonetCategory
            ]);
    }
}