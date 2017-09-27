<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfMedicalConsultation */

$this->title = 'Update Cf Medical Consultation: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Medical Consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-medical-consultation-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
