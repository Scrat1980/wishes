<?php

namespace app\models;

use app\records\UserRecord;
use Yii;
use yii\base\Model;
use yii\db\Exception;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class RegistrationForm extends Model
{
    public string $username = '';
    public string $email = '';
    public string $password = '';

    private bool $_user = false;


    public function rules(): array
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['email'], 'email'],
            [['username', 'email', 'password'], 'required'],
            [
                ['username'],
                'unique',
                'targetClass' => UserRecord::class,
                'targetAttribute' => 'username',
            ],
            [
                ['email'],
                'unique',
                'targetClass' => UserRecord::class,
                'targetAttribute' => 'email',
            ],
        ];
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function register(): bool
    {
        $user = new UserRecord();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = sha1($this->password);
        $user->auth_key = '';
        $user->access_token = '';

        $user->save();

        return true;
    }

}
