<?php

namespace app\models;

use app\records\UserRecord;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class RegistrationForm extends Model
{
    public string $username;
    public string $email;
    public string $password;

    private bool $_user = false;


    public function rules(): array
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['email'], 'email'],
        ];
    }

    public function register(): bool
    {
        $user = new UserRecord();
        $user->username =
        echo '<pre>';
        var_dump(
            $this->attributes
        );
        echo '</pre>';
        die;

        return true;
    }

}
