<?php

use kartik\grid\GridView;

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		        'responsive'=>true,
		        'hover'=>true,
		        'condensed'=>true,
		        'floatHeader'=>true,
		        'panel' => [
		            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-shopping-cart"></i> '.Html::encode($this->title).' </h3>',
		            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),                                                                                                                                                          	
		//			'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
		            'showFooter'=>false
		        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'category.name',
            'topcat',
            'subject',
            'description',
            // 'price',
            // 'period',
            // 'status',
            // 'user_id',
            // 'expire_at',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
