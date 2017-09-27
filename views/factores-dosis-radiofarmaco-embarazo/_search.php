<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FactoresDosisRadiofarmacoEmbarazoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factores-dosis-radiofarmaco-embarazo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'early_pregnant') ?>

    <?= $form->field($model, '3_meses') ?>

    <?= $form->field($model, '6_meses') ?>

    <?= $form->field($model, '9_meses') ?>

    <?php // echo $form->field($model, 'id_radiofarmaco') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
