<?php

namespace settings\forms\menu;

use settings\entities\enums\EnumMenuCategory;
use settings\entities\menu\Menu;
use settings\entities\user\User;
use settings\forms\menu\traits\MenuTrait;
use yii\base\Model;

class MenuForm extends Model
{
    use MenuTrait;

    public function rules(): array
    {
        return [
            [['parent_id', 'category_id', 'order', 'status', 'is_deleted', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['parent_id', 'category_id', 'order', 'status', 'is_deleted', 'created_by', 'updated_by'], 'integer'],
            [['category_id', 'title_uz', 'title_oz', 'title_ru', 'title_en', 'code_name', 'created_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_uz', 'title_oz', 'title_ru', 'title_en', 'code_name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumMenuCategory::class, 'targetAttribute' => ['category_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::class, 'targetAttribute' => ['parent_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
}