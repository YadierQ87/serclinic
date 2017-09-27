<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfEquipmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-equipment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cf_local_id') ?>

    <?= $form->field($model, 'cf_types_equipment_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'stock_number') ?>

    <?php // echo $form->field($model, 'mark') ?>

    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'specialist') ?>

    <?php // echo $form->field($model, 'production_datetime') ?>

    <?php // echo $form->field($model, 'last_calibration_datetime') ?>

    <?php // echo $form->field($model, 'last_calibration_certified') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'observation') ?>

    <?php // echo $form->field($model, 'can_users') ?>

    <?php // echo $form->field($model, 'datetime_r') ?>

    <?php // echo $form->field($model, 'username') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
