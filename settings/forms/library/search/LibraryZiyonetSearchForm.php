<?php

namespace settings\forms\library\search;

use settings\forms\library\traits\LibraryZiyonetTrait;
use yii\base\Model;

class LibraryZiyonetSearchForm extends Model
{
    use LibraryZiyonetTrait;

    public function rules(): array
    {
        return [
            [['category_id'], 'integer'],
            [['search_by_name', 'search_by_desc', 'page'], 'string'],
        ];
    }
}