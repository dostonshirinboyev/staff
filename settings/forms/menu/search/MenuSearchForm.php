<?php

namespace settings\forms\menu\search;

use settings\forms\menu\traits\MenuTrait;
use yii\base\Model;

class MenuSearchForm extends Model
{
    use MenuTrait;

    public function rules(): array
    {
        return [
            [['id','parent_id', 'category_id', 'order', 'status', 'is_deleted', 'created_by', 'updated_by'], 'integer'],
            [['title_uz', 'title_oz', 'title_ru', 'title_en', 'code_name', 'created_at', 'updated_at'], 'safe'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:d-m-Y'],
        ];
    }
}