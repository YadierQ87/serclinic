<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CfAcquireImage */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="cf-acquire-image-form container-fluid">
    <?= $this->render('/cf-medical-consultation/_details',['mcf'=>$mcf]); ?>
  <div class="widget-box container-fluid">
    <div class="widget-header">
        <h5 class="widget-title">     <i class="fa fa-caret-square-o-right"></i> Adquirir Imagen del Estudio </h5>
    </div>
    <div class="widget-body">
        <div class="widget-main">
    <?php $form = ActiveForm::begin([
        "method" => "post",
        "enableClientValidation" => true,
        "options" => ["enctype" => "multipart/form-data"],
    ]); ?>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'cf_medical_consultation_id')->textInput(['value' => $mcf->id ]); ?></div>
    <div class="col-lg-4"><?= $form->field($model, 'cf_equipment_id')->dropDownList(ArrayHelper::map(app\models\CfEquipment::find()->all(), 'id', 'name'),
            ['prompt'=>'Select Equipo']); ?></div>
    <div class="col-lg-4"><?= $form->field($model, 'specialist')
            ->dropDownList(ArrayHelper::map(app\models\CfWorker::find()->all(), 'id', 'nombreCompleto'),['prompt'=>'Select Especialista']); ?></div>
    <div class="col-lg-4"><?= $form->field($model, 'tasa_conteo')->textInput(['rows' => 6]) ?></div>
    <div class="col-lg-4"> Fecha_hora_inyeccion </br>
        <label class="label label-info"> <?= $mcf->cfUniqueAdministerDoses->datetime_w ?></label>
    </div>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'fecha_hora_inyeccion')->textInput(['class'=>'my-date form-control' ,'value'=>$mcf->cfUniqueAdministerDoses->datetime_w]) ?></div>
    <div class="col-lg-4"><?= $form->field($model, 'fecha_hora_adquisicion')->textInput(['class'=>'my-date form-control']) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?></div>

            <div class="col-lg-6" >
                <label class="middle">
                    <input type="checkbox" class="ace" name="causesBy" id="causesBy" onchange="addCausas();" >
                    <span class="lbl"> Rechazar Adquirido </span>
                </label>
                <div class="hidden" id="causesDiv"><?= $form->field($model, 'causes')->textarea(['rows' => 6]) ?></div>
                <div class="col-lg-6 hidden"><?= $form->field($model, 'status')->textInput(['value'=>'1']) ?></div>
                <script type="text/javascript">
                    function addCausas(){
                        if($("input:checked").length == 1){
                            $("#causesDiv").removeClass("hidden");
                            $("#cfadquireimage-status").val('0');
                        }
                        else{
                            $("#causesDiv").addClass("hidden");
                            $("#cfadquireimage-status").val('1');
                        }
                    }
                </script>
            </div>

    <div class="col-lg-6 hidden"> <?= $form->field($model, 'username')->textInput(['value'=>Yii::$app->user->identity->username]) ?></div>
    <div class="form-group col-lg-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
            </div>
        </div>
      </div>
</div>
<?php   $this->registerJs("
           $(document).ready(function() {
        $('.my-date').datetimepicker({
        format: 'yyyy/mm/dd hh:ii:ss',
        weekStart: 2,        todayBtn:  1,
		autoclose: 1,		todayHighlight: 1,
		startView: 2,
        });
    });
           ");  ?>
