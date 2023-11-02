<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m230929_063621_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id'                        => $this->primaryKey(),
            'username'                  => $this->string()->notNull()->unique(),
            'auth_key'                  => $this->string(50)->notNull(),
            'password_hash'             => $this->string()->notNull(),
            'password_reset_token'      => $this->string()->unique(),
            'access_token'              => $this->text()->notNull(),
            'uuid'                      => $this->string(50)->notNull(),
            'type'                      => $this->string(10)->notNull(),
            'status'                    => $this->smallInteger()->notNull()->defaultValue(10),
            'hemis_id_number'           => $this->bigInteger()->notNull()->unique(),
            'hemis_id'                  => $this->bigInteger()->notNull()->unique(),
            'created_at'                => $this->timestamp()->notNull()->defaultValue('NOW()'),
            'updated_at'                => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
