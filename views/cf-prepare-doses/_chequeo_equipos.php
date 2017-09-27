<?php
/**
 * Created by PhpStorm.
 * User: anabel.rodriguez
 * Date: 02/02/2017
 * Time: 17:03
 */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

?>

<div class="widget-body">
    <div class="widget-main">

        <ul class="nav nav-tabs " id="myTab">
            <li class="dropdown active" >
                <a aria-expanded="true" data-toggle="tab" href="#campana">
                    CAMPANA RADIOQUIMICA
                </a>
            </li>
            <li class="dropdown">
                <a aria-expanded="false" data-toggle="tab" href="#refrigerator">
                    REFRIGERADORES
                </a>
            </li>
            <li class="dropdown">
                <a aria-expanded="false" data-toggle="tab" href="#activimetro">

                    ACTIVIMETRO
                </a>
            </li>
        </ul>


        <div class="tab-content">
            <div id="campana" class="tab-pane fade active in">
                <?php $campana = new \app\models\CfCampana(); ?>
                <p><?= $this->render('/cf-campana/create', ['model' => $campana]); ?></p>
            </div>
            <div id="refrigerator" class="tab-pane fade">
                <?php $friger = new \app\models\CfRefrigeradores(); ?>
                <p><?= $this->render('/cf-refrigeradores/create', ['model' => $friger]); ?></p>
            </div>
            <div id="activimetro" class="tab-pane fade">
                <p>Marcaje de generadores</p>
            </div>

        </div>
    </div>
</div>

