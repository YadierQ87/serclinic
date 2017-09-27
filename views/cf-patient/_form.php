<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\CfPatient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-patient-form container-fluid">


    <?php $form = ActiveForm::begin([
        "method" => "post",
        "enableClientValidation" => true,
        "options" => ["enctype" => "multipart/form-data"],
    ]); ?>


<div class="col-lg-4"><?= $form->field($model, 'firstname')->textInput(['maxlength' => 100,'required'=>'required']) ?></div>
<div class="col-lg-4"> <?= $form->field($model, 'lastname')->textInput(['maxlength' => 100,'required'=>'required']) ?></div>
    <div class="col-lg-4"><?= $form->field($model, 'personal_id')->textInput(['maxlength' => 11,'required'=>'required']) ?></div>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'up_date')->textInput(['class'=>'my-date form-control','value'=>date('Y-m-d H:mm:s')]) ?></div>
    <div class="col-lg-4"><?= $form->field($model, 'date_birth')->textInput(['class'=>'my-date form-control']) ?></div>

    <div class="col-lg-4"><?= $form->field($model, 'medical_record_id')->textInput(['required'=>'required']) ?></div>
    <div class="col-lg-4"><?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?></div>
    <div class="col-lg-4"><?= $form->field($model, 'notification_email')->checkbox(
            ['labelOptions' => [ 'class' => 'col-lg-10 control-label ','style'=>'padding-right:10px']]) ?></div>

    <div class="col-lg-8" style="margin-bottom: 20px; ">
    <label class="control-label">Foto Paciente <input type="file" id="fichero_jpg" name="fichero_jpg"></label>
    </div>

<div class="col-lg-6"><?= $form->field($model, 'medical_record')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6">    <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?></div>

    <div class="col-lg-4"><?= $form->field($model, 'telephone')->textInput(['maxlength' => 100]) ?></div>
    <div class="col-lg-4"><?= $form->field($model, 'sex')->dropDownList(['F'=>'F','M'=>'M'],['required'=>'required']) ?></div>

    <div class="col-lg-4">    <?= $form->field($model, 'nationality')->dropDownList(['CUB'=>'CUB']) ?></div>
    <div class="col-lg-4">
        <?= $form->field($model, 'town')->dropDownList(ArrayHelper::map(app\models\CfProvincias::find()->all(), 'id', 'nombre'),
            ['id'=>'select-prov','prompt'=>'-Provincia-','data-url' => Url::to(['selection'])]) ?>
    </div>
    <div class="col-lg-4 my-newselect">
        <label class="control-label"> Municipios <select class="form-control" style="margin-top:5px "><option>Seleccione Provincia Primero</option></select></label>
    </div>

<div class="col-lg-6 hidden"> <?= $form->field($model, 'status')->textInput(['value'=>1,]) ?></div>

<div class="col-lg-6 hidden">    <?= $form->field($model, 'up_date')->textInput(['class'=>'my-date form-control','value'=>date('Y-m-d H:m:s')]) ?></div>
<div class="col-lg-6 hidden">    <?= $form->field($model, 'username')->textInput(['maxlength' => 255,'value'=>Yii::$app->user->identity->username]) ?></div>



    <div class="col-lg-12">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
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
    $('#cfpatient-telephone').validaCampo('0123456789');
    $('#cfpatient-personal_id').validaCampo('0123456789');
           ");  ?>
<script>
    $('#select-prov').change(function() {
        var idprov = $(this).val();
        $.get( $(this).data('url'),{idprov:idprov},
            function (data) {
                $('.my-newselect').html("<label class='control-label'>Municipios</label>"+data);
            });
    });
</script>

