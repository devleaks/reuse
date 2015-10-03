<?php

use common\models\Ad;
use common\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="ad-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
			[
				'attribute' => 'topcat',
				'label' => Yii::t('app', 'Type'),
				'filter' => [
					Ad::TYPE_OFFER => Yii::t('app', Ad::TYPE_OFFER),
					Ad::TYPE_DEMAND => Yii::t('app', Ad::TYPE_DEMAND),
					Ad::TYPE_LEND => Yii::t('app', Ad::TYPE_LEND),
					Ad::TYPE_BORROW => Yii::t('app', Ad::TYPE_BORROW),
				],
			],
			[
				'attribute' => 'category_id',
				'label' => Yii::t('app', 'Category'),
				'value' => 'category.name',
				'filter' => ArrayHelper::map(Category::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
			],
            'subject',
            'description',
            // 'price',
            // 'period',
			[
				'attribute' => 'status',
				'filter' => [
					Ad::STATUS_PENDING => Yii::t('app', Ad::STATUS_PENDING),
					Ad::STATUS_ACTIVE => Yii::t('app', Ad::STATUS_ACTIVE),
					Ad::STATUS_EXPIRED => Yii::t('app', Ad::STATUS_EXPIRED),
				],
			],
            // 'user_id',
            // 'expire_at',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
