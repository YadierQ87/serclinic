<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfRefrigeradores */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Refrigeradores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-refrigeradores-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'Temperatura_refrigerador',
            'fecha_refrigerador',
            'temperatura_congelador',
            'fecha_congelador',
            'temperatura_freezer',
            'fecha_freezer',
        ],
    ]) ?>

</div>
