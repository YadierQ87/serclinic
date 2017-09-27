<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfRadiopharmaceutical */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cf Radiopharmaceuticals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-radiopharmaceutical-view">



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cf_types_radiopharmaceutical_id',
            'name',
            'marcage_datetime',
            'marcage_activity',
            'marcage_volumen',
            'specialist',
            'status',
            'observation',
        ],
    ]) ?>

</div>
