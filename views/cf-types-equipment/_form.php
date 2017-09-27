<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\CfTypesEquipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-types-equipment-form container-fluid" >

    <?php $form = ActiveForm::begin([
        "method" => "post",
        "enableClientValidation" => true,
        "options" => ["enctype" => "multipart/form-data",],
    ]); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => 100,]) ?>

        <?= $form->field($model, 'status')->dropDownList(['1'=>"Apto","0"=>"No Apto"]) ?>

        <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?>


    <div class="col-lg-6 hidden"><?= $form->field($model, 'datetime_r')->textInput(['class'=>'my-date form-control','value'=>date('Y-m-d H:mm:s')]) ?></div>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'username')->textInput(['value'=>Yii::$app->user->identity->username]) ?></div>

    <div class="col-lg-12"  style="margin-top: 20px">
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
<script>

    $(document).ready(function() {
        $('.my-date').datetimepicker({            format: 'YYYY/MM/DD'        });
    });


    (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
    //$('#cfpatient-telephone').validaCampo('0123456789');
    //$('#cfpatient-personal_id').validaCampo('0123456789');
</script>