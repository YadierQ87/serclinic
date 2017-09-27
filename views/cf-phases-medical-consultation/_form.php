<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfPhasesMedicalConsultation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-phases-medical-consultation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cf_medical_consultation_id')->textInput() ?>

    <?= $form->field($model, 'cf_process_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cf_process_section_id')->textInput() ?>

    <?= $form->field($model, 'status')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'specialist')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'datetime_w')->textInput() ?>

    <?= $form->field($model, 'datetime_r')->textInput() ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
