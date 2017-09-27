<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CfTypesRadiopharmaceutical */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-types-radiopharmaceutical-form container-fluid row">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-6">
        <?= $form->field($model, 'name')->dropDownList(ArrayHelper::map(app\models\CfNombreLiofilizado::find()->all(), 'nombre', 'nombre')); ?>
    </div>
    <div class="col-lg-6"><?= $form->field($model, 'batch')->textInput(['maxlength' => 100]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'internal_code')->textInput(['maxlength' => 100]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'production_company')->textInput(['maxlength' => 100,'value'=>'CENTIS']) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'production_datetime')->textInput(['class'=>'my-date form-control']) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'expiration_datetime')->textInput(['class'=>'my-date form-control']) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'reception_datetime')->textInput(['class'=>'my-date form-control']) ?></div>
    <div class="col-lg-6"> <?= $form->field($model, 'count')->textInput() ?></div>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'used_count')->textInput(['value'=>'0']) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'status')->dropDownList([1=>'Apto',0=>'No Apto']) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'datetime_r')->textInput(['class'=>'my-date form-control','value'=>date('Y-m-d')]) ?></div>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'username')->textInput(['value'=>Yii::$app->user->identity->username]) ?></div>
   <div class="col-lg-12">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php   $this->registerJs("
   $(document).ready(function() {
        $('.my-date').datetimepicker({
        format: 'yyyy/mm/dd hh:ii',
        weekStart: 1,        todayBtn:  1,
		autoclose: 1,		todayHighlight: 1,		startView: 2,
         });
    });
    (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
    $('#cftypesradiopharmaceutical-used_count').validaCampo('0123456789,');
    ");  ?>

</div>
