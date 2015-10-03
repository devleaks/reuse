<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\widgets\LatestMessages;

/* @var $this yii\web\View */
?>
<div class="site-news">
	
    <?= LatestMessages::widget([
			'messages_count' => 3,
			'words' => 30
	]); ?>

</div>
