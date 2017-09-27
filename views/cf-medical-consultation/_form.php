<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use vova07\select2\Widget;


/* @var $this yii\web\View */
/* @var $model app\models\CfMedicalConsultation */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="cf-medical-consultation-form container-fluid">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-8 ">
        <div
            id="causeP"><?= $form->field($model, 'cf_patient_id')->widget(Widget::className(), ['items' => ArrayHelper::map(app\models\CfPatient::find()->all(), 'id', 'fullname'),
                'options' => ['prompt' => 'Seleccione Paciente', 'data-url' => Url::to(['patient'])], 'id' => 'select-pat',
                'events' => [
                    "change" => 'function(data) {
                    var idPatient = $(this).val();
                $.get(  $(this).data("url"),{idPatient:idPatient},
            function (data) {
                 $("#detail").html(data);
                console.log(data);
            });
            }',]])
            ?></div>

        <div class="hidden" id="causesDiv" style="margin-bottom: 15px">
            <input type="hidden" id="hidePatient" name="hidePatient" value="">
            <label class="control-label"> Seleccionar Paciente </label>
            <?= Widget::widget([
                'model' => $model,
                'name' => 'paciente',

                'items' => ArrayHelper::map(app\models\CfPatient::find()->all(), 'id', 'personal_id'),
                'options' => ['prompt' => 'Seleccione Paciente', 'data-url' => Url::to(['patient'])],
                'events' => [
                    "change" => 'function(data) {
                var data_id = data.added["id"];
                document.getElementById("hidePatient").value = data_id;
            $.get(  $(this).data("url"),{idPatient:data_id},
            function (data) {
                 $("#detail").html(data);
                console.log(data);
            });
            }',
                ],

            ]); ?>
        </div>


    </div>
    <div class="col-lg-4" style="margin-top: 30px"><label class="middle">
            <input type="checkbox" class="ace" name="causesBy" id="causesBy" onchange="addCausas();">
            <span class="lbl"> Buscar paciente por CI </span>
        </label>
    </div>
    <div class="col-lg-6" style="margin-bottom: -25px">
        <label  class="control-label"> <?= $form->field($model, 'is_external')->checkbox(['class'=>'es_externo',]) ?> </label>
    </div>

    <div class="col-lg-6 hidden status_study"  id="status_study">
        <?=  $form->field($model, 'estado_externo')->dropDownList(['Preparado'=>'Preparado','Administrado'=>'Administrado','Adquirido'=>'Adquirido',
             'Procesado'=>'Procesado','Reportado'=>'Reportado']) ?>

    </div>
    <div class="col-lg-6 hidden status_study " id="size">  <?= $form->field($model, 'size')->textInput() ?></div>
    <div class="col-lg-6 hidden status_study" id="weight"> <?= $form->field($model, 'weight')->textInput() ?></div>


    <div class="col-lg-12" id="detail" style="margin-bottom: 25px; "></div>

    <div class="col-lg-6">  <?= $form->field($model, 'cf_medical_study_id')->dropDownList(ArrayHelper::map(app\models\CfMedicalStudy::find()->all(), 'id', 'name'),
            ['prompt' => 'Seleccione estudio medico', 'data-url' => Url::to(['fecha-propuesta'])]) ?></div>
    <div class="col-lg-6">
        <label class="label label-info"> Fecha y Hora propuesta (seg&uacute;n estudio)</label>

        <div class="llenar-propuesta"><?= Html::dropDownList('text', '', [],
                ['class' => 'form-control select', 'id' => 'date_proposed']); ?></div>
        <input type="hidden" id="hideFecha" name="hideFecha" value="">
    </div>

    <div class="col-lg-6" style="margin-bottom: -10px"><?= $form->field($model, 'off_calendar')->checkbox(['id' => "calendario"]) ?> </div>


    <div class="hidden fecha col-lg-6"><?= $form->field($model, 'date_turn')->textInput(['class' => 'my-date2 form-control']) ?></div>
    <div class="hidden fecha col-lg-6">  <?= $form->field($model, 'hour_turn')->textInput(['class' => 'my-hour form-control']) ?></div>

    <hr>

    <div class="col-lg-6 hidden"> <?= $form->field($model, 'doctor_makes_referral_id')->textInput(['maxlength' => 50]) ?></div>
    <div class="col-lg-6">
        <?= $form->field($model, 'doctor_makes_referral_name')->dropDownList(ArrayHelper::map(app\models\CfNombreMedicos::find()->all(), 'nombre', 'nombre'),
            ['prompt' => 'Seleccione Doctor']) ?>
    </div>
    <div
        class="col-lg-6"><?= $form->field($model, 'doctor_makes_referral_email')->textInput(['maxlength' => 255]) ?></div>
    <div class="col-lg-6">
        <?= $form->field($model, 'hospital_makes_referral_name')->dropDownList(ArrayHelper::map(app\models\CfNombreHospitales::find()->all(), 'nombre', 'nombre'),
            ['prompt' => 'Seleccione Hospital']) ?>
    </div>

    <div
        class="col-lg-6"> <?= $form->field($model, 'date_remission')->textInput(['class' => 'my-date2 form-control']) ?></div>
    <div class="col-lg-6">
        <?= $form->field($model, 'specialist')
            ->dropDownList(ArrayHelper::map(app\models\CfWorker::find()->all(), 'id', 'nombreCompleto'), ['prompt' => 'Seleccione Especialista']); ?>
    </div>

    <div class="col-lg-6"> <?= $form->field($model, 'indication')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'price')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6"> <?= $form->field($model, 'causes')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6 hidden">  <?= $form->field($model, 'age')->textInput() ?></div>
    <div class="col-lg-6"> <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'datetime_w')->textInput() ?></div>
    <div
        class="col-lg-6 hidden">   <?= $form->field($model, 'datetime_r')->textInput(['value' => date('Y-m-d')]) ?></div>
    <div
        class="col-lg-6 hidden">  <?= $form->field($model, 'username')->textInput(['value' => Yii::$app->user->identity->username]) ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'bajopeso')->textInput() ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'sobrepeso')->textInput() ?></div>


    <div class="col-lg-12">
        <?= Html::submitButton($model->isNewRecord ? 'Crear Turno' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$a = 5;
$this->registerJs("

$('.es_externo').change(function(){
   var c = this.checked ? $('.status_study').removeClass('hidden') : $('.status_study').addClass('hidden');
});

 $('#calendario').change(function(){
    var c = this.checked ? $('.fecha').removeClass('hidden') : $('.fecha').addClass('hidden');
 });

function addCausas(){
        if($('input:checked').length == 1){
           $('#causesDiv').removeClass('hidden');
           $('#causeP').addClass('hidden');
        }
        else{
    $('#causesDiv').addClass('hidden');
    $('#causeP').removeClass('hidden');
    document.getElementById('hidePatient').value =null;
}
    }

           $(document).ready(function() {
$.fn.modal.Constructor.prototype.enforceFocus = function() {};
        $('.my-hour').datetimepicker({
        format: 'H:i:s',
        weekStart: 2,        todayBtn:  1,
		autoclose: 1,		todayHighlight: 1,
		startView: 1
        });

        $('.my-date2').datetimepicker({
        format: 'yyyy/mm/dd',
        weekStart: 2,        todayBtn:  1,
		autoclose: 1,		todayHighlight: 1,
		startView: 2, minView:2,
        });
    });

    (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
  "); ?>

<script>
    $('#cfmedicalconsultation-cf_medical_study_id').change(function () {

        var id_estudio = $(this).val();
        $.get($(this).data('url'), {id_estudio: id_estudio},
            function (data) {
                var datos = data;
                $('.select option').each(function () {
                    $(this).remove();
                });
                for (var i = 0; i < datos.length; i++) {
                    var fecha = 'Turnos disponibles: (' + datos[i][0] + ') Dia: (' + datos[i][1] + ') Hora: (' + datos[i][2] + ')';
                    $('#date_proposed').append('<option value=' + datos[i] + '> ' + fecha + '</option>');

                }
                $("#hideFecha").val(datos[0]); 

            });
    });

    $(".select").change(function () {
        var value = this.value;
        $("#hideFecha").val(value);
    })

</script>