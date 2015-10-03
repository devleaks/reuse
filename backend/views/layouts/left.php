<?php

use common\models\Menu;
use yii\helpers\Url;

$role = Menu::getRole();

?><aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/uploads/profile/<?= Yii::$app->user->identity->username ?>.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="<?= Url::to(['/site/search']) ?>" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>

        <!-- /.search form -->
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    [
                        'label' => 'Ads',
                        'icon' => 'fa fa-list',
                        'url' => '#',
                        'items' => [
                            ['label' => Yii::t('app', 'Ads'), 'icon' => 'fa fa-automobile', 'url' => ['/ad/ad'],],
                        	['label' => Yii::t('app', 'Categories'), 'icon' => 'fa fa-tags', 'url' => ['/ad/categorie'],],
						],
					],
                    [
                        'label' => 'News',
                        'icon' => 'fa fa-pencil-square',
                        'url' => '#',
                        'items' => [
                            ['label' => Yii::t('app', 'Newsletters'), 'icon' => 'fa fa-newspaper-o', 'url' => ['/news/newsletter'],],
                        	['label' => Yii::t('app', 'Messages'), 'icon' => 'fa fa-list-alt', 'url' => ['/news/messages'],],
						],
					],
                    [
                        'label' => 'Site',
                        'icon' => 'fa fa-dashboard',
                        'url' => '#',
                        'items' => [
                            ['label' => Yii::t('app', 'Donneries'), 'icon' => 'fa fa-hand-paper-o', 'url' => ['/admin/donnerie'],],
	                        ['label' => Yii::t('app', 'Users and Access'), 'icon' => 'fa fa-user', 'url' => ['/user/admin'],],
	                        ['label' => Yii::t('app', 'Backup'), 'icon' => 'fa fa-download', 'url' => ['/admin/backup'],],

						],
					],
			        [
                        'label' => 'Development',
                        'icon' => 'fa fa-cog',
                        'url' => '#',
                        'items' => [
		                    // ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
	                    	['label' => Yii::t('app', 'Debug'), 'icon' => 'fa fa-bug', 'url' => ['/debug']],
		                    ['label' => Yii::t('app', 'Gii'), 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
	                    	['label' => Yii::t('app', 'Frontend'), 'icon' => 'fa fa-heart', 'url' => ['/../free']],
		                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
						],
					],		
                ],
            ]
        ) ?>

    </section>

</aside>
