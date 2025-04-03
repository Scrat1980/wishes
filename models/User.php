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
    private static array $users = [];

    private static function getUsers(): void
    {

        $users = UserRecord::find()->asArray()->all();
        foreach ($users as $key => $user) {
            self::$users[$user['id']] = $user;
            self::$users[$user['id']]['authKey'] = $user['auth_key'];
            unset(self::$users[$user['id']]['auth_key']);
            self::$users[$user['id']]['accessToken'] = $user['access_token'];
            unset(self::$users[$user['id']]['access_token']);
            self::$users[$user['id']]['email'] = $user['email'] ?? '';
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
        return $this->password === sha1($password);
    }
}
