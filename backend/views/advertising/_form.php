<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\InputFile;
use zhuravljov\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Advertising */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advertising-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->widget(DatePicker::className(), [
        'clientOptions' => [
            'format' => 'dd-mm-yyyy',
            'language' => 'vi',
            'autoclose' => true,
            'todayHighlight' => true,
        ],
        'clientEvents' => [],
    ]) ?>

    <?= $form->field($model, 'end_date')->widget(DatePicker::className(), [
        'clientOptions' => [
            'format' => 'dd-mm-yyyy',
            'language' => 'vi',
            'autoclose' => true,
            'todayHighlight' => true,
        ],
        'clientEvents' => [],
    ]) ?>

    <?= $form->field($model, 'image')->widget(InputFile::className(), [
        'language'      => 'en',
        'controller'    => 'elfinder',
        'path' => 'image',
        'filter'        => 'image',
        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options'       => ['class' => 'form-control'],
        'buttonOptions' => ['class' => 'btn btn-success'],
        'multiple'      => false
    ]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'published')->textInput(['value' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
