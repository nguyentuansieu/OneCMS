<?php

use yii\helpers\Html;
?>
<div class="owl-carousel">
    <?php foreach($nodes as $node): ?>
        <?=HTML::a(HTML::img($node->image, ['class'=>'img-responsive']), $node->link); ?>
    <?php endforeach; ?>
</div>

<?php
$js = '
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            center: true,
            autoPlay: true,
            dots: true,
            transitionStyle : "fade",
            singleItem: true,
            itemsScaleUp : true,
        });
    });
';
$this->registerJs($js, 3);
?>