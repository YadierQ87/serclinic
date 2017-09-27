<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfTypesRadiopharmaceutical */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cf Types Radiopharmaceuticals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-types-radiopharmaceutical-view">




    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'batch',
            'internal_code',
            'production_company',
            'production_datetime',
            'expiration_datetime',
            'reception_datetime',
            'count',
            'used_count',
            'status',
            'observation:ntext',
            'datetime_r',
            'username',
        ],
    ]) ?>

</div>
