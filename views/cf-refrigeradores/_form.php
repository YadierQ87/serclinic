<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfRefrigeradores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-refrigeradores-form container-fluid">

    <?php $form = ActiveForm::begin([
        "method" => "post",
        "enableClientValidation" => true,
        "options" => ["enctype" => "multipart/form-data"],
    ]); ?>

    <div class="col-lg-6"><?= $form->field($model, 'Temperatura_refrigerador')->textInput(['maxlength' => 200]) ?></div>

    <div class="col-lg-6"> <?= $form->field($model, 'fecha_refrigerador')->textInput(['class'=>'my-date form-control','value'=>date('Y-m-d')]) ?></div>

    <div class="col-lg-6"><?= $form->field($model, 'temperatura_congelador')->textInput(['maxlength' => 200]) ?></div>

    <div class="col-lg-6"> <?= $form->field($model, 'fecha_congelador')->textInput(['class'=>'my-date form-control','value'=>date('Y-m-d')]) ?></div>

    <div class="col-lg-6"><?= $form->field($model, 'temperatura_freezer')->textInput(['maxlength' => 200]) ?></div>

    <div class="col-lg-6"><?= $form->field($model, 'fecha_freezer')->textInput(['class'=>'my-date form-control','value'=>date('Y-m-d')]) ?></div>

    <div class="form-group col-lg-12">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php
    date_default_timezone_set('Canada/Central');
    $maxdate = date('Y-m-d');
    $this->registerJs("
           $(document).ready(function() {
        $('.my-date').datetimepicker({
        format: 'yyyy/mm/dd',
        weekStart: 2,        todayBtn:  1,
		autoclose: 1,		todayHighlight: 1,
		startView: 2, minView: 2,
        });
    });
           (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
$('#cfrefrigeradores-temperatura_freezer').validaCampo('0123456789');
$('#cfrefrigeradores-temperatura_congelador').validaCampo('0123456789');
$('#cfrefrigeradores-temperatura_refrigerador').validaCampo('0123456789');
           ");  ?>


</div>
