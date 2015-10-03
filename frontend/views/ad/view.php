<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Ad */

$this->title = $model->subject;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'My Ads'), 'url' => ['mine']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'topcat',
            'category.name',
            'status',
            'expire_at',
            'created_at',
            'updated_at',
            'subject',
            'description',
        ],
    ]) ?>

	<?=	$this->render('_gallery', [
		'model' => $model,
	])?>

</div>
