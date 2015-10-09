<?php

namespace backend\modules\admin\controllers;

use Yii;
use common\models\Category;
use common\models\Donnerie;
use common\models\DonnerieSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\Html;

/**
 * DonnerieController implements the CRUD actions for Donnerie model.
 */
class DonnerieController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Donnerie models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DonnerieSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Donnerie model or Edit it.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('view', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new Donnerie model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Donnerie();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Donnerie model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Donnerie model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Donnerie the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Donnerie::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCatAdd($donnerie_id)
    {
        $post = Yii::$app->request->post();
        $categories = $post['categories'];
		$donnerie = $this->findModel($donnerie_id);
        $error = [];

        foreach ($categories as $category_id) {
			if($category = Category::findOne($category_id)) {
               	$donnerie->add($category);
			}
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [$this->actionCategorySearch($donnerie_id, 'availables',  $post['search_avail']),
                $this->actionCategorySearch($donnerie_id, 'registereds', $post['search_regs']),
                $error];
    }

    public function actionCatDel($donnerie_id)
    {
        $post = Yii::$app->request->post();
        $categories = $post['categories'];
		$donnerie = $this->findModel($donnerie_id);
        $error = [];

        foreach ($categories as $category_id) {
			if($category = Category::findOne($category_id)) {
               	$donnerie->remove($category);
			}
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [$this->actionCategorySearch($donnerie_id, 'availables',  $post['search_avail']),
                $this->actionCategorySearch($donnerie_id, 'registereds', $post['search_regs']),
                $error];
    }

    public function actionCategorySearch($id, $target, $term = '')
    {
		$model = $this->findModel($id);

		$availables = [];
		foreach(Category::find()->all() as $category)
			$availables[$category->id] = $category->name;
			
        $registereds = [];
        foreach ($model->getActiveCategories()->each() as $category) {
            $registereds[$category->id] = $availables[$category->id];
            unset($availables[$category->id]);
        }

        $result = [];
        if (!empty($term)) {
            foreach (${$target} as $category) {
                if (strpos($category, $term) !== false) {
					$id = Category::findOne(['name' => $category]);
                    $result[$id->id] = $category;
                }
            }
        } else {
            $result = ${$target};
        }
        return Html::renderSelectOptions('', $result);
    }

}
