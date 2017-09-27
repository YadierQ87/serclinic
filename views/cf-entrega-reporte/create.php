<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfEntregaReporte */

$this->title = 'Create Cf Entrega Reporte';
$this->params['breadcrumbs'][] = ['label' => 'Cf Entrega Reportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-entrega-reporte-create">


    <?= $this->render('_form', [
        'model' => $model,'mcf'=>$mcf,
    ]) ?>

</div>
