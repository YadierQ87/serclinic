<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfRadiopharmaceutical */

$this->title = 'Update Cf Radiopharmaceutical: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cf Radiopharmaceuticals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-radiopharmaceutical-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
