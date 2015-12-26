<?php

namespace backend\controllers;

use Yii;
use common\models\Post;
use yii\web\Controller;
use common\onecms\SimpleHtmlDom;

class FakeController extends Controller {
    public function actionCreate($url)
    {
        exit();
        $html = SimpleHtmlDom::file_get_html($url);
        foreach($html->find('ul[id="news_home"] li') as $item) {
            $model = new Post();
            $image = str_replace('_240x144', null, $item->find('img', 0)->src);
            $model['category_id'] = 1;
            $model['title'] = trim($item->find('a[class="title_tin"]', 0)->plaintext);
            $model['image'] = $this->saveImage($image);
            $detail = $item->find('a[class="title_tin"]', 0)->href;
            $html_detail = SimpleHtmlDom::file_get_html($detail);
            $summary = $html_detail->find('p[class="lead"]', 0)->plaintext;
            $content = strip_tags($html_detail->find('div[class="fck_detail width_common"]',0)->innertext, '<img><strong><br /><br><p>');
            $model['content'] = $summary . $content;
            $model->save();
        }
    }

    function saveImage($urlImage) {
        $tmpImage = file_get_contents($urlImage);
        $pathUpload = '/vagrant/onecms/frontend/web/uploads/demo/';
        $nameImage = uniqid().'.jpg';
        $pathImage = '/uploads/demo/'.$nameImage;
        $thumbImage = $pathUpload . $nameImage;
        file_put_contents($thumbImage, $tmpImage);
        return $pathImage;
    }
}