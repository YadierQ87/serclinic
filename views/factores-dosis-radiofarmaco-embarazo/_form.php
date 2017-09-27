<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FactoresDosisRadiofarmacoEmbarazo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factores-dosis-radiofarmaco-embarazo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'early_pregnant')->textInput() ?>

    <?= $form->field($model, '3_meses')->textInput() ?>

    <?= $form->field($model, '6_meses')->textInput() ?>

    <?= $form->field($model, '9_meses')->textInput() ?>

    <?= $form->field($model, 'id_radiofarmaco')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
