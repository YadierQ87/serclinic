<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfGeneratorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-generator-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cf_local_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'number') ?>

    <?= $form->field($model, 'batch') ?>

    <?php // echo $form->field($model, 'mark') ?>

    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'reception_datetime') ?>

    <?php // echo $form->field($model, 'waste_datetime') ?>

    <?php // echo $form->field($model, 'factory_datetime_reference') ?>

    <?php // echo $form->field($model, 'factory_activity_reference') ?>

    <?php // echo $form->field($model, 'factory_production_datetime') ?>

    <?php // echo $form->field($model, 'factory_expiracion_datetime') ?>

    <?php // echo $form->field($model, 'first_datetime_elucion') ?>

    <?php // echo $form->field($model, 'first_activity_elucion') ?>

    <?php // echo $form->field($model, 'last_datetime_elucion') ?>

    <?php // echo $form->field($model, 'last_activity_elucion') ?>

    <?php // echo $form->field($model, 'specialist') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'observation') ?>

    <?php // echo $form->field($model, 'datetime_r') ?>

    <?php // echo $form->field($model, 'username') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
