<?php

namespace entity;

use yii\web\UploadedFile;

class UploadedAvatar extends UploadedFile
{
    private string $avatarFolder = '../web/img/';
    private string $avatarUrlPrefix = '/img/';

    public function save(): void
    {
        $fileName = $this->assembleFileName();
        $filePath = $this->avatarFolder . $fileName;
        $this->saveAs($filePath);
        chmod($filePath, 0777);
    }

    public function getPath(): string
    {
        return $this->avatarUrlPrefix . $this->assembleFileName();
    }

    private function assembleFileName(): string
    {
        return $this->baseName . '_' . round(microtime(true))
            . '.' . $this->extension
            ;

    }
}