<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CfEntregaReporte */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-entrega-reporte-form container-fluid">
    <?= $this->render('/cf-medical-consultation/_details',['mcf'=>$mcf]); ?>
    <?php // $this->render('/cf-medical-consultation/_process',['mcf'=>$mcf]); ?>

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
                    <li><span style="text-transform: uppercase">N&uacute;mero de Estudio HC: </span><?= $mcf->cfPatient->medical_record_id;?>      </li>
                    <li><span style="text-transform: uppercase">Fecha de Estudio:</span> <?= $mcf->date_turn; ?></li>
                    <li><span style="text-transform: uppercase">Tipo de Estudio:</span> <?= $mcf->cfMedicalStudy->name; ?> </li>
                    <li><span style="text-transform: uppercase">Radiof&aacute;rmaco empleado:</span> <?= /*$mcf->cfMedicalStudy->cfRadiopharmaceutical;*/ "RadioLG-25" ?> </li>
                </ul>
                <hr>
                <!-- Procesar Imagen !-->
                <div class="col-lg-6">
                    <h4 class="header-text"> Imagen del Estudio</h4>
                    <input type="hidden" id="img-list-acq" name="img-list-acq">
                    <?php
                    try{
                        $listImg = $mcf->cfAcquireImageAcquireStudy;  ?>
                        <div class='col-lg-4 tags'>
                            <div class='cboxElement col-lg-12'  title='' >
                                <img alt='150x150' src='<?= $listImg->img_name_path ?>' height='140' width='150'>
                            </div>
                            <div class='col-lg-12'>
                                <span class='label-holder'><span class='label label-info'>tag: <?= $listImg->meta_tag ?></span></span>
                          <span class='label-holder'><span class='label label-danger'>size:<?= $listImg->img_size ?></span>
                          <span class='label-holder'><span class='label label-warning'>type:<?= $listImg->img_type ?></span>
                            </div>
                        </div>
                        <?php
                    } catch (\yii\base\Exception $e){        }
                    ?>
                </div>
                <div class="col-lg-6">
                    <h4 class="header-text"> Resultado Proceso: </h4>
                    <span class="text text-danger">            <?= $mcf->cfProcessings->observation; ?>         </span>
                </div>
            </div>
            </div>
        </div>

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'id_cf_medical_consultation')->textInput(['value'=>$mcf->id]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'fecha_entrega')->textInput(['value'=>date("Y-m-d")]) ?></div>
        <div class="col-lg-6"> <?= $form->field($model, 'quien_entrega')->dropDownList( ArrayHelper::map(app\models\CfWorker::find()->all(), 'nombreCompleto', 'nombreCompleto'),['prompt'=>' Seleccione Trabajador']); ?>  </div>
            <div class="col-lg-6">  <?= $form->field($model, 'quien_recibe')->textInput(['maxlength' => 250]) ?></div>
   <div class="col-lg-6">  <?= $form->field($model, 'ci_quien_recibe')->textInput(['maxlength' => 250]) ?></div>
       <div class="col-lg-6"> <?= $form->field($model, 'telf_quien_recibe')->textInput(['maxlength' => 250]) ?></div>
    <div class="col-lg-6"> <?= $form->field($model, 'direccion_quien_recibe')->textInput(['maxlength' => 250]) ?></div>

            <div class="col-lg-6">  <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
