<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FlightSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="latest-messages-portlet portlet">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
		'itemView' => '_ad-short',
		'summary' => false,
    ]); ?>

</div>
