<?php

namespace settings\forms\enum;

use settings\entities\enums\EnumMenuCategory;
use settings\forms\enum\traits\EnumMenuCategoryTrait;
use yii\base\Model;

class EnumMenuCategoryForm extends Model
{
    use EnumMenuCategoryTrait;

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['code_name'], 'required'],
            [['updated_by'], 'default', 'value' => null],
            [['status', 'is_deleted', 'created_by', 'updated_by'], 'integer'],
            [['title_uz', 'title_oz', 'title_ru', 'title_en', 'code_name'], 'string', 'max' => 255],
            [
                ['code_name'],
                'unique',
                'targetClass' => EnumMenuCategory::class,
                'filter' =>   $this->code_name ? ['<>', 'code_name', $this->code_name] : null,
                'targetAttribute' => ['code_name']
            ],
        ];
    }
}