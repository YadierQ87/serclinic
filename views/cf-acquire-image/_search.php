<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfAcquireImageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-acquire-image-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cf_medical_consultation_id') ?>

    <?= $form->field($model, 'cf_equipment_id') ?>

    <?= $form->field($model, 'specialist') ?>

    <?= $form->field($model, 'observation') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'causes') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'datetime_w') ?>

    <?php // echo $form->field($model, 'datetime_r') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
