<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfHistoryLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-history-log-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-6"><?= $form->field($model, 'entity')->textInput(['maxlength' => 100]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'section')->textInput(['maxlength' => 100]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'level')->textInput(['maxlength' => 100]) ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'username')->textInput(['value'=>Yii::$app->user->identity->username]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'user_id')->textInput(['value'=>Yii::$app->user->identity->id]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'user_ip_source')->textInput($_SERVER['REMOTE_ADDR']) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'action')->textInput(['maxlength' => 100]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'field_name')->textInput(['maxlength' => 100]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'old_value')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'new_value')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'datetime')->textInput(['class'=>'my-date form-control']) ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'msg')->textarea(['rows' => 6]) ?></div>
  <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="js/jquery.js"></script>
<script>

    $(document).ready(function() {
        $('.my-date').datetimepicker({            format: 'YYYY/MM/DD'        });
        //$('.my-date').datetimepicker({            format: 'YYYY/MM/DD'        });
    });


    (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
    $('#cfpatient-telephone').validaCampo('0123456789');
    $('#cfpatient-personal_id').validaCampo('0123456789');
</script>