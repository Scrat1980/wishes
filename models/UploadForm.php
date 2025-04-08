<?php

namespace app\models;

use app\records\UserRecord;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    public UploadedFile|null $imageFile = null;
    public string|null $username = null;
    public string|null $email = null;

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
                ['username', 'email'],
                'safe',
            ],
        ];
    }

    public function upload(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        $userId = \Yii::$app->getUser()->getId();
        $userRecord = UserRecord::findOne(['id' => $userId]);

        if ($this->username)
        {
            $userRecord->username = $this->username;
        }

        if ($this->email)
        {
            $userRecord->email = $this->email;
        }

        if ($this->imageFile) {
            $filePath = '../web/img/';
            $fileName =
                $this->imageFile->baseName . '_' . round(microtime(true))
                . '.' . $this->imageFile->extension;
            $filePath .= $fileName;
            $this->imageFile->saveAs($filePath);
            chmod($filePath, 0777);

            $userRecord->avatar_path = '/img/' . $fileName;
        }

        $userRecord->save();

        return true;
    }
}