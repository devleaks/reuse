<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
	'name' => 'ReUse Administration',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
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
    ],
    'modules' => [
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
