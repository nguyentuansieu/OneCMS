<?php

use yii\helpers\Html;
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="homepage-category homepage-category-small theme-denim">
                <div class="category-item-title">
                    <h2>
                        <i class="fa fa-shopping-cart"></i> <span>Sản phẩm</span>
                    </h2>
                </div>
                <div class="temp-wrapper">
                    <?php foreach($nodes as $node): ?>
                        <?=HTML::a(HTML::img($node->image), $node->link); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>