<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfMedicalStudy */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cf Medical Studies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-medical-study-view"  style="margin-top: 10px">





    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'cf_report_templates_id',
            //'cf_indications_templates_id',
            'name',
            //'days_week_planned_and_amount:ntext',
            //'planned_process_medical_consultation:ntext',
            'administer_doses_zone:ntext',
            'price:ntext',
            'status',
            'observation:ntext',
            'datetime_r',
            'username',
        ],
    ]) ?>

    <!-- <p  style="margin-top: 20px">
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

</div>
