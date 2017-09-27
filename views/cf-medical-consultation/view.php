<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfMedicalConsultation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Medical Consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-medical-consultation-view">
    <?= $this->render('_turno', [ 'model' => $model,    ]) ?>
</div>
