<?php

use common\models\Menu;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">
	
	<?php if(count($model->errors) > 0) {
		echo '<div class="alert alert-danger">';
		echo print_r($model->errors, true);
		echo '</div>';
	} ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 40]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 2048]) ?>

    <?= $form->field($model, 'parent_name')->widget('yii\jui\AutoComplete',[
        'options'=>['class'=>'form-control'],
        'clientOptions'=>[
            'source'=>  Menu::find()->select(['name'])->column()
        ]
    ]) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
