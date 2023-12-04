<?php

namespace settings\readModels\library;

use settings\forms\library\search\LibraryUnilibrarySearchForm;
use settings\integrations\library\LibraryUnilibraryIntegration;
use yii\data\ArrayDataProvider;

class LibraryUnilibraryReadRepository
{
    public function search($page = null)
    {
        $libraryUnilibraryDataProvider = (new LibraryUnilibraryIntegration())->libraryUnilibraryCurl(
            $page
        );

        return new ArrayDataProvider([
            'allModels' => $libraryUnilibraryDataProvider['data'],
            'totalCount' => $libraryUnilibraryDataProvider['total'],
            'pagination' => [
                'defaultPageSize' => $libraryUnilibraryDataProvider['to'],
                'page' => $libraryUnilibraryDataProvider['current_page'],
            ],
        ]);
    }
}