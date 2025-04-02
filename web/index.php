<?php

// comment out the following two lines when deployed to production
use app\models\Application;
use yii\base\InvalidConfigException;

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../models/Application.php';

$config = require __DIR__ . '/../config/web.php';

//(new yii\web\Application($config))->run();
try {
    (new Application($config))->run();
} catch (InvalidConfigException $e) {
    echo $e->getMessage();
}
