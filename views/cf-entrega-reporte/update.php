<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfEntregaReporte */

$this->title = 'Update Cf Entrega Reporte: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Entrega Reportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-entrega-reporte-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
