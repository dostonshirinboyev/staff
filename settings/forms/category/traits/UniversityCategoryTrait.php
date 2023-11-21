<?php

namespace settings\forms\category\traits;

use settings\entities\category\UniversityCategory;

trait UniversityCategoryTrait
{
    public $id;
    public $parent_id;
    public $title_ru;
    public $title_uz;
    public $title_oz;
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
        $label = new UniversityCategory();
        return $label->attributeLabels();
    }
}