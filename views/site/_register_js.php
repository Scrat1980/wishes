<?php

use yii\web\View;

function registerFiles($fileNames, $that): void
{
    $position = ['position' => View::POS_END,];
    foreach ($fileNames as $fileName) {
        $that->registerJsFile('@web/js/' . $fileName, $position);
    }
}

registerFiles([
    '1.js'
], $this);
