<?php

namespace app\models;

use app\records\UserRecord;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    public UploadedFile | null $imageFile = null;

    public function rules(): array
    {
        return [
            [
                ['imageFile'],
                'file',
                'skipOnEmpty' => false,
                'extensions' => 'png, jpg, jpeg',
            ],
        ];
    }

    public function upload(): bool
    {
        if ($this->validate()) {
            $filePath = '../runtime/uploads/'
                . $this->imageFile->baseName .'_' . round(microtime(true))
                . '.' . $this->imageFile->extension
            ;
            $this->imageFile->saveAs($filePath);
            chmod($filePath, 0777);

            $userId = \Yii::$app->getUser()->getId();


            $userRecord = UserRecord::findOne(['id' => $userId]);
            $userRecord->avatar_path = $filePath;
            $userRecord->save();

            return true;
        } else {
            return false;
        }
    }
}