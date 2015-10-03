<?php

use common\models\Ad;
use common\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'My Ads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-index">

    <h1><?= Html::encode($this->title) ?> <?= Html::a(Yii::t('app', 'Create Ad'), ['create'], ['class' => 'btn btn-success']) ?></h1>

    <?= $this->render('_index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]); ?>

</div>
