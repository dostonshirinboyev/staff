<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_telegram}}`.
 */
class m231024_092302_create_user_telegram_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_telegram}}', [
            'user_id'                   => $this->primaryKey(),
            'telegram_id'               => $this->bigInteger()->notNull()->unique(),
            'username'                  => $this->string()->unique(),
            'first_name'                => $this->string()->notNull(),
            'last_name'                 => $this->string(),
            'photo_url'                 => $this->text(),
            'auth_date'                 => $this->integer()->unsigned()->notNull(),
            'phone'                     => $this->string(),
            'ip'                        => $this->string(),
            'hash'                      => $this->text()->notNull(),
            'created_by'                => $this->integer()->notNull(),
            'updated_by'                => $this->integer(),
            'created_at'                => $this->timestamp()->notNull()->defaultValue('NOW()'),
            'updated_at'                => $this->timestamp(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_telegram-user_id}}',
            '{{%user_telegram}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_telegram-user_id}}',
            '{{%user_telegram}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE',
        );
        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-user_telegram-created_by}}',
            '{{%user_telegram}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_telegram-created_by}}',
            '{{%user_telegram}}',
            'created_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'RESTRICT',
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-user_telegram-updated_by}}',
            '{{%user_telegram}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_telegram-updated_by}}',
            '{{%user_telegram}}',
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
            '{{%fk-user_telegram-user_id}}',
            '{{%user_telegram}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_telegram-user_id}}',
            '{{%user_telegram}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_telegram-created_by}}',
            '{{%user_telegram}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-user_telegram-created_by}}',
            '{{%user_telegram}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_telegram-updated_by}}',
            '{{%user_telegram}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-user_telegram-updated_by}}',
            '{{%user_telegram}}'
        );

        $this->dropTable('{{%user_telegram}}');
    }
}
