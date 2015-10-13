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
	const DEFAULT_EXCLUSIVITY = 28;	// days
	const DEFAULT_THEME_LOCATION = '@frontend/themes';

	public $id;
	public $donnerie;
	public $exclusivity = self::DEFAULT_EXCLUSIVITY;

	public function init() {
		parent::init();
		$this->donnerie = DonnerieModel::findOne(['key' => $_SERVER['SERVER_NAME']]);
	}
	
	public function getId() {
		return $this->donnerie ? $this->donnerie->id : null;
	}
	
	public function getName() {
		return $this->donnerie ? $this->donnerie->name : Yii::t('app', 'une donnerie');
	}
	
	public function getTheme($location = self::DEFAULT_THEME_LOCATION) {
		if($this->donnerie) {
			if($this->donnerie->theme) {
				$basePath = $location.'/'.$this->donnerie->theme;
				return new Theme([
					'basePath' => $basePath,
	                'baseUrl' => '@web',
	                'pathMap' => [
	                    '@frontend/views' => $basePath.'/views',
                    	'@frontend/widgets/views' => $basePath.'/widgets/views',
	                ],
				]);
			}				
		}
	}
}