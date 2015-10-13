<?php

namespace frontend\modules\donnerie;

use common\models\Donnerie;

class Module extends \yii\base\Module
{
	/** Default values */
	const DAYS_BEFORE = 28;	

    public $controllerNamespace = 'frontend\modules\donnerie\controllers';
    // public $layout = 'admin';

}
