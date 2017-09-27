<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfPhasesMedicalConsultation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Phases Medical Consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-phases-medical-consultation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cf_medical_consultation_id',
            'cf_process_id:ntext',
            'cf_process_section_id',
            'status:ntext',
            'specialist:ntext',
            'datetime_w',
            'datetime_r',
            'username',
        ],
    ]) ?>

</div>
