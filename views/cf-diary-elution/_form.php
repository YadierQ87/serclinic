<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CfDiaryElution */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-diary-elution-form container-fluid">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-6">
        <?php date_default_timezone_set('Canada/Central'); ?>
    <?= $form->field($model, 'elution_datetime')->textInput(['class'=>'my-date form-control','value'=>date('Y-m-d h:i:s')]) ?></div>
    <div class="col-lg-6">
    <?= $form->field($model, 'codigo_generator')->dropDownList(ArrayHelper::map(app\models\CfGenerator::find()->where(['status'=>'1'])->all(),'id','number'),
        ['prompt'=>'Seleccione Generador']) ?></div>
    <div class="col-lg-6">
    <?= $form->field($model, 'activity_elution')->textInput() ?></div>
    <div class="col-lg-6">
    <?= $form->field($model, 'volumen_elution')->textInput() ?></div>
    <div class="col-lg-6">
    <?= $form->field($model, 'activity99Mo')->textInput() ?></div>


    <!-- div para control de la calidad --!-->
    <div class="col-lg-12">
        <div class="col-lg-12">
            <label class="middle">
                <input type="checkbox" class="ace" name="causesBy" id="causesBy" onchange="addCausas();" >
                <span class="lbl"> Control de Calidad </span>
            </label>
         </div>
    <div class="hidden" id="causesDiv">
        <div class="col-lg-4">
            <?= $form->field($model, 'percent_radiocoloides')->textInput() ?></div>
        <div class="col-lg-4">
            <?= $form->field($model, 'aluminio')->textInput() ?></div>
        <div class="col-lg-4">
            <?= $form->field($model, 'ph')->textInput() ?></div>
        <div class="col-lg-4">
            <?= $form->field($model, 'aspecto_organoleptico')->textInput(['maxlength' => 200]) ?></div>
    </div>
        <script type="text/javascript">
            function addCausas(){
                if($("input:checked").length == 1){
                    $("#causesDiv").removeClass("hidden");
                }
                else{
                    $("#causesDiv").addClass("hidden");
                }
            }
        </script>
    </div>
    <!-- endiv para la calidad --!-->



    <div class="col-lg-12">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary pull-right' : 'btn btn-primary pull-right']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<?php   $this->registerJs("
           $(document).ready(function() {
        $('.my-date').datetimepicker({
        format: 'yyyy/mm/dd H:m:s',
        weekStart: 2,        todayBtn:  1,
		autoclose: 1,		todayHighlight: 1,
		startView: 2,
        });
    });
    (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
     ");  ?>