<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfMedicalStudySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-medical-study-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cf_report_templates_id') ?>

    <?= $form->field($model, 'cf_indications_templates_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'days_week_planned_and_amount') ?>

    <?php // echo $form->field($model, 'planned_process_medical_consultation') ?>

    <?php // echo $form->field($model, 'administer_doses_zone') ?>

    <?php // echo $form->field($model, 'price') ?>

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
