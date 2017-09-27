<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\CfReception */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-reception-form container-fluid">

    <?= $this->render('/cf-medical-consultation/_details',['mcf'=>$mcf]); ?>

    <div class="widget-box container-fluid">
        <div class="widget-header">
            <h5 class="widget-title">
                <i class="fa fa-caret-square-o-right"></i>
                <u>Datos de la Recepcion:</u>
            </h5>
        </div>
    <div class="widget-body">
        <div class="widget-main">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-6 hidden" > <?= $form->field($model, 'cf_patient_id')
            ->dropDownList(ArrayHelper::map(app\models\CfPatient::find()->all(),'id','fullname'),
                ['prompt'=>'Seleccione Paciente'])  ?></div>
    <div class="col-lg-6 hidden">  <?= $form->field($model, 'cf_medical_study_id')
            ->dropDownList(ArrayHelper::map(app\models\CfMedicalStudy::find()->all(),'id','name'),
                ['prompt'=>'Seleccione estudio medico','id'=>'select-prov','data-url' => Url::to(['fecha-propuesta'])]) ?></div>
    <div class="col-lg-6 hidden">
        <label class="label label-info"> Fecha y Hora propuesta (seg&uacute;n estudio)</label>
        <div class="llenar-propuesta"><?= Html::input('text','date_proposed', '',
                ['class' => 'form-control disabled','id'=>'date_proposed','disabled'=>'diabled']); ?></div>
    </div>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'date_turn')->textInput(['class'=>'my-date2 form-control']) ?></div>
    <div class="col-lg-6 hidden">  <?= $form->field($model, 'hour_turn')->textInput(['class'=>'my-hour form-control']) ?></div>

    <div class="col-lg-6 hidden"> <label class="control-label">  <?= $form->field($model, 'off_calendar',[
                'labelOptions' => [ 'class' => 'col-lg-3 control-label ','style'=>'padding-right:10px' ]])->checkbox() ?></label> </div>
    <div class="col-lg-6 hidden"> <label class="control-label"> <?= $form->field($model, 'is_external')->checkbox() ?> </label></div>

    <div class="col-lg-6 hidden"> <?= $form->field($model, 'doctor_makes_referral_id')->textInput(['maxlength' => 50]) ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'doctor_makes_referral_name')->textInput(['maxlength' => 100]) ?></div>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'doctor_makes_referral_email')->textInput(['maxlength' => 255]) ?></div>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'hospital_makes_referral_name')->textInput(['maxlength' => 255]) ?></div>
    <div class="col-lg-6 ">  <?= $form->field($model, 'size')->textInput() ?></div>
    <div class="col-lg-6 "> <?= $form->field($model, 'weight')->textInput() ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'date_remission')->textInput(['class'=>'my-date2 form-control']) ?></div>
    <div class="col-lg-6 ">
        <?= $form->field($model, 'specialist')
            ->dropDownList(ArrayHelper::map(app\models\CfWorker::find()->all(), 'id', 'nombreCompleto'),[]); ?>
    </div>

    <div class="col-lg-6 hidden"> <?= $form->field($model, 'price')->textInput(['rows' => 6,'value'=>$mcf->cfMedicalStudy->price." ".$mcf->cfMedicalStudy->tipo_moneda]) ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'status')->textInput(['maxlength' => 255,'value'=>'Recepcionado']) ?></div>
    <div class="col-lg-6 hidden">  <?= $form->field($model, 'age')->textInput(['value'=>html_entity_decode($mcf->cfPatient->edad)]) ?></div>
    <div class="col-lg-6"> <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'datetime_w')->textInput(['value'=>date('Y-m-d')]) ?></div>
    <div class="col-lg-6 hidden">   <?= $form->field($model, 'datetime_r')->textInput(['value'=>date('Y-m-d')]) ?></div>
    <div class="col-lg-6 hidden">  <?= $form->field($model, 'username')->textInput(['value'=>Yii::$app->user->identity->username]) ?></div>

    <div class="col-lg-6">
        <?= Html::submitButton( 'Recepcionar', ['class' => 'btn btn-primary']) ?>
    </div>
</br>
    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php   $this->registerJs("
           $(document).ready(function() {
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

    $('#select-prov').change(function() {
        var id_estudio = $(this).val();
        $.get( $(this).data('url'),{id_estudio:id_estudio},
            function (data) {
                $('.llenar-propuesta').html(data);
            });
    });

    (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
  ");  ?>