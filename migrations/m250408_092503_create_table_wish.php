<?php

use yii\db\Migration;

class m250408_092503_create_table_wish extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%wish}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->null(),
            'wish_list_id' => $this->integer()->null(),
            'photo_path' => $this->string()->null(),
            'name' => $this->string()->null(),
            'description' => $this->string()->null(),
            'link' => $this->string()->null(),
            'price' => $this->integer()->null(),
            'is_secret' => $this->boolean()->null(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%wish}}');
    }
}
