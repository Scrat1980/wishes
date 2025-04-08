<?php

use yii\db\Migration;

class m250408_093703_create_table_wish_list extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%wish_list}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->null(),
            'description' => $this->string()->null(),
            'photo_path' => $this->string()->null(),
            'is_secret' => $this->boolean()->null(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%wish}}');
    }
}
