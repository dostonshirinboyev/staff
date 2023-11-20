<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%university_category}}`.
 */
class m231120_101214_create_university_category_table extends Migration
{
    private $table = 'university_category';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("{{%{$this->table}}}", [
            'id'                => $this->primaryKey()->comment("ID raqami"),
            'parent_id'         => $this->integer()->comment("Ota ID raqami"),
            'title_ru'          => $this->string()->comment("Kategorya nomi ruscha"),
            'title_uz'          => $this->string()->comment("Kategorya nomi krilcha"),
            'title_oz'          => $this->string()->comment("Kategorya nomi lotincha"),
            'code_name'         => $this->string()->notNull()->comment("Kod nomi"),
            'order'             => $this->integer()->notNull()->defaultValue(1)->comment("Tartibga solish"),
            'status'            => $this->smallInteger()->defaultValue(1)->notNull()->comment("Holati"),
            'is_deleted'        => $this->smallInteger()->defaultValue(0)->notNull()->comment("O'chirildi"),
            'created_by'        => $this->integer()->notNull()->comment("Yaratgan foydalanuvchi"),
            'updated_by'        => $this->integer()->comment("Tahrirlagan foydalanuvchi"),
            'created_at'        => $this->timestamp()->notNull()->defaultValue('NOW()')->comment("Yaratilgan vaqti"),
            'updated_at'        => $this->timestamp()->comment("Yangilangan vaqti"),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            "{{%idx-{$this->table}-parent_id}}",
            "{$this->table}",
            'parent_id',
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            "{{%fk-{$this->table}-parent_id}}",
            "{{%{$this->table}}}",
            'parent_id',
            "{{%{$this->table}}}",
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            "{{%idx-{$this->table}-created_by}}",
            "{{%{$this->table}}}",
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            "{{%fk-{$this->table}-created_by}}",
            "{{%{$this->table}}}",
            'created_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'RESTRICT',
        );

        // creates index for column `updated_by`
        $this->createIndex(
            "{{%idx-{$this->table}-updated_by}}",
            "{{%{$this->table}}}",
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            "{{%fk-{$this->table}-updated_by}}",
            "{{%{$this->table}}}",
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
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            "{{%fk-{$this->table}-parent_id}}",
            "{{%{$this->table}}}",
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            "{{%idx-{$this->table}-parent_id}}",
            "{{%{$this->table}}}",
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            "{{%fk-{$this->table}-created_by}}",
            "{{%{$this->table}}}",
        );

        // drops index for column `created_by`
        $this->dropIndex(
            "{{%idx-{$this->table}-created_by}}",
            "{{%{$this->table}}}",
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            "{{%fk-{$this->table}-updated_by}}",
            "{{%{$this->table}}}",
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            "{{%idx-{$this->table}-updated_by}}",
            "{{%{$this->table}}}",
        );

        $this->dropTable("{{%{$this->table}}}");
    }
}
