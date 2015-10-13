<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
//	'language' => 'fr',
	'name' => 'ReUse Administration',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
		'log',
		'donnerie'
	],
    'modules' => [],
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
            'name' => 'usagain_session',
            'cookieParams' => [
                'httpOnly' => true,
                'path' => '/usagain',
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
		'utility' => [
			'class' => 'c006\utility\migration\Module',
		],
		/** Reuse Application */
        'admin' => [
            'class' => 'backend\modules\admin\Module',
        ],
        'ad' => [
            'class' => 'backend\modules\ad\Module',
        ],
        'news' => [
            'class' => 'backend\modules\news\Module',
        ],
		/** end of Reuse Application */
	],
    'params' => $params,
];
