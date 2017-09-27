
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
?>

<div class="cf-reception-form container-fluid">
    <?php $form = ActiveForm::begin(); ?>


    <div class="col-lg-6 hidden"> <?= $form->field($model, 'cf_patient_id')
            ->dropDownList(ArrayHelper::map(app\models\CfPatient::find()->all(),'id','fullname'),
                ['prompt'=>'Seleccione Paciente'])  ?></div>
    <div class="col-lg-6 hidden">  <?= $form->field($model, 'cf_medical_study_id')
            ->dropDownList(ArrayHelper::map(app\models\CfMedicalStudy::find()->all(),'id','name'),
                ['prompt'=>'Seleccione estudio medico','id'=>'select-prov','data-url' => Url::to(['fecha-propuesta'])]) ?></div>

    <div class="col-lg-6 hidden"> <label class="control-label"> <?= $form->field($model, 'is_external')->checkbox() ?> </label></div>

    <div class="col-lg-6 hidden"> <?= $form->field($model, 'doctor_makes_referral_id')->textInput(['maxlength' => 50]) ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'doctor_makes_referral_name')->textInput(['maxlength' => 100]) ?></div>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'doctor_makes_referral_email')->textInput(['maxlength' => 255]) ?></div>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'hospital_makes_referral_name')->textInput(['maxlength' => 255]) ?></div>
    <div class="col-lg-6 hidden">  <?= $form->field($model, 'size')->textInput() ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'weight')->textInput() ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'date_remission')->textInput(['class'=>'my-date2 form-control']) ?></div>
    <div class="col-lg-6 hidden">
        <?= $form->field($model, 'specialist')
            ->dropDownList(ArrayHelper::map(app\models\CfWorker::find()->all(), 'id', 'nombreCompleto'),[]); ?>
    </div>

    <div class="col-lg-6 hidden"> <?= $form->field($model, 'indication')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'price')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'status')->textInput(['maxlength' => 255,'value'=>'Pospuesto']) ?></div>
    <div class="col-lg-6 hidden "> <?= $form->field($model, 'causes')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6 hidden">  <?= $form->field($model, 'age')->textInput() ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'datetime_w')->textInput() ?></div>
    <div class="col-lg-6 hidden">   <?= $form->field($model, 'datetime_r')->textInput(['value'=>date('Y-m-d')]) ?></div>
    <div class="col-lg-6 hidden">  <?= $form->field($model, 'username')->textInput(['value'=>Yii::$app->user->identity->username]) ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'bajopeso')->textInput() ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'sobrepeso')->textInput() ?></div>

    <div class="col-lg-12 " style="margin-bottom: 10px">
    <label class="label label-info"> Fecha y Hora propuesta (seg&uacute;n estudio)</label>
    <?=$fecha?></div>


    <div class="col-lg-12"><?= $form->field($model, 'date_turn')->textInput(['class'=>'my-date2 form-control']) ?></div>
<div class="col-lg-12">  <?= $form->field($model, 'hour_turn')->textInput(['class'=>'my-hour form-control']) ?></div>
    <div class="col-lg-6"> <label class="control-label">  <?= $form->field($model, 'off_calendar',[
                'labelOptions' => [ 'class' => 'col-lg-3 control-label ','style'=>'padding-right:10px' ]])->checkbox() ?></label> </div>

    <div class="col-lg-12">
        <?= Html::submitButton('Actualizar', ['class' =>  'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>


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


  ");  ?>