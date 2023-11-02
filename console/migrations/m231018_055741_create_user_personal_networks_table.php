<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_personal_networks}}`.
 */
class m231018_055741_create_user_personal_networks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_personal_networks}}', [
            'user_id'                  => $this->primaryKey(),
            'phone'                    => $this->string(),
            'email'                    => $this->string(),
            'email_confirm_token'      => $this->string(),
            'telegram'                 => $this->string(),
            'telegram_confirm_token'   => $this->string(),
            'facebook'                 => $this->string(),
            'facebook_confirm_token'   => $this->string(),
            'created_by'               => $this->integer()->notNull(),
            'updated_by'               => $this->integer(),
            'created_at'               => $this->timestamp()->notNull()->defaultValue('NOW()'),
            'updated_at'               => $this->timestamp(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_personal_networks-user_id}}',
            '{{%user_personal_networks}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_personal_networks-user_id}}',
            '{{%user_personal_networks}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE',
        );
        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-user_personal_networks-created_by}}',
            '{{%user_personal_networks}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_personal_networks-created_by}}',
            '{{%user_personal_networks}}',
            'created_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'RESTRICT',
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-user_personal_networks-updated_by}}',
            '{{%user_personal_networks}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_personal_networks-updated_by}}',
            '{{%user_personal_networks}}',
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
            '{{%fk-user_personal_networks-user_id}}',
            '{{%user_personal_networks}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_personal_networks-user_id}}',
            '{{%user_personal_networks}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_personal_networks-created_by}}',
            '{{%user_personal_networks}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-user_personal_networks-created_by}}',
            '{{%user_personal_networks}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_personal_networks-updated_by}}',
            '{{%user_personal_networks}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-user_personal_networks-updated_by}}',
            '{{%user_personal_networks}}'
        );

        $this->dropTable('{{%user_personal_networks}}');
    }
}