<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfCodZonas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-cod-zonas-form container-fluid">


    <?php $form = ActiveForm::begin([
        "method" => "post",

        "enableClientValidation" => true,
        "options" => ["enctype" => "multipart/form-data",],


    ]); ?>

        <?= $form->field($model, 'nombre_lugar')->textInput(['maxlength' => 150,'required'=>'required']) ?>

    <div class="col-lg-12">

        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary pull-right' : 'btn btn-primary pull-right']) ?>

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
