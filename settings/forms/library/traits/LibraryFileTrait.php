<?php

namespace settings\forms\library\traits;

use settings\entities\library\LibraryFile;

Trait LibraryFileTrait
{
    public $id;
    public $hemis_id_number;
    public $hemis_id;
    public $category_id;
    public $user_id;
    public $title_ru;
    public $title_uz;
    public $title_oz;
    public $content_ru;
    public $content_uz;
    public $content_oz;
    public $file;
    public $status;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        $label = new LibraryFile();
        return $label->attributeLabels();
    }
}