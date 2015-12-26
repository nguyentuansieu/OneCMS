<?php

namespace frontend\controllers;

use common\models\Page;
use yii\web\NotFoundHttpException;

class PageController extends \yii\web\Controller
{
    public function actionView($slug)
    {
        $model = new Page();
        $node = $model->findOne(['slug' => $slug]);
        if(empty($node)) {
            throw new NotFoundHttpException('Không tim thấy nội dung theo yêu cầu.');
        }
        return $this->render('view', [
            'node' => $node,
        ]);
    }

}
