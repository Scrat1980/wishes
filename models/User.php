<?php

namespace app\models;

use app\records\UserRecord;
use Yii;
use yii\base\BaseObject;
use yii\web\IdentityInterface;

class User extends BaseObject implements IdentityInterface
{
    public int $id;
    public string $username;
    public string $password;
    public string $authKey;
    public string $accessToken;
    public string $email;

    /**
     * @var string[]
     */
    private static array $users = [
//        '100' => [
//            'id' => '100',
//            'username' => 'admin',
//            'password' => 'admin',
//            'authKey' => 'test100key',
//            'accessToken' => '100-token',
//        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
    ];

    private static function getUsers(): void
    {
        self::$users = UserRecord::find()->asArray()->all();
        foreach (self::$users as $key => $user) {
            self::$users[$key]['authKey'] = $user['auth_key'];
            unset(self::$users[$key]['auth_key']);
            self::$users[$key]['accessToken'] = $user['access_token'];
            unset(self::$users[$key]['access_token']);
            self::$users[$key]['email'] = $user['email'] ?? '';
        }
    }

    public static function findIdentity($id)
    {
        self::getUsers();

        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        self::getUsers();

        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername(string $username): null|static
    {
        self::getUsers();

        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {

                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey(): ?string
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey): ?bool
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword(string $password): bool
    {
        return $this->password === $password;
    }
}
