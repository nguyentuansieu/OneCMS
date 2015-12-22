<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CategoryProduct */

$this->title = Yii::t('backend', 'Create Category Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Category Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'treeParents' => $treeParents,
    ]) ?>

</div>
