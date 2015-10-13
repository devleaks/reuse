<?php

use yii\helpers\Html;
use yii\helpers\Url;

if( $theme = (Yii::$app->donnerie ? Yii::$app->donnerie->getTheme() : null) )
	$this->theme = $theme;

/* @var $this yii\web\View */
$this->title = Yii::$app->name;
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-8">
				<?= $this->render('_ads', ['ads' => $ads]) ?>                

<?php if(! Yii::$app->user->isGuest): ?>
				<p>&raquo; <a href="<?= Url::to(['/ad/create']) ?>">New Ad</a> &raquo; <a href="<?= Url::to(['/ad/mine']) ?>">My Ads</a></p>
<?php endif; ?>
            </div>

            <div class="col-lg-4">
				<div class="row">
    				<h3><?= Html::encode(Yii::t('app','Search')) ?></h3>

					<?= $this->render('_search', ['model' => $search]) ?>
				</div>

				<div class="row">
    				<h3><?= Html::encode('Latest News') ?></h3>

					<?= $this->render('_news', ['news' => $messages]) ?>

					<p><a href="<?= Url::to(['/news']) ?>">Archive</a></p>
				</div>
            </div>
        </div>

    </div>
</div>
