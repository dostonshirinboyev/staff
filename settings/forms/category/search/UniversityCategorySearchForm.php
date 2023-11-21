<?php

namespace settings\forms\category\search;

use settings\forms\category\traits\UniversityCategoryTrait;
use yii\base\Model;

class UniversityCategorySearchForm extends Model
{
    use UniversityCategoryTrait;

    public function rules(): array
    {
        return [
            [['id','parent_id', 'order', 'status', 'is_deleted', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_ru', 'title_uz', 'title_oz', 'code_name'], 'string', 'max' => 255],
            [['date_from', 'date_to'], 'date', 'format' => 'php:d-m-Y'],
        ];
    }

}