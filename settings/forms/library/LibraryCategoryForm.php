<?php

namespace settings\forms\library;

use settings\entities\library\LibraryCategory;
use settings\entities\user\User;
use settings\forms\library\traits\LibraryCategoryTrait;
use yii\base\Model;

class LibraryCategoryForm extends Model
{
    use LibraryCategoryTrait;

    public function rules(): array
    {
        return [
            [['code_name'], 'required'],
            [['updated_by'], 'default', 'value' => null],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['title_ru', 'title_uz', 'title_oz', 'code_name'], 'string', 'max' => 255],
            [['code_name'], 'unique', 'targetClass' => LibraryCategory::class, 'filter' =>  $this->code_name ? ['<>', 'code_name', $this->code_name] : null, 'targetAttribute' => ['code_name']],
            [['title_oz'], 'unique', 'targetClass' => LibraryCategory::class, 'filter' =>  $this->title_oz ? ['<>', 'title_oz', $this->title_oz] : null, 'targetAttribute' => ['title_oz']],
            [['title_ru'], 'unique', 'targetClass' => LibraryCategory::class, 'filter' =>  $this->title_ru ? ['<>', 'title_ru', $this->title_ru] : null, 'targetAttribute' => ['title_ru']],
            [['title_uz'], 'unique', 'targetClass' => LibraryCategory::class, 'filter' =>  $this->title_uz ? ['<>', 'title_uz', $this->title_uz] : null, 'targetAttribute' => ['title_uz']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
}