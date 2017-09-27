<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CfAcquireImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-acquire-image-form container-fluid">

    <?php $form = ActiveForm::begin([
        "method" => "post",
        "enableClientValidation" => true,
        "options" => ["enctype" => "multipart/form-data"],
    ]); ?>
    <div class="col-lg-6"> <?= $form->field($model, 'cf_medical_consultation_id')
            ->dropDownList(ArrayHelper::map(app\models\CfMedicalConsultation::find()->all(), 'id', 'id'),[]); ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'cf_equipment_id')->dropDownList(ArrayHelper::map(app\models\CfEquipment::find()->all(), 'id', 'name'),[]); ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'specialist')
            ->dropDownList(ArrayHelper::map(app\models\CfWorker::find()->all(), 'id', 'nombreCompleto'),[]); ?></div>

    </br/>
    <div class="col-lg-12">
        <label class="ace-file-input ace-file-multiple">
            <input multiple="multiple" id="id-input-file-3" type="file" class="file-change" onchange="showimagepreview(this)">
            <span class="ace-file-container" data-title="Drop files here or click to choose">
                <span class="ace-file-name" data-title="No File ..."><i class="ace-icon blue ace-icon fa fa-cloud-upload"></i></span>
            </span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a>

            <div class="ace-file-container hide-placeholder selected" id="ace-file-container">
               Pictures
            </div>
        </label>
    </div>
    <br/>

    <div class="col-lg-6"><?= $form->field($model, 'tasa_conteo')->textInput(['rows' => 6]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'fecha_hora_inyeccion')->textInput(['class'=>'my-date form-control']) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'fecha_hora_adquisicion')->textInput(['class'=>'my-date form-control']) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'causes')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'status')->textInput(['rows' => 6]) ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'username')->textInput(['value'=>Yii::$app->user->identity->username]) ?></div>
    <div class="form-group col-lg-6" >
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<!-- page specific plugin scripts -->
<script>

    function showimagepreview(input) {
        if (input.files && input.files[0]) {
            var arreglo = eval(input.files);
            for(var i = 0; i < arreglo.length ; i++) {
                var reader = new FileReader();
                var newfile = input.files[i];
                reader.onload = function (e) {
                    var contents = e.target.result;
                    var myhtml = "<div> <span class='ace-file-name'>" + newfile.name + "</span>"
                        + "<i>type: " + newfile.type + "</i>"
                        +"<i> size: " + newfile.size + " bytes </i>"
                        +"<img src='" + contents + "' height='60px' width='60px'/>"
                        +"</div>";
                    $("#ace-file-container").append(myhtml);
                }
                reader.readAsDataURL(input.files[i]);
            }   //endfor
        }//endif input vacio
    }
    $("#file").click(function(){

    });
</script>
<?php
$this->registerJs("
          $(document).ready(function() {
        $('.my-date').datetimepicker({
        format: 'yyyy/mm/dd',
        weekStart: 2,        todayBtn:  1,
		autoclose: 1,		todayHighlight: 1,
		startView: 2, minView: 2,
        });
    });
    ");  ?>
