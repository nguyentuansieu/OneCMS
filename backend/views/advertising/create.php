<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Advertising */

$this->title = Yii::t('backend', 'Create Advertising');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Advertisings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertising-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
