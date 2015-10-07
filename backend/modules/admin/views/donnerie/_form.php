<?php

use kartik\switchinput\SwitchInput;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 40]) ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), ['pluginOptions' => [
				'onText' => Yii::t('app', $model::STATUS_ACTIVE),
				'offText' =>  Yii::t('app', $model::STATUS_RETIRED),
		        'onColor' => 'success',
		        'offColor' => 'danger',
				'state' => $model->status == $model::STATUS_ACTIVE
	]]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
