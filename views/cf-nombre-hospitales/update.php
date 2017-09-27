<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfNombreHospitales */

$this->title = 'Update Cf Nombre Hospitales: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Nombre Hospitales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-nombre-hospitales-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
