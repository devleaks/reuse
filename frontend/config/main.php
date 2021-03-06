<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
	'name' => 'Re Use',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
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
		'session' => [
            'name' => 'free_session',
            'cookieParams' => [
                'httpOnly' => true,
                'path' => '/free',
            ],
		],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'loginUrl' => ['/user/security/login'],
        ],
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            //'allowUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin','pierre'],
        ],
	],
    'params' => $params,
];
