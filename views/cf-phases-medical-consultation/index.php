<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CfPhasesMedicalConsultationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fases Consultas Medicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-phases-medical-consultation-index">

    <h1><?= Html::encode($this->title) ?> <?= Html::a('Crear Fase Consulta Medica', ['create'], ['class' => 'btn btn-success']) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cf_medical_consultation_id',
            'cf_process_id:ntext',
            'cf_process_section_id',
            'status:ntext',
            // 'specialist:ntext',
            // 'datetime_w',
            // 'datetime_r',
            // 'username',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
