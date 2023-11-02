<?php
namespace settings\forms\library\traits;

use settings\entities\library\LibraryFile;

trait LibraryCategoryTrait
{
    public $id;
    public $title_ru;
    public $title_uz;
    public $title_oz;
    public $code_name;
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