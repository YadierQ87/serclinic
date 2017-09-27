<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfTypesRadiopharmaceutical */

$this->title = 'Update Cf Types Radiopharmaceutical: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cf Types Radiopharmaceuticals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-types-radiopharmaceutical-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
