<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfEntregaReporteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-entrega-reporte-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_consulta') ?>

    <?= $form->field($model, 'fecha_entrega') ?>

    <?= $form->field($model, 'quien_entrega') ?>

    <?= $form->field($model, 'quien_recibe') ?>

    <?php // echo $form->field($model, 'ci_quien_recibe') ?>

    <?php // echo $form->field($model, 'telf_quien_recibe') ?>

    <?php // echo $form->field($model, 'direccion_quien_recibe') ?>

    <?php // echo $form->field($model, 'id_paciente') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>