<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfPatient */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-patient-view">
    <div class="panel panel-default">
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive container-fluid">

                    <div class="btn col-lg-4 control-label">No Historia Clinica: <?= $model->medical_record_id ?></label> </div>
                    <div class="panel col-lg-5 control-label">
                        <h5> Paciente:  <?= $model->firstname ?> <?= $model->lastname ?> </h5>
                    </div>
                    <div class="panel col-lg-3 control-label">
                        <h5> CI:</label> <?= $model->personal_id ?>  </h5>
                    </div>

                   <div class="col-lg-4 well">
                        <img class='photo-ico gritter-image' src='<?= $model->photo ?>'/>
                   </div>
            <div class="col-lg-8">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Fecha Nacimiento: <?= $model->date_birth ?></th>
                        <th>Correo: <?= $model->email ?></th>
                        </tr>
                    <tr>
                        <th>Telefono: <?= $model->telephone ?></th>
                        <th>Sexo: <?= $model->sex ?></th>
                        </tr>
                    <tr>
                        <th>Nacionalidad: <?= $model->nationality ?></th>
                        <th>Provincia: <?= $model->provincia->nombre ?></th>
                        </tr><tr>
                        <th>Municipio: <?= $model->region ?></th>
                        <th>Fecha Registro: <?= $model->up_date ?></th>
                    </tr></thead>
                </table>
            </div>
                <div class="col-lg-12 panel panel-default control-label"><h5> <b>Historia Cl&iacute;nica:</b> <?= $model->medical_record ?></h5></div>
                <div class="col-lg-12 panel panel-default control-label"><h5> <b>Observaci&oacute;n:</b> <?= $model->observation ?> </h5></div>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>

</div>
