<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfDiaryElutionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-diary-elution-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'elution_datetime') ?>

    <?= $form->field($model, 'codigo_generator') ?>

    <?= $form->field($model, 'activity_elution') ?>

    <?= $form->field($model, 'volumen_elution') ?>

    <?php // echo $form->field($model, 'activity99Mo') ?>

    <?php // echo $form->field($model, 'percent_radiocoloides') ?>

    <?php // echo $form->field($model, 'aluminio') ?>

    <?php // echo $form->field($model, 'ph') ?>

    <?php // echo $form->field($model, 'aspecto_organoleptico') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
