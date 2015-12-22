<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
        'brandLabel' => 'One CMS',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Trang chủ', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Đăng nhập', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'Nội dung', 'url' => ['/post/index'], 'items' => [
            ['label' => 'Danh mục', 'url' => ['/category-post/index']],
            ['label' => 'Bài viết', 'url' => ['/post/index']],
            ['label' => 'Trang cố định', 'url' => ['/page/index']],
        ]];
        $menuItems[] = ['label' => 'Sản phẩm', 'url' => ['/product/index'], 'items' => [
            ['label' => 'Danh mục', 'url' => ['/category-product/index']],
            ['label' => 'Sản phẩm', 'url' => ['/product/index']],
        ]];
        $menuItems[] = ['label' => 'Quảng cáo', 'url' => ['/advertising/index']];
        $menuItems[] = ['label' => 'Cấu hình', 'url' => ['/setting/index']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Thoát (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
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
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; OneCMS <?= date('Y') ?></p>

        <p class="pull-right">Phát triển bởi <a href="htp://hatinh.news">One CMS</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
