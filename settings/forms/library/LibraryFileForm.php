<?php

namespace settings\forms\library;

use settings\entities\library\LibraryFile;
use settings\entities\user\User;
use settings\forms\library\traits\LibraryFileTrait;
use yii\base\Model;

class LibraryFileForm extends Model
{
    use LibraryFileTrait;

    public function rules(): array
    {
        return [
            [['hemis_id_number', 'hemis_id', 'category_id', 'user_id'], 'required'],
            [['hemis_id_number', 'hemis_id', 'category_id', 'user_id', 'status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['hemis_id_number', 'hemis_id', 'category_id', 'user_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_ru', 'title_uz', 'title_oz', 'file'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => LibraryFile::class, 'targetAttribute' => ['category_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
}