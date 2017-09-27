<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfReport */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-report-view">

    <!-- Detalle del Turno en General --!-->
    <?= $this->render('/cf-medical-consultation/_turno', [ 'model' => $model,    ]) ?>


</div>
