<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%enum_menu_category}}`.
 */
class m231122_044830_create_enum_menu_category_table extends Migration
{
    private $tableName = 'enum_menu_category';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("{{%{$this->tableName}}}", [
            'id'                => $this->primaryKey()->comment("ID raqami"),
            'title_uz'          => $this->string()->comment("Kategoriya nomi krilcha"),
            'title_oz'          => $this->string()->comment("Kategoriya nomi lotincha"),
            'title_ru'          => $this->string()->comment("Kategoriya nomi ruscha"),
            'title_en'          => $this->string()->comment("Kategoriya nomi inglizcha"),
            'code_name'         => $this->string()->notNull()->comment("Kod nomi"),
            'status'            => $this->smallInteger()->defaultValue(1)->notNull()->comment("Holati"),
            'is_deleted'        => $this->smallInteger()->defaultValue(0)->notNull()->comment("O'chirildi"),
            'created_by'        => $this->integer()->notNull()->comment("Yaratgan foydalanuvchi"),
            'updated_by'        => $this->integer()->comment("Tahrirlagan foydalanuvchi"),
            'created_at'        => $this->timestamp()->notNull()->defaultValue('NOW()')->comment("Yaratilgan vaqti"),
            'updated_at'        => $this->timestamp()->comment("Yangilangan vaqti"),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            "{{%idx-{$this->tableName}-created_by}}",
            "{{%{$this->tableName}}}",
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            "{{%fk-{$this->tableName}-created_by}}",
            "{{%{$this->tableName}}}",
            'created_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'RESTRICT',
        );

        // creates index for column `updated_by`
        $this->createIndex(
            "{{%idx-{$this->tableName}-updated_by}}",
            "{{%{$this->tableName}}}",
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            "{{%fk-{$this->tableName}-updated_by}}",
            "{{%{$this->tableName}}}",
            'updated_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            "{{%fk-{$this->tableName}-created_by}}",
            "{{%{$this->tableName}}}",
        );

        // drops index for column `created_by`
        $this->dropIndex(
            "{{%idx-{$this->tableName}-created_by}}",
            "{{%{$this->tableName}}}",
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            "{{%fk-{$this->tableName}-updated_by}}",
            "{{%{$this->tableName}}}",
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            "{{%idx-{$this->tableName}-updated_by}}",
            "{{%{$this->tableName}}}",
        );

        $this->dropTable("{{%{$this->tableName}}}");
    }
}
