<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\CfGenerator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-generator-form container-fluid" >
    <?php $form = ActiveForm::begin([]); ?>
    <div class="col-lg-4">
    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?> </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'number')->textInput([]) ?></div>
    <div class="col-lg-4">
    <?= $form->field($model, 'batch')->textInput(['maxlength' => 50]) ?></div>
    <div class="col-lg-4">
        <?= $form->field($model, 'company')->textInput(['maxlength' => 100,'value'=>'CENTIS']) ?></div>
    <div class="col-lg-4">
        <?= $form->field($model, 'reception_datetime')->textInput(['class'=>'my-date form-control','value'=>date('Y-m-d')]) ?>   </div>
    <div class="col-lg-4">
        <?= $form->field($model,'specialist')->dropDownList(ArrayHelper::map(app\models\CfWorker::find()->all(), 'id', 'nombreCompleto'),[]); ?></div>
    <div class="col-lg-4">
        <?= $form->field($model, 'status')->dropDownList(['1'=>'Apto','0'=>'No Apto']) ?></div>
    <div class="col-lg-4">
    <?= $form->field($model, 'factory_datetime_reference')->textInput(['class'=>'my-date  form-control']) ?></div>
    <div class="col-lg-4">
    <?= $form->field($model, 'factory_activity_reference')->textInput(['maxlength' => 50]) ?></div>
    <div class="col-lg-4">
        <?= $form->field($model, 'factory_production_datetime')->textInput(['class'=>'my-date form-control']) ?></div>
    <div class="col-lg-4">
        <?= $form->field($model, 'factory_expiracion_datetime')->textInput(['class'=>'my-date form-control']) ?></div>
    <div class="col-lg-4">
        <?= $form->field($model, 'waste_datetime')->textInput(['class'=>'my-date form-control']) ?></div>
    <div class="col-lg-4">
        <?= $form->field($model, 'dosis1m_recepcion')->textInput(['maxlength' => 50]) ?></div>
    <div class="col-lg-4">
        <?= $form->field($model, 'dosis1m_desecho')->textInput(['maxlength' => 50]) ?></div>
    <div class="col-lg-4">
        <?= $form->field($model, 'frotis_recepcion')->textInput(['maxlength' => 50]) ?></div>
    <div class="col-lg-4">
    <?= $form->field($model, 'observation')->textarea(['rows' => 6,]) ?></div>
    <div class="col-lg-4">
    <div class="hidden"><?= $form->field($model, 'datetime_r')->textInput(['class'=>'my-date form-control','value'=>date('Y-m-d H:mm:s')]) ?></div>
    <div class="hidden"><?= $form->field($model, 'username')->textInput(['value'=>Yii::$app->user->identity->username]) ?></div>
        </div>
    <div class="col-lg-12">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php   $this->registerJs("
           $(document).ready(function() {
        $('.my-date').datetimepicker({
        format: 'yyyy/mm/dd H:m:s',
        weekStart: 2,        todayBtn:  1,
		autoclose: 1,		todayHighlight: 1,
		startView: 2,
        });
    });
    (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
     ");  ?>
