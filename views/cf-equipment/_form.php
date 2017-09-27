<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\CfEquipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-equipment-form container-fluid" >

    <?php $form = ActiveForm::begin([
        "method" => "post",
        "enableClientValidation" => true,
        "options" => ["enctype" => "multipart/form-data"],
    ]); ?>

    <div class="col-lg-4">    <?= $form->field($model, 'name')->textInput(['maxlength' => 100,]) ?></div>

    <div class="col-lg-4">    <?= $form->field($model, 'stock_number')->textInput(['maxlength' => 100, ]) ?></div>

    <div class="col-lg-4"> <?= $form->field($model, 'cf_local_id')->dropDownList(ArrayHelper::map(app\models\CfLocal::find()->all(),'id','name'), ['prompt'=>'Seleccione local',]) ?></div>


    <div class="col-lg-4"> <?= $form->field($model, 'last_calibration_datetime')->textInput(['class'=>'my-date form-control']) ?></div>

    <div class="col-lg-4"> <?= $form->field($model, 'last_calibration_certified')->textInput(['maxlength' => 100, ]) ?></div>

    <div class="col-lg-4"><?= $form->field($model, 'production_datetime')->textInput(['class'=>'my-date form-control']) ?></div>



    <div class="col-lg-4"> <?= $form->field($model, 'cf_types_equipment_id')->dropDownList(ArrayHelper::map(app\models\CfTypesEquipment::find()->all(),'id','name'), ['prompt'=>'Seleccione tipo de equipo']) ?></div>

    <div class="col-lg-4">  <?= $form->field($model, 'mark')->textInput(['maxlength' => 100,]) ?></div>

    <div class="col-lg-4">  <?= $form->field($model, 'model')->textInput(['maxlength' => 100]) ?></div>

    <div class="col-lg-4">  <?= $form->field($model, 'specialist')->dropDownList(ArrayHelper::map(app\models\CfWorker::find()->all(), 'id', 'nombreCompleto'),['maxlength' => 255]); ?></div>

    <div class="col-lg-4">  <?= $form->field($model, 'status')->dropDownList(['1'=>'Apto','0'=>'No Apto']); ?></div>
    <div class="col-lg-2"><?= $form->field($model, 'can_users')->dropDownList(['0'=>'No','1'=>'Si']);  ?></div>

    <div class="col-lg-6">  <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?></div>



    <div class="hidden">  <?= $form->field($model, 'datetime_r')->textInput(['class'=>'my-date form-control','value'=>date('Y-m-d H:mm:s')]) ?></div>

    <div class=" hidden">  <?= $form->field($model, 'username')->textInput(['value'=>Yii::$app->user->identity->username]) ?></div>

    <div class="col-lg-12 " style="margin-top: 20px">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>


    <?php   $this->registerJs("
           $(document).ready(function() {
        $('.my-date').datetimepicker({
        format: 'yyyy/mm/dd',
        weekStart: 2,        todayBtn:  1,
		autoclose: 1,		todayHighlight: 1,
		startView: 2, minView: 2,
        });
    });
           (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);

           ");  ?>

