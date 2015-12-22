<?php

namespace common\onecms;

use common\models\Advertising;
use yii\base\Widget;

class FrontProductWidget extends Widget
{

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub
        $advertingModel = new Advertising();
        $nodes = $advertingModel->find()->where(['position' => 'home_product'])->limit(10)->all();
        return $this->render('FrontProductWidget', [
            'nodes' => $nodes,
        ]);
    }
}