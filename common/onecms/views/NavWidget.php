<?php
use yii\helpers\Html;

?>
<nav>
    <div class="container">
        <div class="row">
            <div class="nav-inner">
                <ul id="nav" class="hidden-xs">
                    <li id="nav-home" class="level0 parent drop-menu"><?=HTML::a('<span>Trang chủ</span>', '/'); ?></li>
                    <?php
                    $depth = 0;
                    foreach($categories as $key => $category):
                        if($category->depth == $depth && $key != 0):
                            echo '</li>';
                        elseif ($category->depth > $depth):
                            if($depth == 0) {
                                echo '<div class="level0-wrapper dropdown-6col"> <div class="level0-wrapper2"> <div class="nav-block nav-block-center grid13 itemgrid itemgrid-4col"><ul class="level0">';
                            } else {
                                echo '<ul class="level'.$depth.'">';
                            }
                        else:
                            for($i = $depth - $category->depth; $i; $i--):
                                if($depth == 0) {
                                    echo '</ul></li></div></div></div>';
                                } else {
                                    echo '</ul></li>';
                                }
                            endfor;
                        endif;
                        echo '<li class="level0 nav-7 level-top parent">';
                        echo Html::a('<span>'.$category->title.'</span>', ['review-category/view', 'slug' => $category->slug]);
                        $depth = $category->depth;
                    endforeach;
                    for($i = $depth; $i; $i--):
                        echo '</li></ul>';
                    endfor;
                    ?>
            </div>
        </div>
    </div>
</nav>