<div class="widget-box container-fluid">
    <div class="widget-header">
        <h5 class="widget-title"> <i class="fa fa-caret-square-o-right"></i> Datos del Estudio x Procesos </h5>
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
                    <td><h6 class="bg-orange"> <i class="ace-icon fa fa-history bg-orange"></i> Proceso </h6></td>
                    <td><h6 class="bg-orange"> <i class="ace-icon fa fa-clock-o bg-orange"></i> Fecha </h6></td>
                    <td><h6 class="bg-blue"><i class="ace-icon fa fa-check-square-o"></i> Estado </h6></td>
                    <td><h6 class="bg-blue"><i class="ace-icon fa fa-user-md"></i> Especialista </h6></td>
                    <td><h6 class="bg-blue"><i class="ace-icon fa fa-exclamation-triangle"></i> Causas </h6></td>
                    <td><h6 class="bg-orange"> <i class="ace-icon fa fa-edit"></i>  Observaciones </h6></td>
                </tr>
                </thead>
                <tbody>
                <?php
                //Preparar Dosis
                if(isset($mcf->cfPrepareDoses)){
                    ?>
                    <tr>
                        <td><?= "Prepare Doses" ?>  </td>
                        <td><?= $mcf->cfPrepareDoses->datetime_w ?>  </td>
                        <td><?= ($mcf->cfPrepareDoses->status == 1) ? "Apto" : "No Apto" ?>  </td>
                        <td><?= $mcf->cfPrepareDoses->specialist ?>  </td>
                        <td><?= $mcf->cfPrepareDoses->causes ?>  </td>
                        <td><?= $mcf->cfPrepareDoses->observation ?>  </td>
                    </tr>
                <?php } ?>
                <?php
                //Administrar Dosis
                if(isset($mcf->cfUniqueAdministerDoses)){
                    ?>
                    <tr>
                        <td><?= "Administer Doses" ?>  </td>
                        <td><?= $mcf->cfUniqueAdministerDoses->datetime_w ?>  </td>
                        <td><?= ($mcf->cfUniqueAdministerDoses->status == 1) ? "Apto" : "No Apto" ?>  </td>
                        <td><?= $mcf->cfUniqueAdministerDoses->specialist ?>  </td>
                        <td><?= $mcf->cfUniqueAdministerDoses->causes ?>  </td>
                        <td><?= $mcf->cfUniqueAdministerDoses->observation ?>  </td>
                    </tr>
                <?php } ?>
                <?php
                //Adquirir Imagen
                if(isset($mcf->cfImages)){
                    ?>
                    <tr>
                        <td><?= "Acquire Image" ?>  </td>
                        <td><?= $mcf->cfImages->datetime_w ?>  </td>
                        <td><?= ($mcf->cfImages->status == 1) ? "Apto" : "No Apto" ?>  </td>
                        <td><?= $mcf->cfImages->specialist ?>  </td>
                        <td><?= $mcf->cfImages->causes ?>  </td>
                        <td><?= $mcf->cfImages->observation ?>  </td>
                    </tr>
                <?php } ?>
                <?php
                //Procesar Imagen
                if(isset($mcf->cfProcessings)){
                    ?>
                    <tr>
                        <td><?= "Proccessing" ?>  </td>
                        <td><?= $mcf->cfProcessings->datetime_w ?>  </td>
                        <td><?= ($mcf->cfProcessings->status== 1) ? "Apto" : "No Apto" ?>  </td>
                        <td><?= $mcf->cfProcessings->specialist ?>  </td>
                        <td><?= $mcf->cfProcessings->causes ?>  </td>
                        <td><?= $mcf->cfProcessings->observation ?>  </td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>