<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfRefrigeradoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-refrigeradores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Temperatura_refrigerador') ?>

    <?= $form->field($model, 'fecha_refrigerador') ?>

    <?= $form->field($model, 'temperatura_congelador') ?>

    <?= $form->field($model, 'fecha_congelador') ?>

    <?php // echo $form->field($model, 'temperatura_freezer') ?>

    <?php // echo $form->field($model, 'fecha_freezer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
