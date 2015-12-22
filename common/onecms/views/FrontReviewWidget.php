<?php

use yii\helpers\Html;
?>
<div class="main-col">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="std">
                    <div class="best-seller-pro wow bounceInUp animated">
                        <div class="slider-items-products">
                            <div class="new_title center">
                                <h2>Bài viết nổi bật</h2>
                            </div>
                            <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col6">
                                    <?php foreach($nodes as $node): ?>
                                        <div class="item">
                                        <div class="col-item">
                                            <div class="sale-label sale-top-right">Hot</div>
                                            <div class="item-inner">
                                                <div class="product-wrapper">
                                                    <div class="thumb-wrapper">
                                                        <?=Html::a('<span class="face">'
                                                            . Yii::$app->imageCache->thumb($node->image, 'review', ['class'=>'img-responsive']) .
                                                        '</span><span class="face back">'
                                                            . Yii::$app->imageCache->thumb($node->image, 'review', ['class'=>'img-responsive']) .'</span>'
                                                            , ['review/view', 'slug' => $node->slug], ['class' => 'thumb flip']); ?>
                                                    </div>
                                                    <div class="actions">
                                                        <span class="add-to-links">
                                                            <a href="#" class="link-wishlist" title="Add to Wishlist"><span>Thích</span></a>
                                                            <a href="#" class="link-compare" title="Add to Compare"><span>Bình luận</span></a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <?=Html::a($node->title, ['review/view', 'slug' => $node->slug], ['class' => 'thumb flip']); ?>
                                                            </div>
                                                        <div class="item-content">
                                                            <div class="rating">
                                                                <div class="ratings">
                                                                    <div class="rating-box">
                                                                        <div class="rating" style="width:60%"></div>
                                                                    </div>
                                                                    <p class="rating-links"><a href="#">1 Review(s)</a>
                                                                        <span class="separator">|</span> <a href="#">Add
                                                                            Review</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>