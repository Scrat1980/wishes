<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\records\UserRecord;
use yii\db\Exception;
use yii\db\Query;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    public UploadedFile|string|null $imageFile = '';
    public UploadConfig $uploadConfig;
    public string|null $username = null;
    public string|null $email = null;
    public string|null $avatar_path = null;

    public function __construct()
    {
        $this->uploadConfig = new UploadConfig();
        parent::__construct();
    }

    public function rules(): array
    {
        return [
            [
                ['imageFile'],
                'file',
                'skipOnEmpty' => true,
                'extensions' => 'png, jpg, jpeg',
            ],
            [
                ['username', 'email', 'avatar_path'],
                'safe',
            ],
            [
                ['email'],
                'email',
            ],
            [
                ['username'],
                'uniqueButThis',
            ],
            [
                ['email'],
                'uniqueButThis',
            ],
        ];
    }

    public function uniqueButThis($attribute, $params): void
    {
        $attributeOk = !(new Query())
            ->select(['id', 'username', 'email'])
            ->from('user')
            ->where([$attribute => $this->$attribute])
            ->andWhere(['!=', 'id', Yii::$app->user->id])
            ->count()
        ;

        if (!$attributeOk) {
            $this->addError($attribute, ucfirst($attribute) . ' is already taken.');
        }
    }

    /**
     * @throws Exception
     */
    public function save(): void
    {
        if ($this->imageFile) {
            $this->avatar_path = $this->uploadConfig->getNameForDb($this->imageFile);
            $fileNameForFileSystem = $this->uploadConfig->getNameForFileSystem($this->imageFile);
            $this->imageFile->saveAs($fileNameForFileSystem);
            chmod($fileNameForFileSystem, 0777);
        }

        $userId = Yii::$app->user->id;
        $userRecord = UserRecord::findOne(['id' => $userId]);
        $userRecord->username = $this->username;
        $userRecord->email = $this->email;
        $userRecord->avatar_path = $this->avatar_path;

        $userRecord->save();
    }
}