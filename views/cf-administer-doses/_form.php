<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CfAdministerDoses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-administer-doses-form container-fluid">
    <?= $this->render('/cf-medical-consultation/_details',['mcf'=>$mcf]); ?>

 <div class="widget-box container-fluid">
    <div class="widget-header">
        <h5 class="widget-title">     <i class="fa fa-caret-square-o-right"></i>     Administrar Dosis    </h5>
    </div>
     <div class="widget-body">
         <div class="widget-main">
    <?php $form = ActiveForm::begin(); ?>
             <div class="col-lg-4">
                 <?= $form->field($model, 'specialist')->dropDownList(ArrayHelper::map(app\models\CfWorker::find()->all(), 'nombreCompleto', 'nombreCompleto'),
                     ['id'=>'select-prov','prompt'=>'-Seleccione Especialista-']) ?>
             </div>
             <div class="col-lg-4"><?= $form->field($model, 'datetime_w')->textInput(['class'=>'my-date form-control','value'=>date("Y-m-d H:i:s")]) ?></div>
             <div class="col-lg-4">
                 <?= $form->field($model, 'zone')->dropDownList(ArrayHelper::map(app\models\CfCodZonas::find()->all(), 'nombre_lugar', 'nombre_lugar'),
                     ['id'=>'select-prov','prompt'=>'-Seleccione Zona-']) ?>
             </div>
             <div class="col-lg-4">
                 <label class="text text-info">Dosis Cargada en Jeringuilla</label></br>
                 <label class="label label-info"><?= $mcf->cfPrepareDoses->load_doses ?> (mL)</label>
             </div>
             <div class="col-lg-4">
                 <label class="text text-info">Dosis Preparada (tiempo)</label></br>
                 <label class="label label-info"><?= $mcf->cfPrepareDoses->load_doses ?> (mL)</label>
             </div>
             <div class="col-lg-4">
                 <?= $form->field($model, 'remanente')->textInput([]) ?>
             </div>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'cf_medical_consultation_id')->textInput(['value'=>$mcf->id]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'username')->textInput(['value'=>Yii::$app->user->identity->username]) ?></div>
             <?php date_default_timezone_set("Canada/Central") ?>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'datetime_r')->textInput(['class'=>'my-date form-control','value'=>date("Y-m-d H:i:s")]) ?></div>
             <div class="col-lg-6" >
                 <label class="middle">
                     <input type="checkbox" class="ace" name="causesBy" id="causesBy" onchange="addCausas();" >
                     <span class="lbl"> Rechazar Dosis </span>
                 </label>
                 <div class="hidden" id="causesDiv"><?= $form->field($model, 'causes')->textarea(['rows' => 6]) ?></div>
                 <div class="col-lg-6 hidden"><?= $form->field($model, 'status')->textInput(['value'=>'1']) ?></div>
                 <script type="text/javascript">
                     function addCausas(){
                         if($("input:checked").length == 1){
                             $("#causesDiv").removeClass("hidden");
                             $("#cfadministerdoses-status").val('0');
                         }
                         else{
                             $("#causesDiv").addClass("hidden");
                             $("#cfadministerdoses-status").val('1');
                         }
                     }
                 </script>
             </div>
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
           (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
    $('#cfpatient-number').validaCampo('0123456789');
           ");  ?>
