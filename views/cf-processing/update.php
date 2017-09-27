<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfProcessing */

$this->title = 'Update Cf Processing: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Processings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-processing-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
