<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rol */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-form container-fluid">
    <?php $form = ActiveForm::begin(); ?>

        <div class="col-lg-5">            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?> </div>
            <div class="col-lg-7">
                <?php
                $opciones = ArrayHelper::map($tipoOperaciones, 'id', 'nombre');
                echo $form->field($model, 'operaciones')->checkboxList($opciones, ['unselect' => NULL, 'separator' => '<br />']);
                ?>
            </div>
            <div class="col-lg-6">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Agregar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

    <?php ActiveForm::end(); ?>
</div>