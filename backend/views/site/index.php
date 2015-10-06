<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= Yii::t('app', 'Welcome!') ?></h1>

        <p><a class="btn btn-lg btn-success" href="/free"><?= Yii::t('app', 'Go To Public Site') ?></a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2><?= Yii::t('app', 'Ads') ?></h2>

                <ul>
                    <li><a href="<?= Url::to(['/ad']) ?>">Ads</a></li>
                    <li><a href="<?= Url::to(['/category']) ?>">Categories</a></li>
				</ul>

             </div>
            <div class="col-lg-4">
                <h2><?= Yii::t('app', 'Messages') ?></h2>

                <ul>
                    <li><a href="<?= Url::to(['/message']) ?>">Messages</a></li>
				</ul>
            </div>
            <div class="col-lg-4">
                <h2><?= Yii::t('app', 'Users') ?></h2>

                <ul>
                    <li><a href="<?= Url::to(['/user/admin']) ?>">Users</a></li>
				</ul>
            </div>
        </div>

    </div>
</div>
