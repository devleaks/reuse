<?php
namespace backend\controllers;

use common\models\LoginForm;
use common\components\LanguageSelector;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use \yii\web\Cookie;

/**
 * Site controller
 */
class SiteController extends Controller
{
	
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'lang'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'lang'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLang($lang)
    {
		$cookie = new Cookie([
		    'name' => LanguageSelector::LANG_COOKIE,
		    'value' => $lang,
		    'expire' => time() + 86400 * 365,
		]);
		\Yii::$app->getResponse()->getCookies()->add($cookie);
        return $this->redirect(Yii::$app->request->referrer);
    }

}
