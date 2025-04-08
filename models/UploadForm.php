<?php

namespace app\models;

use entity\UploadConfig;
use yii\base\Model;
use app\records\UserRecord;
use yii\db\Exception;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    public UploadedFile|null $imageFile = null;
    public UploadConfig|null $uploadConfig = null;
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

        $this->uploadConfig = new UploadConfig();

        if ($this->imageFile) {
            $fileName = $this->uploadConfig->assembleFileName(
                $this->imageFile->getBaseName(),
                $this->imageFile->getExtension(),
            );

            echo '<pre>';
            var_dump(
                $fileName
            );
            echo '</pre>';
            die;

            $userRecord->avatar_path = $this->uploadConfig->dbPrefix . $fileName;

            $this->imageFile->saveAs($this->uploadConfig->filePrefix . $fileName);
            chmod($this->uploadConfig->filePrefix . $fileName, 0777);
        } else {
            $userRecord->avatar_path = $this->avatar_path ?? '';
        }

        $userRecord->save();

        return true;
    }
}