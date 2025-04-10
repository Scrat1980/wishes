<?php

namespace app\models;

use yii\web\UploadedFile;

class UploadConfig
{
    public function getNameForDb(UploadedFile $imageFile): string
    {
        return '/img/' . $this->assembleFileName($imageFile);
    }

    public function getNameForFileSystem(UploadedFile $imageFile): string
    {
        return '../web/img/' . $this->assembleFileName($imageFile);
    }

    private function assembleFileName(UploadedFile $imageFile): string
    {
        return $imageFile->baseName . '_' . round(microtime(true))
            . '.' . $imageFile->extension
        ;
    }
}