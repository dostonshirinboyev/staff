<?php

namespace settings\readModels\library;

use settings\forms\library\search\LibraryZiyonetSearchForm;
use settings\integrations\library\LibraryZiyonetIntegration;
use yii\base\BaseObject;
use yii\data\ArrayDataProvider;

class LibraryZiyonetReadRepository
{
    public function search(LibraryZiyonetSearchForm $form)
    {
        $libraryZiyonetDataProvider = (new LibraryZiyonetIntegration())->libraryZiyonetCurl(
            $form->category_id,
            $form->search_by_name,
            $form->search_by_desc,
            $form->page,
        );

        return new ArrayDataProvider([
            'allModels' => $libraryZiyonetDataProvider,
            'pagination' => [
                'pageSize' => 12
            ],
        ]);
    }
}