<?php

namespace common\components;

use common\models\Donnerie as DonnerieModel;

use Yii;
use yii\base\Component;
use yii\base\Theme;

/**
 * Donnerie Component. Contains global donnerie behavior components, options, variables...
 *
 * @author PierreM
 */
class Donnerie extends Component
{
	/** Default values */
	const DAYS_BEFORE = 28;	

	public $id;
	public $donnerie;
	public $expiration_delay;

	public function init() {
		parent::init();
		$this->donnerie = DonnerieModel::findOne(['key' => $_SERVER['SERVER_NAME']]);
		$this->expiration_delay = self::DAYS_BEFORE;
	}
	
	public function getName() {
		return $this->donnerie ? $this->donnerie->name : Yii::t('app', 'une donnerie');
	}
	
	public function getTheme() {
		if($this->donnerie) {
			if($this->donnerie->theme) {
				return new Theme([
					'basePath' => '@frontend/views/themes/'.$this->donnerie->theme,
	                'baseUrl' => '@web',
	                'pathMap' => [
	                    '@frontend/views' => '@frontend/views/themes/'.$this->donnerie->theme.'/views',
	                ],
				]);
			}				
		}
	}
	
	public function getAsset() {
		return null;
	}

	public function register($view) {
		// fetchs donnerie specific asset and registers it.
		if($asset = $this->getAsset())
			$asset->register($view);
	}
}