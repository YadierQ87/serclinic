<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfCodZonas */

$this->title = 'Zona: ' . ' ' . $model->nombre_lugar;
$this->params['breadcrumbs'][] = ['label' => 'Cf Cod Zonas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-cod-zonas-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
