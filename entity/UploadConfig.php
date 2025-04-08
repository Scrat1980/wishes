<?php

namespace entity;

class UploadConfig
{
    public string $filePrefix = '../web/img/';
    public string $dbPrefix = '/img/';

    public function assembleFileName(string $name, string $extension): string
    {
        return $name . '_' . round(microtime(true))
            . '.' . $extension
            ;

    }
}