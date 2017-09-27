<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfMedicalConsultation */

$this->title = 'Create Cf Medical Consultation';
$this->params['breadcrumbs'][] = ['label' => 'Cf Medical Consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-medical-consultation-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
