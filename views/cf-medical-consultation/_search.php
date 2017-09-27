<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfMedicalConsultationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-medical-consultation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cf_medical_study_id') ?>

    <?= $form->field($model, 'cf_patient_id') ?>

    <?= $form->field($model, 'date_turn') ?>

    <?= $form->field($model, 'hour_turn') ?>

    <?php // echo $form->field($model, 'off_calendar') ?>

    <?php // echo $form->field($model, 'doctor_makes_referral_id') ?>

    <?php // echo $form->field($model, 'doctor_makes_referral_name') ?>

    <?php // echo $form->field($model, 'doctor_makes_referral_email') ?>

    <?php // echo $form->field($model, 'hospital_makes_referral_name') ?>

    <?php // echo $form->field($model, 'applicant_makes_referral_data') ?>

    <?php // echo $form->field($model, 'date_remission') ?>

    <?php // echo $form->field($model, 'planning_process_medical_consultation') ?>

    <?php // echo $form->field($model, 'real_process_medical_consultation') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'indication') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'causes') ?>

    <?php // echo $form->field($model, 'is_external') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'observation') ?>

    <?php // echo $form->field($model, 'datetime_w') ?>

    <?php // echo $form->field($model, 'datetime_r') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'specialist') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
