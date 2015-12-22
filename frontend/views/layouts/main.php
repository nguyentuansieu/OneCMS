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
    echo '<div class="navbar-form onecms-hotline navbar-right">
            <button class="btn btn-danger">0943 668 716</button>
          </div>
        ';
    $menuItems = [
        ['label' => 'Trang chủ', 'url' => ['/site/index']],
        ['label' => 'Giới thiệu', 'url' => ['/site/about']],
        ['label' => 'Sản phẩm', 'url' => ['/product/index']],
        ['label' => 'Blogs', 'url' => ['/blog/index']],
        ['label' => 'Liên hệ', 'url' => ['/site/contact']],
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
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<a class="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>

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
";
$this->registerJs($js, 3);
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
