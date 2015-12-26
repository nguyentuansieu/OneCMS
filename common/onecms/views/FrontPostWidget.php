<?php
foreach($nodes as $node):
?>
<div class="media">
    <div class="media-left">
        <a href="#">
            <?=\yii\bootstrap\Html::a(\yii\helpers\Html::a(Yii::$app->imageCache->thumb($node->image, 'postFontThumb', ['class'=>'media-object'])), ['post/view', 'slug' => $node->slug]);?>
        </a>
    </div>
    <div class="media-body">
        <h5 class="media-heading"><?=\yii\bootstrap\Html::a($node->title, ['post/view', 'slug' => $node->slug]); ?></h5>
        <div class="summary"><?= \yii\helpers\BaseStringHelper::truncateWords(strip_tags($node->content), 15); ?></div>
    </div>
</div>
<?php endforeach;