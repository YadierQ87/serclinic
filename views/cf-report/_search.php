<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfReportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-report-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cf_medical_consultation_id') ?>

    <?= $form->field($model, 'specialist') ?>

    <?= $form->field($model, 'images_selected') ?>

    <?= $form->field($model, 'pre_document') ?>

    <?php // echo $form->field($model, 'document') ?>

    <?php // echo $form->field($model, 'post_document') ?>

    <?php // echo $form->field($model, 'observation') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'datetime_w') ?>

    <?php // echo $form->field($model, 'datetime_r') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'causes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
