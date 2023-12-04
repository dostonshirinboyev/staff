<?php

namespace settings\readModels\library;

use settings\forms\library\search\LibraryZiyonetSearchForm;
use settings\integrations\library\LibraryZiyonetIntegration;
use yii\base\BaseObject;
use yii\data\ArrayDataProvider;

class LibraryZiyonetReadRepository
{
    public function search(LibraryZiyonetSearchForm $form, $category_id = null, $page = null)
    {
        $libraryZiyonetDataProvider = (new LibraryZiyonetIntegration())->libraryZiyonetCurl(
            $category_id,
            $form->search_by_name,
            $form->search_by_desc,
            $page
        );

        return new ArrayDataProvider([
            'allModels' => $libraryZiyonetDataProvider,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
    }
}