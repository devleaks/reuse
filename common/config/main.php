<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'bootstrap' => [
		'languageSelector' => [
			'class' => common\components\LanguageSelector::className(),
			'supportedLanguages' => ['en', 'fr', 'nl'],
		],
	],
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
	],
];
