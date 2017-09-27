<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfEquipment */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cf Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-equipment-view" style="margin-top: 20px">




    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cf_local_id',
            'cf_types_equipment_id',
            'name',
            'stock_number',
            'mark',
            'model',
            'specialist',
            'production_datetime',
            'last_calibration_datetime',
            'last_calibration_certified',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data)
                {
                    $label = ($data->status == 1) ? "Apto" : "No Apto";
                    return Html::label($label);
                },
            ],
            'observation:ntext',
            'can_users:ntext',
            'datetime_r',
            'username',
        ],
    ]) ?>

   <!-- <p style="margin-top: 20px">
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>-->

</div>
