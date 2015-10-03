<?php

use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\Model-with-picture */

?>
<div class="media-add">
<?php
    $items = array();
    foreach($model->media as $picture)
        $items[] = Html::img($picture->getFileUrl(), ['class'=>'file-preview-image', 'alt'=>$picture->name, 'title'=>$picture->name]);

	echo $form->field($model, 'media[]')->widget(FileInput::classname(), [
		'options' => ['accept' => 'image/jpeg, image/png, image/gif', 'multiple' => true],
		'pluginOptions' => [
			'initialPreview'    => $items,
			'initialCaption'    => Yii::t('app', 'Select pictures'),
			'overwriteInitial'  => false
		]
	]);
?>

</div>
