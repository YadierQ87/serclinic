<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfActivimetro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-activimetro-form container-fluid">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-6"> <?= $form->field($model, 'fecha_medicion')->textInput(['class'=>'my-date form-control']) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'fondo_act')->textInput() ?> </div>
    <div class="col-lg-12"></div>
    <div class="col-lg-6"><?= $form->field($model, 'actv_fuente_patron')->textInput() ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'actv_estandar')->textInput() ?></div>
    <div class="col-lg-12">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php   $this->registerJs("
           $(document).ready(function() {
        $('.my-date').datetimepicker({
        format: 'yyyy/mm/dd',
        weekStart: 2,        todayBtn:  1,
		autoclose: 1,		todayHighlight: 1,
		startView: 2, minView: 2,
        });
    });
           (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);

           ");  ?>
