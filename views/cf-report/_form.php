<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CfReport */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="cf-report-form container-fluid">
    <?= $this->render('/cf-medical-consultation/_details',['mcf'=>$mcf]); ?>
    <?= $this->render('/cf-medical-consultation/_process',['mcf'=>$mcf]); ?>

    <div class="widget-box container-fluid">
        <div class="widget-header">
            <h5 class="widget-title"> <i class="fa fa-caret-square-o-right"></i> Preparar Informe </h5>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <!-- Vista Previa del Informe !-->
                <div class="container-fluid">
                     <h4 class="text center"><i class="fa fa-hospital-o"></i> Centro de Investigaciones Cl&iacute;nicas</h4></br>
                Tel&eacute;fonos 2027055 2023763</br>
                <h3>Informe M&eacute;dico:</h3></br>
                <ul>
                    <li><span style="text-transform: uppercase"> Nombre y apellidos Paciente: </span> <?= $mcf->cfPatient->fullname; ?> </li>
                    <li><span style="text-transform: uppercase">Centro de Procedencia(Hospital): </span> <?= $hospital = $mcf->hospital_makes_referral_name; ?></li>
                    <li><span style="text-transform: uppercase">N&uacute;mero de HC: </span><?= $mcf->cfPatient->medical_record_id;?>      </li>
                    <hr>
                    <?php foreach($listadoEstudios as $estudios){ ?>

                        <li><span style="text-transform: uppercase">Tipo de Estudio:</span> <?= $estudios->cfMedicalStudy->name; ?> </li>
                    <li><span style="text-transform: uppercase">Fecha de Estudio:</span> <?= $estudios->date_turn; ?></li>

                    <li><span style="text-transform: uppercase">Radiof&aacute;rmaco(s) empleado(s):</span>
                        <?php
                        $radiof = $estudios->cfMedicalStudy->cftypesradiopharmaceuticals;
                        if(is_array($radiof)){
                            foreach($radiof as $key){
                               echo $key->cfNombreRadiofarmaco->nombre;
                            }
                        }
                        ?>
                    </li>
                        <!-- Procesar Imagen !-->
                        <div class="col-lg-12">
                        <div class="col-lg-6">
                            <h4 class="header-text"> Imagen del Estudio</h4>
                            <input type="hidden" id="img-list-acq" name="img-list-acq">
                            <?php
                            try{ (is_object($estudios->cfAcquireImageAcquireStudy)) ? $listImg = $estudios->cfAcquireImageAcquireStudy : $listImg = null;?>

                                         <div class='col-lg-4 tags <?= is_null($listImg) ? 'hide': '' ?>'>
                                             <div class='cboxElement col-lg-12'  title='' >
                                                 <img alt='150x150' src='<?= !is_null($listImg) ?  $listImg->img_name_path : ''; ?>' height='140' width='150'>
                                             </div>
                                             <div class='col-lg-12'>
                                                 <span class='label-holder'><span class='label label-info'>tag: <?= !is_null($listImg) ?  $listImg->meta_tag : ''; ?></span></span>
                                           <span class='label-holder'><span class='label label-danger'>size:<?=  !is_null($listImg) ? $listImg->img_size : ''; ?></span>
                                           <span class='label-holder'><span class='label label-warning'>type:<?= !is_null($listImg) ? $listImg->img_type : ''; ?></span>
                                             </div>
                                         </div>

                                     <?php
                             } catch (\yii\base\Exception $e){        }
                            ?>
                        </div>
                        <div class="col-lg-6">

                            <h4 class="header-text"> Resultado Proceso: </h4>
                            <span class="text text-danger">            <?= (is_object($estudios->cfProcessings)) ? $estudios->cfProcessings->observation : ""; ?>         </span>
                        </div> </div> <br> <hr>

                    <?php } ?>
                </ul>
                    <hr>

     </div>

                <hr>
                <!-- Fin de la Previa del Informe !-->
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'cf_medical_consultation_id')->textInput(['value'=>$mcf->id]); ?></div>
    <div class="col-lg-6">
        Especialista que Informa
        <?= Html::dropDownList('select-esp',Yii::$app->request->post('select-esp'),
            ArrayHelper::map(app\models\CfWorker::find()->all(), 'nombreCompleto', 'nombreCompleto'),['multiple'=>'multiple','class'=>'mymultiple','id'=>'select-esp']) ?>

      <div class="hidden"><?= $form->field($model, 'specialist')->textInput(['id'=>'h_especialistas',]) ?></div>

    </div>
                <div class="col-lg-6 hidden">
       <?= $form->field($model, 'pre_document')->textInput(['rows' => 6,'value'=>'$predocument']) ?>
                </div>
                <div class="col-lg-6 hidden"><?= $form->field($model, 'document')->textInput(['rows' => 6,'value'=>( (is_object($mcf->cfProcessings))? $mcf->cfProcessings->observation : "")]) ?></div>
                <div class="col-lg-6">  <?= $form->field($model, 'post_document')->textarea(['rows' => 6]) ?></div>
                <div class="col-lg-6 hidden"> <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?></div>
                <div class="col-lg-6 hidden"> <?= $form->field($model, 'username')->textInput(['value'=>Yii::$app->user->identity->username]) ?></div>
                <div class="col-lg-6 hidden">  <?= $form->field($model, 'datetime_w')->textInput(['class'=>' my-date form-control','value'=>date("Y-m-d")]) ?></div>
                <div class="col-lg-6 hidden">  <?= $form->field($model, 'datetime_r')->textInput(['class'=>' my-date form-control','value'=>date("Y-m-d")]) ?></div>
                <div class="col-lg-6 hidden">  <?= $form->field($model, 'status')->textInput(['value'=>'1']) ?></div>
    <!-- div para las causas --!-->
    <div class="col-lg-6">
                    <div class="col-lg-12">
                        <label class="middle">
                            <input type="checkbox" class="ace" name="causesBy" id="causesBy" onchange="addCausas();" >
                            <span class="lbl"> Rechazar Reporte </span>
                        </label>
                        <div class="hidden" id="causesDiv"><?= $form->field($model, 'causes')->textarea(['rows' => 6]) ?></div>
                    </div>
              <script type="text/javascript">
 function addCausas(){
    if($("input:checked").length == 1){
        $("#causesDiv").removeClass("hidden");
        $("#cfreport-status").val('0');
    }
    else{
        $("#causesDiv").addClass("hidden");
        $("#cfreport-status").val('1');
    }
 }
         </script>
       </div>
        <!-- endiv para las causas --!-->
        <div class="col-lg-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary  pull-right', 'style'=>'margin-bottom: 5px; margin-top:15px']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    </div></div></div>
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

     $('.mymultiple').change(function() {
            todoselect1();
        }).multipleSelect({            width: '100%'        });

        function todoselect1(){
            elementos = document.getElementById('select-esp');
            longitud = document.getElementById('select-esp').length;

            j=0; arreglo = new Array();
            for (var i = 0; i < longitud; i++){
                if( elementos[i].selected == true)            {
                    console.log(elementos[i].value);
                    //$('.ms-drop > ul').children();
                    arreglo[j] = elementos[i].value; j++;
                }
            }
            document.getElementById('h_especialistas').value = arreglo;
        }

           (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
    $('#cfpatient-telephone').validaCampo('0123456789');
    $('#cfpatient-personal_id').validaCampo('0123456789');
           ");  ?>