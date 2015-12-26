<?php

namespace frontend\controllers;

use common\models\Product;

class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Product();
        $products = $model->findAll(['published' => 10]);
        return $this->render('index', [
            'nodes' => $products,
        ]);
    }

    public function actionView($slug)
    {
        $model = new Product();

        $node = $model->findOne(['slug' => $slug]);
        return $this->render('view', [
            'node' => $node,
        ]);
    }

}
