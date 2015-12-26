<?php
/* @var $this yii\web\View */
$this->title = $category_title;
?>
<div class="container wrapper">
    <h1><?=$category_title; ?></h1>
    <div class="row">
        <?php $i = 0; foreach($nodes as $node): ?>
            <?php if($i!=0 && $i%2==0):?>
                </div><div class="row">
            <?php endif; ?>
            <div class="col-lg-6">
                <div class="thumbnail">
                    <?=\yii\bootstrap\Html::a(\yii\helpers\Html::a(Yii::$app->imageCache->thumb($node->image, 'post', ['class'=>'img-responsive'])), ['post/view', 'slug' => $node->slug]);?>
                </div>
                <h2><?=\yii\bootstrap\Html::a($node->title, ['post/view', 'slug' => $node->slug]); ?></h2>
                <div class="summary"><?= \yii\helpers\BaseStringHelper::truncateWords(strip_tags($node->content), 50); ?></div>
            </div>
        <?php $i++; endforeach; ?>
            </div>
        <div class="pagi">
            <?php echo \yii\widgets\LinkPager::widget([
                'pagination' => $pagination,
                'options' => ['class' => 'pagination small']
            ]); ?>
        </div>
    </div>
</div>