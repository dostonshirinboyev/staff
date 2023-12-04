<?php

namespace settings\forms\library\search;

use settings\forms\library\traits\LibraryUnilibraryTrait;
use yii\base\Model;

class LibraryUnilibrarySearchForm extends Model
{
    use LibraryUnilibraryTrait;

    public function rules(): array
    {
        return [
            [['id', 'resource_category_id'], 'integer'],
            [['global_search', 'page'], 'string'],
        ];
    }
}