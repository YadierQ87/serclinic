<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfWorker */

$this->title = 'Update Cf Worker: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Workers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-worker-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
