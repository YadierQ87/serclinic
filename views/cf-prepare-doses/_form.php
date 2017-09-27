<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CfPrepareDoses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-prepare-doses-form container-fluid">

    <?= $this->render('/cf-medical-consultation/_details',['mcf'=>$mcf]); ?>
    <div class="widget-box container-fluid">
          <div class="widget-header">
            <h5 class="widget-title"><i class="fa fa-caret-square-o-right"></i> Preparar Dosis</h5>
          </div>
       <div class="widget-body">
         <div class="widget-main">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-4 hidden"> <?= $form->field($model, 'cf_medical_consultation_id')->textInput(['value'=>$mcf->id]);?></div>
    <div class="col-lg-4">
        <?php
        $lista_radio = $mcf->cfMedicalStudy->cftypesradiopharmaceuticals;
        $mylista = array();
        $i =0;
        foreach($lista_radio as $keylist){
            $mylista[$i]['id'] = $keylist->cfNombreRadiofarmaco->id;
            $mylista[$i]['nombre'] = $keylist->cfNombreRadiofarmaco->nombre;
            $i++;
        }
        //var_dump(ArrayHelper::map($mylista,'id', 'nombre'));
        ?>
        <?= $form->field($model, 'cf_radiopharmaceutical_id')->dropDownList(ArrayHelper::map($mylista,'id', 'nombre'),['prompt'=>'Select Radiofarmaco']); ?>
    </div>
    <div class="col-lg-4">
        <?= $form->field($model, 'cf_generator_id')->dropDownList(ArrayHelper::map(app\models\CfGenerator::find()->all(), 'id', 'name','batch'),['prompt'=>'Select Generador']); ?>
    </div>
    <div class="col-lg-4"> <?= $form->field($model, 'load_doses')->textInput() ?></div>
             <div class="col-lg-4">
                 <label class="text text-info">IMC </label></br>
                 <label class="label label-info"> <?= $mcf->myImc ?> (kg/m2)</label>
             </div>
             <div class="col-lg-4">
                 <label class="text text-info"> Dosis Sugerida (MBq)</label></br>
                 <label class="label label-info"> <?= $mcf->cfMedicalStudy->dosis_sugerida ?> MBq</label>
             </div>
    <div class="col-lg-4"> <?= $form->field($model, 'volume')->textInput() ?></div>

             <div class="col-lg-12 well well-sm">
                 <?php
                  $lista = $mcf->cfMedicalStudy->cftypesradiopharmaceuticals;
                  if($mcf->weight >= 70)                  {
                      $dosisF = 185;
                  }
                  else if($mcf->weight < 70){
                      //este caso es un adulto con bajopeso y se toma la dosis como ninno
                      if($mcf->cfPatient->edad > 17 ){
                          $dosisPed = \app\models\DosisPedriatica::findOne(['peso_Kg' => $mcf->weight]);
                      }
                      //este caso es un menor de edad con peso normal
                      else if($mcf->cfPatient->edad <= 17 ){
                          $dosisPed = \app\models\DosisPedriatica::findOne(['peso_Kg' => $mcf->weight]);
                      }
                      $dosisF = $dosisPed->dosis_ninno_MBq;
                  }
                  foreach($lista as $key){
                      $factDosis = 0;
                      // 0-2 annos
                      if($mcf->cfPatient->edad <= 2) {
                          $factDosis = $key->factorDosis->dosis_efectiva_0a2;
                          $factDosisOrgano = $key->factorDosis->dosis_org_crit_0a2;
                      }
                      //3-7 annos
                      if($mcf->cfPatient->edad >= 3 && $mcf->cfPatient->edad <= 7) {
                          $factDosis = $key->factorDosis->dosis_efectiva_3a7;
                          $factDosisOrgano = $key->factorDosis->dosis_org_crit_3a7;
                      }
                      //8-12 annos
                      if($mcf->cfPatient->edad >= 8 && $mcf->cfPatient->edad <= 12) {
                          $factDosis = $key->factorDosis->dosis_efectiva_8a12;
                          $factDosisOrgano = $key->factorDosis->dosis_org_crit_8a12;
                      }
                      //13-18 anos
                      if($mcf->cfPatient->edad >= 13 && $mcf->cfPatient->edad <= 18) {
                          $factDosis = $key->factorDosis->dosis_efectiva_13a18;
                          $factDosisOrgano = $key->factorDosis->dosis_org_crit_13a18;
                      }
                      //para los adultos
                      if($mcf->cfPatient->edad > 18) {
                          //	hombre
                          if($mcf->cfPatient->sex){
                              $factDosis = $key->factorDosis->dosis_efectiva_hombre;
                              $factDosisOrgano = $key->factorDosis->dosis_org_crit_hombre;
                          }
                          //	mujer
                          else{
                              $factDosis = $key->factorDosis->dosis_efectiva_mujer;
                              $factDosisOrgano = $key->factorDosis->dosis_org_crit_mujer;
                          }
                      }
                      //echo $factDosis * $dosisF;
                      echo "<div class='col-lg-3'> <i class='text text-info'>RadioFarmaco: </i><label class='label label-default'>  ".$key->cfNombreRadiofarmaco->nombre ."</label></div>";
                      echo "<div class='col-lg-2'><i class='text text-info'>organo_critico: </i><label class='label label-primary'>  ".$key->factorDosis->organo_critico ."</label></div>";
                      echo "<div class='col-lg-3'><i class='text text-info'>dosis_efectiva estimada: </i><label class='label label-default'>  ".$factDosis * $dosisF ." mSv</label></div>";
                      echo "<div class='col-lg-4'><i class='text text-info'>dosis_organo_critico estimada: </i><label class='label label-primary'> ".$factDosisOrgano * $dosisF ." mGy</label></div>";
                  }
                 //var_dump($lista);
                 ?>
             </div>

    <div class="col-lg-4"> <?= $form->field($model, 'datetime_w')->textInput(['class'=>' my-date form-control','value'=>date('Y-m-d H:i:s')]) ?></div>
    <div class="col-lg-4">  <?= $form->field($model, 'specialist')->dropDownList(ArrayHelper::map(app\models\CfWorker::find()->all(), 'id', 'nombreCompleto'),['prompt'=>'Select Especialista']); ?></div>
    <div class="col-lg-4"> <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?></div>
             <?php date_default_timezone_set('Canada/Central'); ?>
             <!-- div para rechazar dosis cargada --!-->
             <div class="col-lg-12 widget-box" style="background: #EFC69A;">
                 <div class="col-lg-12">
                     Para Rechazar la Dosis preparada por alguna causa:
                     <label class="middle">
                         <input type="checkbox" class="ace" name="causesBy" id="causesBy" onchange="addCausas();" >
                         <span class="lbl"> (Seleccione aqui)  </span>
                     </label>
                 </div>
                 <div class="hidden" id="causesDiv">
                     <div class="col-lg-4 hidden">  <?= $form->field($model, 'status')->textInput(['value'=>'1']) ?></div>
                     <div class="col-lg-6"> <?= $form->field($model, 'causes')->textarea(['rows' => 6]) ?></div>
                 </div>
                 <script type="text/javascript">
                     function addCausas(){
                         if($("input:checked").length == 1){
                             $("#causesDiv").removeClass("hidden");
                             $("#cfpreparedoses-status").value("0");
                         }
                         else{
                             $("#causesDiv").addClass("hidden");
                             $("#cfpreparedoses-status").value("1");
                         }
                     }
                 </script>
             </div>
             <!-- endiv para la calidad --!-->


    <div class="col-lg-6 hidden"> <?= $form->field($model, 'username')->textInput(['maxlength' => 100]) ?></div>
    <div class="col-lg-4 hidden"><?= $form->field($model, 'datetime_r')->textInput(['class'=>' my-date form-control','value'=>date('Y-m-d H:i:s')]) ?></div>
    <div class="col-lg-4">
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
        format: 'yyyy/mm/dd hh:ii',
        weekStart: 2,        todayBtn:  1,
		autoclose: 1,		todayHighlight: 1,
		startView: 2,
        });
    });
           (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
    $('#cfpatient-telephone').validaCampo('0123456789');
    $('#cfpatient-personal_id').validaCampo('0123456789');
           ");  ?>