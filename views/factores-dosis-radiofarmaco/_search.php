<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FactoresDosisRadiofarmacoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factores-dosis-radiofarmaco-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'organo_critico') ?>

    <?= $form->field($model, 'id_radiofarmaco') ?>

    <?= $form->field($model, 'dosis_efectiva_0a2') ?>

    <?= $form->field($model, 'dosis_efectiva_3a7') ?>

    <?php // echo $form->field($model, 'dosis_efectiva_8a12') ?>

    <?php // echo $form->field($model, 'dosis_efectiva_13a18') ?>

    <?php // echo $form->field($model, 'dosis_efectiva_hombre') ?>

    <?php // echo $form->field($model, 'dosis_efectiva_mujer') ?>

    <?php // echo $form->field($model, 'dosis_org_crit_0a2') ?>

    <?php // echo $form->field($model, 'dosis_org_crit_3a7') ?>

    <?php // echo $form->field($model, 'dosis_org_crit_8a12') ?>

    <?php // echo $form->field($model, 'dosis_org_crit_13a18') ?>

    <?php // echo $form->field($model, 'dosis_org_crit_hombre') ?>

    <?php // echo $form->field($model, 'dosis_org_crit_mujer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
