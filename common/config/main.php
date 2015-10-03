<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'assetManager' => [
            'linkAssets' => true,
        ], 
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'image' => [
			'class' => 'yii\image\ImageDriver',
			'driver' => 'GD',  //GD or Imagick
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'loginUrl' => ['/user/security/login'],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
	'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
	    'markdown' => [
	        // the module class
	        'class' => 'kartik\markdown\Module',
			'smartyPants' => false,
	        'i18n' => [
	            'class' => 'yii\i18n\PhpMessageSource',
	            'basePath' => '@markdown/messages',
	            'forceTranslation' => true
        	],
		],
        'user' => [
            'class' => 'dektrium\user\Module',
            //'allowUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin','pierre'],
        ],
	],
];
