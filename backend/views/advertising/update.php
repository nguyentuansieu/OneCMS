<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Advertising */

$this->title = Yii::t('backend', 'Update Advertising');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Advertisings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="advertising-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
