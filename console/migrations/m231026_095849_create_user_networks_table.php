<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_networks}}`.
 */
class m231026_095849_create_user_networks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_networks}}', [
            'user_id'       => $this->integer()->notNull(),
            'network_id'    => $this->bigInteger()->notNull(),
            'network_type'  => $this->string()->notNull(),
            'username'      => $this->string(),
            'first_name'    => $this->string()->notNull(),
            'last_name'     => $this->string(),
            'middle_name'   => $this->string(),
            'photo_url'     => $this->text(),
            'auth_date'     => $this->integer()->unsigned()->notNull(),
            'access_token'  => $this->text(),
            'expires_in'    => $this->text(),
            'scope'         => $this->text(),
            'token_type'    => $this->text(),
            'id_token'      => $this->text(),
            'hash'          => $this->text(),
            'created_by'    => $this->integer()->notNull(),
            'created_at'    => $this->timestamp()->notNull()->defaultValue('NOW()'),
            'PRIMARY KEY (user_id, network_id, network_type)'
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_networks-user_id}}',
            '{{%user_networks}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_networks-user_id}}',
            '{{%user_networks}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE',
        );
        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-user_networks-created_by}}',
            '{{%user_networks}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_networks-created_by}}',
            '{{%user_networks}}',
            'created_by',
            '{{%user}}',
            'id',
            'RESTRICT',
            'RESTRICT',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_networks-user_id}}',
            '{{%user_networks}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_networks-user_id}}',
            '{{%user_networks}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_networks-created_by}}',
            '{{%user_networks}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-user_networks-created_by}}',
            '{{%user_networks}}'
        );

        $this->dropTable('{{%user_networks}}');
    }
}
