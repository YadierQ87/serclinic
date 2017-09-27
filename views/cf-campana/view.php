<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfCampana */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Campanas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-campana-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fecha',
            'presion',
            'flujo_aire',
            'id',
        ],
    ]) ?>

</div>
