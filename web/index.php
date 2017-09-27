<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);//poner a false
defined('YII_ENV') or define('YII_ENV', 'dev');//poner prod

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../vendor/yiisoft/yii2-highcharts/src/Highcharts.php');
require(__DIR__ . '/../vendor/yiisoft/yii2-highcharts/src/HighchartsAsset.php');
require(__DIR__ . '/../vendor/yiisoft/yii2-select2-widget-master/src/Widget.php');
require(__DIR__ . '/../vendor/yiisoft/yii2-select2-widget-master/src/Asset.php');
require(__DIR__ . '/../vendor/yiisoft/yii2-select2-widget-master/src/Select2Asset.php');


$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
