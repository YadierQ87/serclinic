<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfAcquireImage */

$this->title = 'Update Cf Acquire Image: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Acquire Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-acquire-image-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
