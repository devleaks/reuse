<?php

use common\models\Donnerie;

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = Yii::t('app', 'Donneries');
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
	
		<?= Yii::t('app', 'Please select a donnerie') ?>
	
		<ul>
		<?php foreach(Donnerie::find()->each() as $donnerie)
			echo '<li>'.Html::a($donnerie->name, 'http://'.$donnerie->key.':8080/free/').'</li>';			
		?>
		</ul>
	
		</div>

    </div>
</div>
