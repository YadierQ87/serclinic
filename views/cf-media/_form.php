<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfMedia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-media-form">

    <?php $form = ActiveForm::begin([
        "method" => "post",
        "enableClientValidation" => true,
        "options" => ["enctype" => "multipart/form-data"],
    ]); ?>
    <div class="col-lg-6">Selecciona Imagen <input name="nombre_doc" type="file" /> </div>
    <div class="col-lg-6"> <?= $form->field($model, 'name')->textInput(['maxlength' => 200]) ?></div>
        <div class="col-lg-6"> <?= $form->field($model, 'file_name')->textInput(['maxlength' => 200]) ?></div>
            <div class="col-lg-6"> <?= $form->field($model, 'mime_type')->textInput(['maxlength' => 100]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'size')->textInput() ?></div>
        <div class="col-lg-6"> <?= $form->field($model, 'path')->textInput(['maxlength' => 255]) ?></div>
<div class="col-lg-6"> <?= $form->field($model, 'meta')->textInput(['maxlength' => 255]) ?></div>
    <div class="col-lg-6"> <?= $form->field($model, 'status')->textInput() ?></div>
        <div class="col-lg-6"> <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?></div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
