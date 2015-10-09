<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use Yii;
use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DonnerieAsset extends AssetBundle
{
	public function init() {
		parent::init();
		if(isset(Yii::$app->donnerie)) {
		    $this->basePath = '@common/uploads/donnerie/'.Yii::$app->donnerie->donnerie->id;
		    $this->baseUrl = '@web';
			$dir = Yii::getAlias($this->basePath);
			$this->css = [];
			if(is_dir($dir)) {
				foreach(scandir($dir) as $file) {
					if(is_file($dir.DIRECTORY_SEPARATOR.$file)) {
						$this->css[] = $file;
					}
				}
			}
			//no js registration for basic security reason

			// @todo: May be add ability to enter dependency through checkbox/options?
		    $this->depends = [
		        'yii\web\YiiAsset',
		        'yii\bootstrap\BootstrapAsset',
		    ];
		} else {
		    $this->basePath = '@webroot';
		    $this->baseUrl = '@web';
		    $this->css = [
		        'css/site.css',
		    ];
		    $this->js = [
		    ];
		    $this->depends = [
		        'yii\web\YiiAsset',
		        'yii\bootstrap\BootstrapAsset',
		    ];
		}
	}
}
