<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfReportTemplatesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-report-templates-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'template_pre_document') ?>

    <?= $form->field($model, 'template_document') ?>

    <?= $form->field($model, 'template_post_document') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'observation') ?>

    <?php // echo $form->field($model, 'datetime_r') ?>

    <?php // echo $form->field($model, 'username') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
