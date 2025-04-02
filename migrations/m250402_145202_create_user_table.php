<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m250402_145202_create_user_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'access_token' => $this->string(32)->notNull(),
            'email' => $this->string()->null()->unique(),
        ]);

        $this->insert('{{%user}}', [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'auth_key' => 'test100key',
            'access_token' => '100-token',
        ]);

        $this->insert('{{%user}}', [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'auth_key' => 'test101key',
            'access_token' => '101-token',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
