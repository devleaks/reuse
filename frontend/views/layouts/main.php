<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\models\Menu;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

if(isset(Yii::$app->params['BootswatchTheme'])) {
	raoul2000\bootswatch\BootswatchAsset::$theme = Yii::$app->params['BootswatchTheme'];
	raoul2000\bootswatch\BootswatchAsset::register($this);
}

// Yii::$app->donnerie->register($this);
// Yii::$app->donnerie->getAsset();
AppAsset::register($this);

$apphomedir = Yii::getAlias('@app');
$languages = isset(Yii::$app->params['languages']) ? array_keys(Yii::$app->params['languages']) : [substr(Yii::$app->language, 0, 2)];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
			$name = Yii::$app->name . (YII_ENV_DEV ? ' –DEV='.`cd $apphomedir ; git describe --tags` : '') . (YII_DEBUG ? '–DEBUG' : '') ;
            NavBar::begin([
                'brandLabel' => $name.' - '.Yii::$app->donnerie->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
			$menuItems = Menu::getMenu(Menu::TOP);
/*
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
                ['label' => 'Sub', 'items' => $sub],
            ];
*/
			$menuLanguages = [];
			foreach($languages as $lang)
				if(substr(Yii::$app->language, 0, 2) != $lang)
					$menuLanguages[] = ['label' => $lang, 'url' => ['site/lang', 'lang'=>$lang]];
			$menuItems[] = ['label' => substr(Yii::$app->language, 0, 2), 'items' => $menuLanguages];

            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/user/register']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/user/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/user/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
		<?= Yii::$app->donnerie->donnerie ? $content : $this->render('donneries') ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; <?= Yii::$app->name . ' ' . date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
