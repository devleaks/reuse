<?php

namespace frontend\modules\donnerie;

use common\models\Donnerie;

class Module extends \yii\base\Module
{
	/** Default values */
	const DAYS_BEFORE = 28;	

    public $controllerNamespace = 'frontend\modules\donnerie\controllers';
    // public $layout = 'admin';

	public $id;
	public $donnerie;
	public $expiration_delay;

	public function init() {
		parent::init();
		$this->donnerie = Donnerie::findOne($this->id);
		$this->expiration_delay = self::DAYS_BEFORE;
	}
}
