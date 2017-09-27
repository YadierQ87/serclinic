<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfPhasesMedicalConsultation */

$this->title = 'Create Cf Phases Medical Consultation';
$this->params['breadcrumbs'][] = ['label' => 'Cf Phases Medical Consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-phases-medical-consultation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
