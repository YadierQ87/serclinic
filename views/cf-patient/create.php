<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfPatient */

$this->title = 'Crear Paciente';
$this->params['breadcrumbs'][] = ['label' => 'Listado Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-patient-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
