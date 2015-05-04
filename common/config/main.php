<?php
return [
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'authManager'=>[
            'class'=>'yii\rbac\DbManager',
			'defaultRoles' => [DEFAULT_ROLE_NAME]
        ],
		'urlManager'=>[
            'showScriptName'=>false,
            'enablePrettyUrl'=>true,
            'enableStrictParsing'=>false,
            'rules'=>[
                [
                    'pattern'=>'<controller:\w+>/<action:\w+>',
                    'route'=>'<controller>/<action>',
                ]
            ],
        ],
        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '/yii-new/advanced/vendor/yiisoft/cfusermgmt/backend/web',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '/yii-new/advanced/vendor/yiisoft/cfusermgmt/frontend/web',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
		'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@yii/cfusermgmt/common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],
		'user' => [
            'identityClass' => 'yii\cfusermgmt\common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'on beforeAction'=>function ($event){
        \yii\cfusermgmt\common\models\UserActivity::actionSave($event);
		$permission = \yii\cfusermgmt\common\models\User::CheckPermission($event);
		if(!$permission){
            
            header('Location: '.Yii::$app->homeUrl.'user/permission-denied');
            exit;
		}
    }
];
