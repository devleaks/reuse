<?php

use common\models\Ad;
use common\models\Category;
use common\models\Donnerie;
use common\models\User;

use kartik\grid\GridView;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ads');
$this->params['breadcrumbs'][] = $this->title;

$statuses = '<div class="btn-group"><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">'.
				Yii::t('app', 'Change Status of Selected Registrations to '). ' <span class="caret"></span></button><ul class="dropdown-menu" role="menu">';
foreach([Ad::STATUS_PENDING, Ad::STATUS_ACTIVE, Ad::STATUS_DISABLED] as $value)
	$statuses .= '<li>'.Html::a(Yii::t('app', 'Change to {0}', $value), null, ['class' => 'app-bulk-action', 'data-status' => $value]).'</li>';
$statuses .= '</ul></div>';

$user = null;
if($user = User::findOne(Yii::$app->user->identity->id)) {
	if($user->role == 'manager') { // can only manage 1 donnerie
		$dataProvider->query->andWhere(['donnerie_id' => $user->donnerie_id]);
		Yii::trace('added '.$user->donnerie_id, 'view index');
	}
}
?>
<div class="ad-index">

    <?= GridView::widget([
		'options' => ['id' => 'reuse-ads'],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive'=>true,
        'hover'=>true,
        'condensed'=>true,
        'floatHeader'=>true,
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-shopping-cart"></i> '.Html::encode($this->title).' </h3>',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),                                                                                                                                                          	
//			'after'=> $statuses,
            'showFooter'=>false
        ],
		'pjax' => true,
		'pjaxSettings' => [
	        'neverTimeout' => true,
	    ],
		'export' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

		    [
				'attribute' => 'donnerie_id',
				'filter' => ArrayHelper::map(Donnerie::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
				'value' => function ($model, $key, $index, $widget) {
					return $model->donnerie ? $model->donnerie->name : '';
				},
				'visible' => $user->role == 'admin',
			],
	        [
				'attribute' => 'category_id',
				'filter' => ArrayHelper::map(Category::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
				'value' => function ($model, $key, $index, $widget) {
					return $model->category->name;
				}
			],
            [
				'attribute' => 'ad_type',
				'filter' => [
					Ad::TYPE_OFFER => Yii::t('app', Ad::TYPE_OFFER),
					Ad::TYPE_DEMAND => Yii::t('app', Ad::TYPE_DEMAND),
					Ad::TYPE_LEND => Yii::t('app', Ad::TYPE_LEND),
					Ad::TYPE_BORROW => Yii::t('app', Ad::TYPE_BORROW),
				],
			],
            'subject',
            'description',
            // 'price',
            // 'period',
            [
				'attribute' => 'status',
				'filter' => [
					Ad::STATUS_ACTIVE => Yii::t('app', Ad::STATUS_ACTIVE),
					Ad::STATUS_PENDING => Yii::t('app', Ad::STATUS_PENDING),
					Ad::STATUS_DISABLED => Yii::t('app', Ad::STATUS_DISABLED),
				],
			],
            [
	            'label' => Yii::t('app', 'Login name'),
				'attribute' => 'user_id',
				'value' => function ($model, $key, $index, $widget) {
					return $model->user ? $model->user->username : '';
				}
			],
            // 'expire_at',
			[
				'attribute' => 'created_at',
				'format' => 'datetime',
				'value' => function ($model, $key, $index, $widget) {
					return new DateTime($model->created_at);
				}
			],
            // 'updated_at',

            [
				'class' => 'kartik\grid\ActionColumn',
				'template' => '{view} {delete}',
			],
            [
				'class' => 'kartik\grid\CheckboxColumn',
				'rowSelectedClass' => Gridview::TYPE_SUCCESS,
			],
        ],
    ]); ?>

	<?= $statuses ?>
</div>
<script type="text/javascript">
<?php
$this->beginBlock('JS_PJAXREG') ?>
$("a.app-bulk-action").click(function(e) {
	collected = $('#reuse-ads').yiiGridView('getSelectedRows');
	if(collected != '') {
		status = $(this).data('status');
		console.log('status to '+status);
		
		$.ajax({
			type: "POST",
			url: "<?= Url::to(['ad/bulk-status'])?>",
			data: {
		        ids : collected,
				status : status
		    },
			success: function () {
				console.log('reloaded');
		        $.pjax.reload({container:'#reuse-ads-pjax'});
		    }
		});
//			console.log('sent');
	}
});
<?php $this->endBlock(); ?>
</script>
<?php
$this->registerJs($this->blocks['JS_PJAXREG'], yii\web\View::POS_READY);
