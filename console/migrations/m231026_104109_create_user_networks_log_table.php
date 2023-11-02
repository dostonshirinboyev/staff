<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_networks_log}}`.
 */
class m231026_104109_create_user_networks_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_networks_log}}', [
            'id'            => $this->primaryKey(),
            'user_id'       => $this->integer()->notNull(),
            'deleted_data'  => $this->json()->notNull(),
            'created_by'    => $this->integer()->notNull(),
            'created_at'    => $this->timestamp()->notNull()->defaultValue('NOW()'),
        ]);
        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-user_networks_log-created_by}}',
            '{{%user_networks_log}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_networks_log-created_by}}',
            '{{%user_networks_log}}',
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
            '{{%fk-user_networks_log-created_by}}',
            '{{%user_networks_log}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-user_networks_log-created_by}}',
            '{{%user_networks_log}}'
        );

        $this->dropTable('{{%user_networks_log}}');
    }
}
