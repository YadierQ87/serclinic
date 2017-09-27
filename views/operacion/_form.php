<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Operacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operacion-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
               <div class="col-lg-6"> <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?> </div>
                <div class="col-lg-6"> <?= $form->field($model, 'ruta')->textInput(['maxlength' => true]) ?> </div>
                <div class="col-lg-6">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>
