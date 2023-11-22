<?php

namespace settings\forms\enum\traits;

use settings\entities\enums\EnumMenuCategory;

trait EnumMenuCategoryTrait
{
    public $id;
    public $title_uz;
    public $title_oz;
    public $title_ru;
    public $title_en;
    public $code_name;
    public $status;
    public $is_deleted;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public $date_from;
    public $date_to;

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        $label = new EnumMenuCategory();
        return $label->attributeLabels();
    }
}