<?php
/* @var $this yii\web\View */
$this->title = 'Sản phẩm';
?>
<div class="container wrapper">
    <h1>Sản phẩm</h1>
    <div class="products-wrap">
        <?php foreach($nodes as $node): ?>
            <?=$node->title; ?>
        <?php endforeach; ?>
    </div>
</div>
