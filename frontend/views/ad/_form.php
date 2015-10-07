<?php

use common\models\Ad;
use common\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Ad */
/* @var $form yii\widgets\ActiveForm */

if(! $model->expire_at)
	$model->expire_at = date('Y-m-d H:i:s', strtotime('now + 7 days'));

?>

<div class="ad-form">

	<?php if(count($model->errors) > 0) {
		echo '<div class="alert alert-danger">';
		echo print_r($model->errors, true);
		echo '</div>';
	} ?>

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
		'id' => 'media-input-form',
	]);
	?>

    <?= $form->field($model, 'ad_type')->radioList([
			Ad::TYPE_OFFER => Yii::t('app', Ad::TYPE_OFFER),
			Ad::TYPE_DEMAND => Yii::t('app', Ad::TYPE_DEMAND),
			Ad::TYPE_LEND => Yii::t('app', Ad::TYPE_LEND),
			Ad::TYPE_BORROW => Yii::t('app', Ad::TYPE_BORROW),
	]) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category_id')->dropDownList([''=>'']+ArrayHelper::map(Category::find()->orderBy('name')->asArray()->all(), 'id', 'name'))->label('Category') ?>

    <?= $form->field($model, 'expire_at')->widget(DateTimePicker::classname(), [
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd hh:ii:ss',
                'todayHighlight' => true
            ]
        ]) ?>

	<?php if (true /*!$model->isNewRecord*/)
				echo $this->render('../media/_add', [
		'model' => $model,
		'form' => $form,
	])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
