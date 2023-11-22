<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu}}`.
 */
class m231122_044904_create_menu_table extends Migration
{
    private $tableName = 'menu';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("{{%{$this->tableName}}}", [
            'id'                => $this->primaryKey()->comment("ID raqami"),
            'parent_id'         => $this->integer()->comment("O'zidan yuqori turuvchi menu"),
            'category_id'       => $this->integer()->notNull()->comment("Menyu Kategoriyasi"),
            'title_uz'          => $this->string()->notNull()->comment("Menyu nomi krilcha"),
            'title_oz'          => $this->string()->notNull()->comment("Menyu nomi lotincha"),
            'title_ru'          => $this->string()->notNull()->comment("Menyu nomi ruscha"),
            'title_en'          => $this->string()->notNull()->comment("Menyu nomi inglizcha"),
            'code_name'         => $this->string()->notNull()->comment("Kod nomi"),
            'order'             => $this->integer()->notNull()->defaultValue(1)->comment("Tartibga solish"),
            'status'            => $this->smallInteger()->defaultValue(1)->notNull()->comment("Holati"),
            'is_deleted'        => $this->smallInteger()->defaultValue(0)->notNull()->comment("O'chirildi"),
            'created_by'        => $this->integer()->notNull()->comment("Yaratgan foydalanuvchi"),
            'updated_by'        => $this->integer()->comment("Tahrirlagan foydalanuvchi"),
            'created_at'        => $this->timestamp()->notNull()->defaultValue('NOW()')->comment("Yaratilgan vaqti"),
            'updated_at'        => $this->timestamp()->comment("Yangilangan vaqti"),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            "{{%idx-{$this->tableName}-category_id}}",
            "{{%{$this->tableName}}}",
            'category_id'
        );

        // add foreign key for table `{{%enum_menu_category}}`
        $this->addForeignKey(
            "{{%fk-{$this->tableName}-category_id}}",
            "{{%{$this->tableName}}}",
            'category_id',
            '{{%enum_menu_category}}',
            'id',
            'RESTRICT',
            'RESTRICT',
        );

        // creates index for column `parent_id`
        $this->createIndex(
            "{{%idx-{$this->tableName}-parent_id}}",
            "{$this->tableName}",
            'parent_id',
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            "{{%fk-{$this->tableName}-parent_id}}",
            "{{%{$this->tableName}}}",
            'parent_id',
            "{{%{$this->tableName}}}",
            'id',
            'CASCADE',
            'CASCADE'
        );

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
        // drops foreign key for table `{{%enum_menu_category}}`
        $this->dropForeignKey(
            "{{%fk-{$this->tableName}-parent_id}}",
            "{{%{$this->tableName}}}",
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            "{{%idx-{$this->tableName}-parent_id}}",
            "{{%{$this->tableName}}}",
        );

        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            "{{%fk-{$this->tableName}-category_id}}",
            "{{%{$this->tableName}}}",
        );

        // drops index for column `category_id`
        $this->dropIndex(
            "{{%idx-{$this->tableName}-category_id}}",
            "{{%{$this->tableName}}}",
        );

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