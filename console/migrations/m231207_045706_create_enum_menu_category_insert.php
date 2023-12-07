<?php

use yii\db\Migration;

/**
 * Class m231207_045706_create_enum_menu_category_insert
 */
class m231207_045706_create_enum_menu_category_insert extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("INSERT INTO public.enum_menu_category (title_uz, title_oz, title_ru, title_en, code_name, status, is_deleted, created_by, updated_by, created_at, updated_at) VALUES ('Университет менюси', 'Universitet menyusi', 'Университетское меню', 'University menu', 'university_menu', 1, 0, 4, null, CURRENT_TIMESTAMP, null);");
        $this->execute("INSERT INTO public.enum_menu_category (title_uz, title_oz, title_ru, title_en, code_name, status, is_deleted, created_by, updated_by, created_at, updated_at) VALUES ('ARM менюси', 'ARM menyusi', 'ARM меню', 'ARM menu', 'arm_menu', 1, 0, 4, null, CURRENT_TIMESTAMP, null);");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DELETE FROM public.enum_menu_category;");
        $this->execute("TRUNCATE public.enum_menu_category RESTART IDENTITY CASCADE;");
    }
}
