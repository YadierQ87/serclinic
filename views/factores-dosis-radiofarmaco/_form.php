<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\FactoresDosisRadiofarmaco */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factores-dosis-radiofarmaco-form container-fluid">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-3">
        <?= $form->field($model, 'organo_critico')->textInput(['maxlength' => 250]) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'id_radiofarmaco')->dropDownList(ArrayHelper::map(app\models\CfNombreRadiofarmaco::find()->all(), 'id', 'nombre')) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'dosis_efectiva_0a2')->textInput(['class'=>'classnumber']) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'dosis_efectiva_3a7')->textInput(['class'=>'classnumber']) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'dosis_efectiva_8a12')->textInput(['class'=>'classnumber']) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'dosis_efectiva_13a18')->textInput(['class'=>'classnumber']) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'dosis_efectiva_hombre')->textInput(['class'=>'classnumber']) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'dosis_efectiva_mujer')->textInput(['class'=>'classnumber']) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'dosis_org_crit_0a2')->textInput(['class'=>'classnumber']) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'dosis_org_crit_3a7')->textInput(['class'=>'classnumber']) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'dosis_org_crit_8a12')->textInput(['class'=>'classnumber']) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'dosis_org_crit_13a18')->textInput(['class'=>'classnumber']) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'dosis_org_crit_hombre')->textInput(['class'=>'classnumber']) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'dosis_org_crit_mujer')->textInput(['class'=>'classnumber']) ?>
    </div>
    <div class="col-lg-6">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::resetInput('Cancel',['class' => 'btn btn-warning']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<script>
    (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
    $('.classnumber').validaCampo('0123456789.');
</script>