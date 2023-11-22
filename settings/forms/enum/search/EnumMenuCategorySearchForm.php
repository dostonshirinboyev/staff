<?php

namespace settings\forms\enum\search;

use settings\forms\enum\traits\EnumMenuCategoryTrait;
use yii\base\Model;

class EnumMenuCategorySearchForm extends Model
{
    use EnumMenuCategoryTrait;

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['id','status', 'is_deleted', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_uz', 'title_oz', 'title_ru', 'title_en', 'code_name'], 'string', 'max' => 255],
        ];
    }
}