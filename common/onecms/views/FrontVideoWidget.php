<?php
use yii\helpers\Html;

?>
<div class="panel panel-success">
    <div class="panel-heading"><strong>Video nổi bật</strong></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-5">
                <?php foreach($nodes['videoHot'] as $node): ?>
                <div class="blog_inner">
                    <div class="blog-img blog-l">
                        <?=Yii::$app->imageCache->thumb($node->image, 'videoHot', ['class'=>'img-responsive']);?>
                        <div class="mask">
                            <?=Html::a('Chi tiết', ['video/view', 'slug' => $node->slug], [
                                'class' => 'info'
                            ]); ?>
                        </div>
                    </div>
                    <h2><?=Html::a($node->title, ['video/view', 'slug' => $node->slug]); ?></h2>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-7">
                <div class="related-reviews">
                    <?php foreach($nodes['videoHotChild'] as $node): ?>
                    <div class="media">
                        <div class="media-left">
                            <?=Html::a(Yii::$app->imageCache->thumb($node->image, 'videoHotChild', ['class'=>'media-object']),
                                ['video/view', 'slug' => $node->slug]);?>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">
                                <?=Html::a($node->title, ['video/view', 'slug' => $node->slug]);?>
                            </h5>
                            <?=$node->content;?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
