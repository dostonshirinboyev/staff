<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%library_file}}`.
 */
class m231101_051907_create_library_file_table extends Migration
{
    private $table = 'library_file';

    public function safeUp()
    {
        $this->createTable("{{%{$this->table}}}", [
            'id'                => $this->primaryKey()->comment("ID raqami"),
            'hemis_id_number'   => $this->bigInteger()->notNull()->comment("HemisID raqami"),
            'hemis_id'          => $this->bigInteger()->notNull()->comment("Hemis ID"),
            'category_id'       => $this->integer()->notNull()->comment("Kategoriya"),
            'user_id'           => $this->integer()->notNull()->comment("Foydalanuvchi ID raqami"),
            'title_ru'          => $this->string()->comment("Fayl nomi ruscha"),
            'title_uz'          => $this->string()->comment("Fayl nomi krilcha"),
            'title_oz'          => $this->string()->comment("Fayl nomi lotincha"),
            'file'              => $this->string()->comment("Word, Pdf, Doc, ..."),
            'status'            => $this->smallInteger()->defaultValue(1)->notNull()->comment("Holati"),
            'created_by'        => $this->integer()->notNull()->comment("Yaratgan foydalanuvchi"),
            'updated_by'        => $this->integer()->comment("Tahrirlagan foydalanuvchi"),
            'created_at'        => $this->timestamp()->notNull()->defaultValue('NOW()')->comment("Yaratilgan vaqti"),
            'updated_at'        => $this->timestamp()->comment("Yangilangan vaqti"),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            "{{%idx-{$this->table}-category_id}}",
            "{{%{$this->table}}}",
            'category_id'
        );

        // add foreign key for table `{{%personal_details_category}}`
        $this->addForeignKey(
            "{{%fk-{$this->table}-category_id}}",
            "{{%{$this->table}}}",
            'category_id',
            "{{%{$this->table}}}",
            'id',
            'RESTRICT',
            'RESTRICT',
        );

        // creates index for column `user_id`
        $this->createIndex(
            "{{%idx-{$this->table}-user_id}}",
            "{{%{$this->table}}}",
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            "{{%fk-{$this->table}-user_id}}",
            "{{%{$this->table}}}",
            'user_id',
            '{{%user}}',
            'id',
            'RESTRICT',
            'RESTRICT',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            "{{%fk-{$this->table}-category_id}}",
            "{{%{$this->table}}}"
        );

        // drops index for column `category_id`
        $this->dropIndex(
            "{{%idx-{$this->table}-category_id}}",
            "{{%{$this->table}}}"
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            "{{%fk-{$this->table}-user_id}}",
            "{{%{$this->table}}}"
        );

        // drops index for column `user_id`
        $this->dropIndex(
            "{{%idx-{$this->table}-user_id}}",
            "{{%{{$this->table}}}}"
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            "{{%fk-{$this->table}-created_by}}",
            "{{%{$this->table}}}"
        );

        // drops index for column `created_by`
        $this->dropIndex(
            "{{%idx-{$this->table}-created_by}}",
            "{{%{$this->table}}}"
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            "{{%fk-{$this->table}-updated_by}}",
            "{{%{$this->table}}}"
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            "{{%idx-{$this->table}-updated_by}}",
            "{{%{$this->table}}}"
        );

        $this->dropTable("{{%{$this->table}}}");
    }
}
