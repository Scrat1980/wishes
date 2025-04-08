<?php

namespace app\records;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $password
 * @property string|null $auth_key
 * @property string|null $access_token
 * @property string|null $email
 * @property string|null $avatar_path
 */

class UserRecord extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%user}}';
    }
}