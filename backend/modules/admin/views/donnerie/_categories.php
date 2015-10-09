<?php

use common\models\Category;
use common\models\DonnerieCategory;

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Category */

$availables = [];
foreach(Category::find()->each() as $category)
	$availables[$category->id] = $category->name;
	
$registereds = [];
foreach ($model->getActiveCategories()->each() as $category) {
    $registereds[$category->id] = $availables[$category->id];
    unset($availables[$category->id]);
}

?>
<div class="category-create">

    <div class="col-lg-5">
        Available Categories:
        <?php
        echo Html::textInput('search_avail', '', ['class' => 'category-search', 'data-target' => 'availables']) . '<br>';
        echo Html::listBox('categories', '', $availables, [
            'id' => 'availables',
            'multiple' => true,
            'size' => 20,
            'style' => 'width:100%']);
        ?>
    </div>
    <div class="col-lg-1">
        &nbsp;<br><br>
        <?php
        echo Html::a('>>', '#', ['class' => 'btn btn-success', 'data-action' => 'register']) . '<br>';
        echo Html::a('<<', '#', ['class' => 'btn btn-success', 'data-action' => 'deregister']) . '<br>';
        ?>
    </div>
    <div class="col-lg-5">
        Categories for this Donnerie:
        <?php
        echo Html::textInput('search_regs', '', ['class' => 'category-search', 'data-target' => 'registereds']) . '<br>';
        echo Html::listBox('categories', '', $registereds, [
            'id' => 'registereds',
            'multiple' => true,
            'size' => 20,
            'style' => 'width:100%']);
        ?>
    </div>

</div>
<?php
$this->render('_categories-script',['id'=>$model->id]);

