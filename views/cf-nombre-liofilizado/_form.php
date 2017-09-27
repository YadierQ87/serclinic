<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfNombreLiofilizado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-nombre-liofilizado-form container-fluid">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 250]) ?>

    <div class="col-lg-12">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
