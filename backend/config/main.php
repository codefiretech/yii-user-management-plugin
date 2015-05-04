<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
	require(__DIR__ . '/../../../../../common/config/params.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'yii\cfusermgmt\backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'params' => $params,
];
