<?php

use kartik\detail\DetailView;

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ad */

$this->title = $model->subject;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'My Ads'), 'url' => ['mine']];
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
            'ad_type',
            'category_id',
            'status',
            'expire_at',
            'created_at',
            'updated_at',
            'subject',
            'description',
        ],
    ]) ?>

	<?=	$this->render('../media/_add', [
		'model' => $model,
	])?>

</div>
