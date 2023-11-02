<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_personal_data}}`.
 */
class m231018_053312_create_user_personal_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_personal_data}}', [
            'user_id'           => $this->primaryKey(),
            'first_name'        => $this->string()->notNull(),
            'last_name'         => $this->string()->notNull(),
            'middle_name'       => $this->string()->notNull(),
            'full_name'         => $this->string()->notNull(),
            'short_name'        => $this->string()->notNull(),
            'birthday'          => $this->date()->notNull(),
            'gender'            => $this->smallInteger()->notNull(),
            'country'           => $this->string(),
            'region_id'         => $this->bigInteger(),
            'district_id'       => $this->bigInteger(),
            'address'           => $this->text(),
            'avatar'            => $this->string(),
            'hash'              => $this->string(),
            'created_by'        => $this->integer()->notNull(),
            'updated_by'        => $this->integer(),
            'created_at'        => $this->timestamp()->notNull()->defaultValue('NOW()'),
            'updated_at'        => $this->timestamp(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_personal_data-user_id}}',
            '{{%user_personal_data}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_personal_data-user_id}}',
            '{{%user_personal_data}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE',
        );
        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-user_personal_data-created_by}}',
            '{{%user_personal_data}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_personal_data-created_by}}',
            '{{%user_personal_data}}',
            'created_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'RESTRICT',
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-user_personal_data-updated_by}}',
            '{{%user_personal_data}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_personal_data-updated_by}}',
            '{{%user_personal_data}}',
            'updated_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'RESTRICT'
        );

        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-user_personal_data-region_id_index}}',
            '{{%user_personal_data}}',
            'region_id'
        );

        // add foreign key for table `{{%enum_regions}}`
        $this->addForeignKey(
            '{{%fk-user_personal_data-region_id}}',
            '{{%user_personal_data}}',
            'region_id',
            '{{%enum_regions}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );

        // creates index for column `district_id`
        $this->createIndex(
            '{{%idx-user_personal_data-district_id}}',
            '{{%user_personal_data}}',
            'district_id'
        );

        // add foreign key for table `{{%enum_regions}}`
        $this->addForeignKey(
            '{{%fk-user_personal_data-district_id}}',
            '{{%user_personal_data}}',
            'district_id',
            '{{%enum_regions}}',
            'id',
            'RESTRICT',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_personal_data-user_id}}',
            '{{%user_personal_data}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_personal_data-user_id}}',
            '{{%user_personal_data}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_personal_data-created_by}}',
            '{{%user_personal_data}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-user_personal_data-created_by}}',
            '{{%user_personal_data}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_personal_data-updated_by}}',
            '{{%user_personal_data}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-user_personal_data-updated_by}}',
            '{{%user_personal_data}}'
        );

        // drops foreign key for table `{{%enum_regions}}`
        $this->dropForeignKey(
            '{{%fk-user_personal_data-region_id}}',
            '{{%user_personal_data}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-user_personal_data-region_id_index}}',
            '{{%user_personal_data}}'
        );

        // drops foreign key for table `{{%enum_regions}}`
        $this->dropForeignKey(
            '{{%fk-user_personal_data-district_id}}',
            '{{%user_personal_data}}'
        );

        // drops index for column `district_id`
        $this->dropIndex(
            '{{%idx-user_personal_data-district_id}}',
            '{{%user_personal_data}}'
        );

        $this->dropTable('{{%user_personal_data}}');
    }
}
