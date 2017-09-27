<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfRefrigeradores */

$this->title = 'Update Cf Refrigeradores: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Refrigeradores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-refrigeradores-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
