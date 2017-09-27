<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfGenerator */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cf Generators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-generator-view"style="margin-top: 10px">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
           // 'cf_local_id',
            'name',
            'number',
            'batch',
            //'mark',
            'company',
            'reception_datetime',
            'waste_datetime',
            'factory_datetime_reference',
            'factory_activity_reference',
            'factory_production_datetime',
            'factory_expiracion_datetime',
            'dosis1m_recepcion',
            'dosis1m_desecho',
            'frotis_recepcion',

            'specialist',
            'status',
            'observation:ntext',
            'datetime_r',
            'username',
        ],
    ]) ?>

</div>
