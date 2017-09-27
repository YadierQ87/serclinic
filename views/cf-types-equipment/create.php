<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfTypesEquipment */

$this->title = 'Create Cf Types Equipment';
$this->params['breadcrumbs'][] = ['label' => 'Cf Types Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-types-equipment-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
