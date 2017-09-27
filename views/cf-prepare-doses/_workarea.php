<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CfRadiopharmaceuticalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="cf-radiopharmaceutical-workarea">
 <!-- Menu Radio-farmacia !-->

<!-- Planificacion Diaria !-->
    <div class="col-xs-12 col-sm-4 col-lg-4"  style="margin-top: 20px ">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title" style="text-transform: uppercase;color: #2679B5">Menu</h4>
                <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="widget-body">
                <div class="widget-main">

                    <div class="row">
                        <div class="col-sm-12" >
                            <div class="thumbnail container-fluid" >
                                <h4 style="margin-bottom: 15px">Chequeo de Equipos</h4>

                            <div class="col-lg-4" style="margin-bottom: 10px; margin-right: -20px;margin-left: 15px" >

                                <a href="<?= Url::to(['/cf-refrigeradores']) ?>" class="btn btn-white btn-primary" role="button">Refrigerador <i class="fa fa-angle-double-right"></i></a>

                            </div>

                                <div class="col-lg-4" style="margin-bottom: 10px">
                                    <a href="<?= Url::to(['/cf-campana']) ?>" class="btn btn-white btn-primary" role="button">Campana Radioquimica <i class="fa fa-angle-double-right"></i></a>
                                </div>

                            <div class="col-lg-4" style="margin-bottom: 10px">
                                    <a href="<?= Url::to(['/cf-activimetro']) ?>" class="btn btn-white btn-primary" role="button"> Activimetro <i class="fa fa-angle-double-right"></i> </a>
                            </div>
                        </div>  </div>

<?php $num=0 ?>
                        <div class="col-sm-12">
                            <div class="thumbnail">

                                    <h4>Planificacion Diaria</h4>

                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Estudio Medico</th>
                                            <th>Cantidad</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php

                                        for($i=0;$i<sizeof($datos);$i++){
                                            $num++;
                                         echo"<tr>
                                            <th scope='row'>".$num."</th>
                                            <td>".$datos[$i]['name']."</td>
                                            <td>".$datos[$i]['num']."</td>

                                        </tr>";}
                                        ?>

                                        </tbody>
                                    </table>


                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- fin de Planificacion !-->
    </div>
<!-- fin del div grande !-->