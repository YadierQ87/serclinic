<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DosisPedriatica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosis-pedriatica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'peso_Kg')->textInput() ?>

    <?= $form->field($model, 'fraccion')->textInput() ?>

    <?= $form->field($model, 'dosis_ninno_MBq')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
