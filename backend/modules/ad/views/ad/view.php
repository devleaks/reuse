<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Ad */

$this->title = $model->subject;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-view">

    <?= DetailView::widget([
        'model' => $model,
		'panel'=>[
	        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-shopping-cart"></i>  '.Html::encode($this->title).' </h3>',
	    ],
		'labelColOptions' => ['style' => 'width: 30%'],
       	'attributes' => [
            'category_id',
            'topcat',
            'subject',
            'description',
            'price',
            'period',
            'status',
            'user_id',
            'expire_at',
            'created_at',
            'updated_at',
        ],
    ]) ?>

	<?=	$this->render('../media/_add', [
		'model' => $model,
	])?>


</div>
