<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Ad;
use common\models\Category;

/* @var $this yii\web\View */
?>
<div class="site-search">
	
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->checkboxList(ArrayHelper::map(Category::find()->orderBy('name')->asArray()->all(), 'id', 'name'))->label('Category') ?>

    <?= $form->field($model, 'topcat')->checkboxList([
			Ad::TYPE_OFFER => Yii::t('app', Ad::TYPE_OFFER),
			Ad::TYPE_DEMAND => Yii::t('app', Ad::TYPE_DEMAND),
			Ad::TYPE_LEND => Yii::t('app', Ad::TYPE_LEND),
			Ad::TYPE_BORROW => Yii::t('app', Ad::TYPE_BORROW),
	]) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => 80]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
