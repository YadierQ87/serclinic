<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfEquipment */

$this->title = 'Equipo: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cf Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-equipment-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
