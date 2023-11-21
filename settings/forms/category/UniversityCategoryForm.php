<?php

namespace settings\forms\category;

use settings\entities\category\UniversityCategory;
use settings\entities\user\User;
use settings\forms\category\traits\UniversityCategoryTrait;
use yii\base\Model;

class UniversityCategoryForm extends Model
{
    use UniversityCategoryTrait;

    public function rules(): array
    {
        return [
            [['parent_id', 'order', 'status', 'is_deleted', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['parent_id', 'order', 'status', 'is_deleted', 'created_by', 'updated_by'], 'integer'],
            [['code_name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_ru', 'title_uz', 'title_oz', 'code_name'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => UniversityCategory::class, 'targetAttribute' => ['parent_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
}