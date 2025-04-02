<?php

namespace app\models;

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
    public $username;
    public $email;
    public $password;

    private bool $_user = false;


    public function rules(): array
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['email'], 'email'],
        ];
    }

    public function register()
    {
    }

}
