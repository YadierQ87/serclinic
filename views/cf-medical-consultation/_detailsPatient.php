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
            <u>Paciente:</u> <span class='text-warning'><?= $mcf->fullname; ?></span> </h5>
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
                    <td colspan="4" width="35%"><h6 class="bg-orange"> <i class="ace-icon fa fa-male bg-orange"></i> Paciente</h6></td>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td rowspan="2"> <img src="<?= $mcf->photo ?>" class="gritter-image"> </td>
                    <td>CI: <span class='text-primary'><?= $mcf->personal_id ?> </span></td>
                    <td>Edad: <span class='text-primary'><?= $mcf->edad ?> </span></td>
                    <td>Sexo: <span class='text-primary'><?= $mcf->sex ?></span></td>


                </tr>
                <tr>

                    <td>No Historia: <span class='label label-lg label-info'> <?= $mcf->medical_record_id ?></span></td>
                    <td><?= $mcf->observation ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
