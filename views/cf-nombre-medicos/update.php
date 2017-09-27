<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfNombreMedicos */

$this->title = 'Update Cf Nombre Medicos: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Nombre Medicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-nombre-medicos-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
