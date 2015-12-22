<?php

namespace common\onecms;

use common\models\Video;
use yii\base\Widget;

class FrontVideoWidget extends Widget
{

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub
        $nodes = $this->getData();
        return $this->render('FrontVideoWidget', [
            'nodes' => $nodes,
        ]);
    }

    public static function getData()
    {
        $videoModel = new Video();
        $videoData = $videoModel->find()->limit(6)->all();
        $videoHot = array(
            $videoData[0],
            $videoData[1]
        );
        $videoHotChild = array(
            $videoData[2],
            $videoData[3],
            $videoData[4],
            $videoData[5],
        );
        return array(
            'videoHot' => $videoHot,
            'videoHotChild' => $videoHotChild
        );
    }
}