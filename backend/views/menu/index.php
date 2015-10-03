<?php

use common\models\Menu;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?> <?= Html::a(Yii::t('app', 'Create Menu'), ['create'], ['class' => 'btn btn-success']) ?></h1>

	<div class="alert alert-info">
		<?= Yii::t('app', 'Menu elements included in a menu named <code>{name}</code> will be ADDED to the top navigation elements.', ['name' => Menu::TOP]) ?>
	</div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'url:url',
            'position',
            [
				'attribute' => 'parent_id',
				'value' => 'parent.name'

			],
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
