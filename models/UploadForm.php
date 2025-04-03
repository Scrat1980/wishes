<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    public UploadedFile $imageFile;

    public function rules(): array
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload(): bool
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(
                '../runtime/uploads/'
                 . $this->imageFile->baseName .'_' . round(microtime(true))
                . '.' . $this->imageFile->extension
            );
            return true;
        } else {
            return false;
        }
    }
}