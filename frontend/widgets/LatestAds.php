<?php
/**
 * LatestMessages widget renders the last messages available on the website.
 *
 * @author Pierre M <devleaks.be@gmail.com>
 */

namespace frontend\widgets;

use yii\data\ActiveDataProvider;
use yii\bootstrap\Widget;
use common\models\Ad;

class LatestAds extends Widget {
	/** number of recent message to display */
	public $ads_count = 5;
	public $words = 50;
	
	public function run() {
		
        return $this->render('latest-ads', [
            'dataProvider' => new ActiveDataProvider([
				'query' => Ad::find()->orderBy('created_at desc'),
				'pagination' => [
			        'pageSize' => $this->ads_count,
				],
			]),
			'words' => $this->words
        ]);
	}

}