<?php

use yii\helpers\Html;
$this->title = Html::encode($node->title);
?>
    <div class="wrapper-page clearfix">
        <div class="container" itemscope="" itemtype="http://schema.org/Product">
            <div class="row">
                <div class="col-lg-5">
                    <div class="product_images_wrap">
                        <div class="product_images_thumb">
                            <div id="product_images">
                                <div class="thumbelina-but vert top"></div>
                                <ul id="product_images_item_thumb">
                                    <?php
                                        $images = explode(',',$node->images);
                                        foreach($images as $image):
                                    ?>
                                        <li data-large-image="<?=trim($image);?>"><?= HTML::img(trim($image), ['width' => 83]); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="thumbelina-but vert bottom"></div>
                            </div>
                        </div>
                        <div class="product_images_large">
                            <?= HTML::img($node->image, ['class' => 'img-responsive', 'id' => 'product_images_img']); ?>
                        </div>
                    </div>

                    <meta itemprop="image"
                          content="<?=$node->image?>">
                </div>
                <div class="col-lg-4">
                    <h1 itemprop="name" class="product-title"><?=Html::encode($node->title); ?></h1>
                    <div class="product-description">
                        <p>
                            <strong>Thương hiệu:</strong> ĐH Bách Khoa
                        </p>
                        <div class="product-price" itemprop="price"><?=Html::encode($node->price); ?>đ</div>
                        <div class="product-excerpt" itemprop="description" style="max-height: none;">
                            <?=$node->summary; ?>
                        </div>
                        <div class="btn-cart-wrap">
                            <div class="btn-cart">
                                <i class="icon-shop-cart"></i>
                                Đặt mua sản phẩm
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="banner-item orange">
                        <i class="fa fa-car"></i>
                        <h4>Giao hàng </h4>
                        <p>Miễn phí toàn quốc</p>
                    </div>
                    <div class="banner-item light-blue">
                        <i class="fa fa-calculator"></i>
                        <h4>THANH TOÁN</h4>
                        <p>Khi nhận hàng</p>
                    </div>
                    <div class="banner-item gray">
                        <i class="fa fa-refresh"></i>
                        <h4>ĐỔI TRẢ HÀNG</h4>
                        <p>Lên đến 30 ngày</p>
                    </div>
                    <div class="banner-item green">
                        <h4 class="hotline-title">TƯ VẤN SẢN PHẨM</h4>
                        <p class="phone-number">(04) 73068386</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="product_description">
                        <ul class="adr tabs" id="product_menu">
                            <li class="active">
                                <a href="#tab_content_product_introduction" data-toggle="tab">
                                    Giới thiệu sản phẩm
                                </a>
                            </li><!-- end item -->
                            <!-- end item -->
                            <li>
                                <a href="#tab_content_product_specifications" data-toggle="tab">
                                    Thông số kỹ thuật
                                </a>
                            </li><!-- end item -->
                            <!-- end item -->
                            <li>
                                <a href="#tab_content_product_videos" data-toggle="tab">
                                    Video clip
                                </a>
                            </li><!-- end item -->
                            <!-- end item -->
                            <li>
                                <a href="#tab_content_product_comments" data-toggle="tab">
                                    Đánh giá và bình luận
                                </a>
                            </li><!-- end item -->
                        </ul><!-- end .adr-tabs -->

                        <div class="adr tabs-content">
                            <div class="tab-content active" id="tab_content_product_introduction">
                                <?=$node->content; ?>
                            </div>

                            <div class="tab-content" id="tab_content_product_specifications">
                                <h2>Thông số sản phẩm</h2>
                                <?=$node->specification; ?>
                            </div>
                            <div class="tab-content" id="tab_content_product_videos">
                                <div class="text-center">
                                    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/2fS-6SVO7Fg?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="tab-content" id="tab_content_product_comments">
                                <div class="fb-comments" data-href="http://developers.facebook.com/docs/plugins/comments/" data-width="100%" data-numposts="10"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fb-root"></div>
<?php
$js = "
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = \"//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=1105169119509249\";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\\//,'') == this.pathname.replace(/^\\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    $(function(){
        $('#product_images').Thumbelina({
            orientation:'vertical',         // Use vertical mode (default horizontal).
            \$bwdBut:$('#product_images .top'),     // Selector to top button.
            \$fwdBut:$('#product_images .bottom'),   // Selector to bottom button.
            \$largeZone: $('#product_images_img'),
            \$thumbZone: $('#product_images_item_thumb li')
        });
    });
";
$this->registerJs($js, 3);
?>