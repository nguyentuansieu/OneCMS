<?php
/* @var $this yii\web\View */
$this->title = $node->title;
?>
<div class="container wrapper">
    <div class="col-lg-8">
        <h1><?=\yii\helpers\Html::encode($node->title); ?></h1>

       <div class="content-wrap">
        <?=$node->content; ?>
       </div>

    </div>
    <div class="col-lg-4">

    </div>
</div>
