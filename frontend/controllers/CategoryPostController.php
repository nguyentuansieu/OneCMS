<?php

namespace frontend\controllers;

use common\models\CategoryPost;
use common\models\Post;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class CategoryPostController extends \yii\web\Controller
{
    public function actionView($slug)
    {
        $model = new CategoryPost();
        $category = $model->findOne(['slug' => $slug]);
        if(empty($category)) {
            throw new NotFoundHttpException('Không tìm thấy nội dung theo yêu cầu.');
        }
        $posts = Post::find()->where(['category_id' => $category->id, 'published' => 10]);
        $count = $posts->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $nodes = $posts->offset($pagination->offset)
            ->limit(10)
            ->orderBy(['id' => SORT_DESC])
            ->all();
        return $this->render('view', [
            'category_title' => $category->title,
            'nodes' => $nodes,
            'pagination' => $pagination,
        ]);
    }

}
