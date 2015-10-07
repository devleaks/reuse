<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use frontend\widgets\LatestAds;
	
/* @var $this yii\web\View */
$this->title = 'Ads';
?>
<div class="site-ads">
	
	<?php if($ads): ?>
	    <?= ListView::widget([
	        'dataProvider' => $ads,
			'itemView' => '_ad-short',
			'summary' => false,
	    ]); ?>
	
	<?php else: ?>
	    <?= LatestAds::widget([
				'ads_count' => 8,
				'words' => 30
		]); ?>
	<?php endif; ?>

</div>
