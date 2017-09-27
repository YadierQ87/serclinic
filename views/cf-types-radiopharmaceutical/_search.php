<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfTypesRadiopharmaceuticalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-types-radiopharmaceutical-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'batch') ?>

    <?= $form->field($model, 'internal_code') ?>

    <?= $form->field($model, 'production_company') ?>

    <?php // echo $form->field($model, 'production_datetime') ?>

    <?php // echo $form->field($model, 'expiration_datetime') ?>

    <?php // echo $form->field($model, 'reception_datetime') ?>

    <?php // echo $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'used_count') ?>

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
