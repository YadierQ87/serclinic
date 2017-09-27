<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfActivimetroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-activimetro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fecha_medicion') ?>

    <?= $form->field($model, 'hora') ?>

    <?= $form->field($model, 'fondo_act') ?>

    <?= $form->field($model, 'actv_fuente_patron') ?>

    <?php // echo $form->field($model, 'actv_estandar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
