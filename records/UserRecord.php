<?php

namespace app\records;

use yii\db\ActiveRecord;

class UserRecord extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%user}}';
    }
}