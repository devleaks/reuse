<?php
use common\models\Donnerie;

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <?= DetailView::widget([
        'model' => $model,
		'panel'=>[
	        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-tags"></i>  '.Html::encode($this->title).' </h3>',
	    ],
		'labelColOptions' => ['style' => 'width: 30%'],
        'attributes' => [
			[
                'attribute'=>'id',
				'displayOnly' => true,
			],
            'name',
            [
                'attribute'=>'status',
				'type' => DetailView::INPUT_DROPDOWN_LIST,
				'items' => [
					Donnerie::STATUS_ACTIVE => Yii::t('app', Donnerie::STATUS_ACTIVE),
					Donnerie::STATUS_RETIRED => Yii::t('app', Donnerie::STATUS_RETIRED),
				],
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

</div>
