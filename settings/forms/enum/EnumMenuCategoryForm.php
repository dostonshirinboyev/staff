<?php

namespace settings\forms\enum;

use settings\entities\user\User;
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
            [['created_at', 'updated_at'], 'safe'],
            [['title_uz', 'title_oz', 'title_ru', 'title_en', 'code_name'], 'string', 'max' => 255],
//            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
//            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
}