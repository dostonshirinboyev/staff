<?php

namespace settings\readModels\library;

use settings\forms\library\search\LibraryUnilibrarySearchForm;
use settings\integrations\library\LibraryUnilibraryIntegration;
use yii\data\ArrayDataProvider;
use yii\data\Pagination;

class LibraryUnilibraryReadRepository
{
    public function search($page)
    {
        $libraryUnilibraryDataProvider = (new LibraryUnilibraryIntegration())->libraryUnilibraryCurl(null, $page);

        return new ArrayDataProvider([
            'allModels' => $libraryUnilibraryDataProvider['data'],
            'totalCount' => $libraryUnilibraryDataProvider['total'],
            'pagination' => [
                'defaultPageSize' => $libraryUnilibraryDataProvider['to'],
//                'page' => $libraryUnilibraryDataProvider['current_page'],
            ],
        ]);
        Pagination::
    }
}