<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
	'valid_roles' => [
		'admin' =>		Yii::t('app', 'Site Administrator'),
		'manager' =>	Yii::t('app', 'Donnerie Manager'),
		'writer' =>		Yii::t('app', 'Writer'),
		'visitor' =>	Yii::t('app', 'Visitor'),
	],
	'languages' => [
		'fr' => 'Français',
		'nl' => 'Nederlands',
		'en' => 'English',
	],
];
