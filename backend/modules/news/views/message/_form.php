<?php
use common\models\Donnerie;
use common\models\Message;

use kartik\widgets\DateTimePicker;
use kartik\switchinput\SwitchInput;

use vova07\imperavi\Widget;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'donnerie_id')->dropDownList(ArrayHelper::map(Donnerie::find()->orderBy('name')->asArray()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'type')->dropDownList([
		Message::TYPE_BLOG => Yii::t('app', Message::TYPE_BLOG),
		Message::TYPE_PAGE => Yii::t('app', Message::TYPE_PAGE),
	]) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'language')->dropDownList([
		'fr' => Yii::t('app', 'French'),
		'nl' => Yii::t('app', 'Dutch'),
		'en' => Yii::t('app', 'English'),
	]) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'sticky')->widget(SwitchInput::classname(), [
	    'type' => SwitchInput::CHECKBOX
	]) ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), ['pluginOptions' => [
				'onText' => Yii::t('app', $model::STATUS_ACTIVE),
				'offText' =>  Yii::t('app', $model::STATUS_RETIRED),
		        'onColor' => 'success',
		        'offColor' => 'danger',
				'state' => $model->status == $model::STATUS_ACTIVE
	]]) ?>

    <?= $form->field($model, 'expire_at')->widget(DateTimePicker::classname(), [
		'options' => ['placeholder' => 'Enter event time ...'],
		'pluginOptions' => [
			'autoclose' => true
		]
	]) ?>

	<?= $form->field($model, 'text')->widget(Widget::className(), [
	    'settings' => [
	        'lang' => 'fr',
	        'minHeight' => 300,
	        'plugins' => [
	            'clips',
	        ],
	    	'imageUpload' => Url::to(['image-upload']),
			'imageManagerJson' => Url::to(['images-get']),
	    ]
	]) ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
