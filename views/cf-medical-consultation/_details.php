<?php
/**
 * Created by PhpStorm.
 * User: Yadier
 * Date: 22/12/2016
 * Time: 12:44 PM
 */?>
<div class="widget-box">
    <div class="widget-header">
        <h5 class="widget-title">
            <i class="fa fa-caret-square-o-right"></i>
            <u>Paciente:</u> <span class='text-warning'><?= $mcf->cfPatient->fullname; ?></span> <u>Estudio:</u><span class='text-warning'><?= $mcf->cfMedicalStudy->name; ?></span> </h5>
        <div class="widget-toolbar">
            <a href="#" data-action="collapse">
                <i class="ace-icon fa fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <div class="widget-body">
        <div class="widget-main">
            <table class="table table-striped table-bordered table-hover" border="1px">
                <thead>
                <tr>
                    <td colspan="3" width="35%"><h6 class="bg-orange"> <i class="ace-icon fa fa-male bg-orange"></i> Paciente</h6></td>
                    <td colspan="1" width="25%"><h6 class="bg-blue"><i class="ace-icon fa fa-calendar-o"></i> Estudio Medico</h6></td>
                    <td width="40%"><h6 class="bg-orange"> <i class="ace-icon fa fa-edit"></i>                 Observaciones</h6></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td rowspan="2"> <img src="<?= $mcf->cfPatient->photo ?>" class="gritter-image"> </td>
                    <td>Edad: <span class='text-primary'><?= $mcf->cfPatient->edad ?> </span></td>
                    <td>Sexo: <span class='text-primary'><?= $mcf->cfPatient->sex ?></span></td>
                    <td>Tipo: <span class='text-primary'><?= $mcf->cfMedicalStudy->name; ?></span></td>
                    <td>Estado Estudio: <span class='label label-lg label-warning'><?= $mcf->status ?></span> </td>
                </tr>
                <tr>
                    <td>Talla: <span class='label label-lg label-primary'><?= $mcf->size ?> cm</span></td>
                    <td>Peso: <span class='label label-lg label-primary'><?= $mcf->weight ?> kgs</span></td>
                    <td>No Historia: <span class='label label-lg label-info'> <?= $mcf->cfPatient->medical_record_id ?></span></td>
                    <td><?= $mcf->cfPatient->observation ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
