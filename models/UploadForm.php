<?php

namespace app\models;

use yii\base\Model;
use app\records\UserRecord;
use yii\db\Exception;
use entity\UploadedAvatar;

class UploadForm extends Model
{
    public UploadedAvatar|null $imageFile = null;
    public string|null $username = null;
    public string|null $email = null;
    public string|null $avatar_path = null;

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

    /**
     * @throws Exception
     */
    public function upload(UserRecord $userRecord): bool
    {
        if (!$this->validate()) {
            return false;
        }

        $userRecord->username = $this->username ?? '';
        $userRecord->email = $this->email ?? '';
        $userRecord->avatar_path = $this->imageFile
            ? $this->imageFile->getPath()
            : ''
        ;

        $this->imageFile?->save();
        $userRecord->save();

        return true;
    }
}