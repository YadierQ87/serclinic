<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfSettings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-settings-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-6"> <?= $form->field($model, 'parameter')->textInput(['maxlength' => 100]) ?></div>

        <div class="col-lg-6"> <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?></div>

            <div class="col-lg-6"> <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?></div>

                <div class="col-lg-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
