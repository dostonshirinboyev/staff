<?php

namespace settings\forms\library\search;

use settings\entities\user\User;
use settings\forms\library\traits\LibraryCategoryTrait;
use yii\base\Model;

class LibraryCategorySearchForm extends Model
{
    use LibraryCategoryTrait;

    public function rules(): array
    {
        return [
            [['code_name'], 'required'],
            [['status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_ru', 'title_uz', 'title_oz', 'code_name'], 'string', 'max' => 255],
            [['code_name'], 'unique'],
            [['title_oz'], 'unique'],
            [['title_ru'], 'unique'],
            [['title_uz'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
}