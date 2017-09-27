<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfTypesEquipment */

$this->title = 'Update Cf Types Equipment: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cf Types Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-types-equipment-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
