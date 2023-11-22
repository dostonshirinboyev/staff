<?php

namespace settings\forms\menu\traits;

use settings\entities\menu\Menu;

trait MenuTrait
{
    public $id;
    public $parent_id;
    public $category_id;
    public $title_uz;
    public $title_oz;
    public $title_ru;
    public $title_en;
    public $code_name;
    public $order;
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
        $label = new Menu();
        return $label->attributeLabels();
    }
}