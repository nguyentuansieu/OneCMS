<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => HTML::img('@web/img/logo.png'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default onecms-header navbar-fixed-top',
        ],
    ]);
    echo '<div class="navbar-form onecms-hotline navbar-right hidden-xs hidden-sm">
            <button class="btn btn-danger">0943 668 716</button>
          </div>
        ';
    $menuItems = [
        ['label' => 'Trang chủ', 'url' => ['/site/index']],
        ['label' => 'Giới thiệu', 'url' => ['/page/view', 'slug' => 'gioi-thieu']],
//        ['label' => 'Sản phẩm', 'url' => ['/product/index']],
        ['label' => 'Blogs', 'url' => ['/category-post/view', 'slug' => 'tin-tuc']],
        ['label' => 'Liên hệ', 'url' => ['/page/view', 'slug' => 'lien-he']],
    ];
    if (!Yii::$app->user->isGuest)
    {
        $menuItems[] = [
            'label' => 'Thoát (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }

    echo Nav::widget([
        'options' => ['class' => 'onecms-nav navbar-nav navbar-right'],
        'items' => $menuItems,
        'activateParents' => 'true',
        'activateItems' => 'true',
    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h4>Hỗ trợ khách hàng</h4>
                <ul class="flink list-unstyled">
                    <li><?=Html::a('Các câu hỏi thường gặp', '#'); ?></li>
                    <li><?=Html::a('Hướng dẫn đặt hàng', '#'); ?></li>
                    <li><?=Html::a('Phương thức vẫn chuyển', '#'); ?></li>
                    <li><?=Html::a('Chính sách đổi trả', '#'); ?></li>
                </ul>
                <?=Html::img('/img/s1.png', ['class' => 'img-responsive']); ?>
            </div>
            <div class="col-lg-5">
                <?=\common\onecms\FrontPostWidget::widget(); ?>
            </div>
            <div class="col-lg-4">
                <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline, events, messages" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div></div>
            </div>
        </div>
    </div>
</footer>
<a class="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>
<div id="fb-root"></div>
<?php
$js = "
jQuery(document).ready(function() {
var offset = 220;
var duration = 500;
jQuery(window).scroll(function() {
if (jQuery(this).scrollTop() > offset) {
jQuery('.back-to-top').fadeIn(duration);
} else {
jQuery('.back-to-top').fadeOut(duration);
}
});
jQuery('.back-to-top').click(function(event) {
event.preventDefault();
jQuery('html, body').animate({
scrollTop: 0
}, duration);
return false;
})
});
(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = \"//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=1684267261791569\";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
";
$this->registerJs($js, 3);
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
