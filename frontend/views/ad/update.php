<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ad */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ad',
]) . ' ' . $model->subject;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'My Ads'), 'url' => ['mine']];
$this->params['breadcrumbs'][] = ['label' => $model->subject, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
