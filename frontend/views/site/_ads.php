<?php
use yii\helpers\Html;
use yii\grid\GridView;
use frontend\widgets\LatestAds;
	
/* @var $this yii\web\View */
$this->title = 'Latest Ads';
?>
<div class="site-ads">
	
    <?= LatestAds::widget([
			'ads_count' => 8,
			'words' => 30
	]); ?>

</div>
