<?php
/**
 * LatestMessages widget renders the last messages available on the website.
 *
 * @author Pierre M <devleaks.be@gmail.com>
 */

namespace frontend\widgets;

use yii\data\ActiveDataProvider;
use yii\bootstrap\Widget;
use common\models\Message;

class LatestMessages extends Widget {
	/** number of recent message to display */
	public $messages_count = 5;
	public $words = 50;
	
	public function run() {
        return $this->render('latest-message', [
            'dataProvider' => new ActiveDataProvider([
				'query' => Message::find()->where(['type' => Message::TYPE_BLOG])->orderBy('created_at desc'),
				'pagination' => [
			        'pageSize' => $this->messages_count,
				],
			]),
			'words' => $this->words
        ]);
	}

}