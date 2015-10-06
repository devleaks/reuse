<?php
use common\models\Message;

use kartik\detail\DetailView;

use vova07\imperavi\Widget as RedactorWidget;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Message */

$this->title = $model->subject;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-view">

    <?= DetailView::widget([
        'model' => $model,
		'panel'=>[
	        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-blackboard"></i>  '.Html::encode($this->title).' </h3>',
	    ],
		'labelColOptions' => ['style' => 'width: 30%'],
        'attributes' => [
            [
                'attribute'=>'type',
				'type' => DetailView::INPUT_DROPDOWN_LIST,
				'items' => [
					Message::TYPE_BLOG => Yii::t('app', Message::TYPE_BLOG),
					Message::TYPE_PAGE => Yii::t('app', Message::TYPE_PAGE),
				],
            ],
            'subject',
 			[
                'attribute'=>'text',
				'type' => DetailView::INPUT_WIDGET,
				'widgetOptions' => [
					'class' => RedactorWidget::className(),
				    'settings' => [
				        'lang' => 'fr',
				        'minHeight' => 300,
				        'plugins' => [
				            'clips',
				        ],
				    	'imageUpload' => Url::to(['image-upload']),
						'imageManagerJson' => Url::to(['images-get']),
					],
				],
			],
            'language',
            'position',
            [
                'attribute'=>'sticky',
				'type' => DetailView::INPUT_SWITCH,
            ],
            'status',
            [
                'attribute'=>'expire_at',
				'format' => 'datetime',
				'type' => DetailView::INPUT_DATETIME,
				'widgetOptions' => [
					'pluginOptions' => [
	                	'format' => 'yyyy-mm-dd hh:ii:ss',
	                	'todayHighlight' => true
	            	]
				],
				'value' => $model->expire_at ? new DateTime($model->expire_at) : '',
            ],
			[
                'attribute'=>'created_at',
				'displayOnly' => true,
			],
			[
                'attribute'=>'updated_at',
				'displayOnly' => true,
			],
        ],
    ]) ?>

	<?=	$this->render('../media/_add', [
		'model' => $model,
	])?>

</div>
