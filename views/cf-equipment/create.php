<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfEquipment */

$this->title = 'Create Cf Equipment';
$this->params['breadcrumbs'][] = ['label' => 'Cf Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-equipment-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
