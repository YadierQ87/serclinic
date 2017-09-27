<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfIndicationsTemplates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-indications-templates-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-6"> <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?></div>

<div class="col-lg-6">   <?= $form->field($model, 'template_indication')->textarea(['rows' => 6]) ?></div>

    <div class="col-lg-6">   <?= $form->field($model, 'status')->textInput() ?></div>

<div class="col-lg-6">  <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?></div>

    <div class="col-lg-6">  <?= $form->field($model, 'datetime_r')->textInput() ?></div>

<div class="col-lg-6">  <?= $form->field($model, 'username')->textInput(['value'=>Yii::$app->user->identity->username]) ?></div>

    <div class="col-lg-6">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
