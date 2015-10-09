<?php

namespace common\components;

use common\models\Donnerie as DonnerieModel;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\di\Container;

/**
 * GolfLeague Main Component. Contains global league behavior components, options, variables...
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
		$this->donnerie = DonnerieModel::findOne($this->id);
		$this->expiration_delay = self::DAYS_BEFORE;
	}
}