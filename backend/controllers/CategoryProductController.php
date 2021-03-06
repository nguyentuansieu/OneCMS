<?php

namespace backend\controllers;

use common\onecms\TreeHelper;
use Yii;
use common\models\CategoryProduct;
use backend\models\CategoryProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryProductController implements the CRUD actions for CategoryProduct model.
 */
class CategoryProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CategoryProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoryProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CategoryProduct model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CategoryProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CategoryProduct();
        $treeParents = TreeHelper::build($model->find()->addOrderBy('tree')->addOrderBy('lft')->all());
        if ($model->load(Yii::$app->request->post())) {
            if(empty($model->parent_id)) {
                $model->makeRoot();
            } else {
                $root = $model->findOne(['id' => $model->parent_id]);
                $model->appendTo($root);
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'treeParents' => $treeParents,
            ]);
        }
    }

    /**
     * Updates an existing CategoryProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $treeParents = TreeHelper::build($model->find()->addOrderBy('tree')->addOrderBy('lft')->all());
        if ($model->load(Yii::$app->request->post())) {
            if(empty($model->parent_id)) {
                ($model->isRoot()) ? $model->save() : $model->makeRoot();
            } else {
                $root = $model->findOne(['id' => $model->parent_id]);
                $model->appendTo($root);
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'treeParents' => $treeParents,
            ]);
        }
    }

    /**
     * Deletes an existing CategoryProduct model.
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
     * Finds the CategoryProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CategoryProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CategoryProduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
