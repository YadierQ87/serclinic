<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\CfRadiopharmaceutical */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-radiopharmaceutical-form container-fluid">

    <?php $form = ActiveForm::begin(); ?>
<div class="col-lg-6">
    <?= $form->field($model,
        'cf_types_radiopharmaceutical_id')->dropDownList(ArrayHelper::map(app\models\CfTypesRadiopharmaceutical::find()->groupBy('name')->all(), 'id', 'name'),
        ['id'=>'select-lote','prompt'=>'-Liofilizado-','data-url' => Url::to(['selection'])]) ?>
</div>
<div class="col-lg-6 my-newselect">
 &nbsp;&nbsp; Lote <select class="form-control"><option>Seleccione Liofilizado Primero</option></select>
</div>
    <div class="col-lg-12">
        &nbsp;&nbsp;
    </div>
<div class="col-lg-6">
    <?= $form->field($model, 'name')->dropDownList(ArrayHelper::map(app\models\CfNombreRadiofarmaco::find()->all(), 'id', 'nombre'),['prompt'=>'-Radiofarmaco-'])  ?>
</div>
    <?php date_default_timezone_set('Canada/Central'); ?>
<div class="col-lg-6"><?= $form->field($model, 'marcage_datetime')->textInput(['class'=>'form-control my-date','value'=>date('Y-m-d H:i:s')]) ?></div>
<div class="col-lg-6"><?= $form->field($model, 'marcage_activity')->textInput() ?></div>
<div class="col-lg-6"><?= $form->field($model, 'marcage_volumen')->textInput() ?></div>
    <div class="col-lg-6"><?= $form->field($model, 'volumen_final')->textInput() ?></div>
<div class="col-lg-6"><?= $form->field($model, 'specialist')->dropDownList(ArrayHelper::map(app\models\CfWorker::find()->all(), 'id', 'NombreCompleto'),['prompt'=>'-Especialista-']) ?></div>
<div class="col-lg-6"><?= $form->field($model, 'status')->dropDownList([1=>'Apto',0=>'No Apto']) ?></div>
<div class="col-lg-6"> <?= $form->field($model, 'observation')->textarea() ?></div>

    <!-- div para control de la calidad --!-->
    <div class="col-lg-12 widget-box">
        <div class="col-lg-12">
            <label class="middle">
                <input type="checkbox" class="ace" name="causesBy" id="causesBy" onchange="addCausas();" >
                <span class="lbl"> Control de Calidad </span>
            </label>
        </div>
        <div class="hidden" id="causesDiv">
            <div class="col-lg-6">
                <?= $form->field($model, 'fecha_hora_calidad')->textInput(['class'=>'form-control my-date','value'=>date('Y-m-d H:i:s')]) ?></div>
            <div class="col-lg-6">
                <?= $form->field($model, 'percent_marcaje')->textInput() ?></div>
            <div class="col-lg-6">
                <?= $form->field($model, 'ph')->textInput() ?></div>
            <div class="col-lg-6">
                <?= $form->field($model, 'aspecto_organoleptico')->textInput(['maxlength' => 200]) ?></div>
        </div>
        <script type="text/javascript">
            function addCausas(){
                if($("input:checked").length == 1){
                    $("#causesDiv").removeClass("hidden");
                }
                else{
                    $("#causesDiv").addClass("hidden");
                }
            }
        </script>
    </div>
    <!-- endiv para la calidad --!-->


<div class="col-lg-12">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary pull-right' : 'btn btn-primary pull-right']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<?php   $this->registerJs("
   $(document).ready(function() {
        $('.my-date').datetimepicker({            format: 'yyyy/mm/dd hh:ii'        });
    });

    (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
    $('#cfradiopharmaceutical-marcage_volumen').validaCampo('0123456789.');
    $('#cfradiopharmaceutical-marcage_activity').validaCampo('0123456789.');
    ");  ?>
<script>
    $('#select-lote').change(function() {
        var idlio = $(this).val();
        $.get( $(this).data('url'),{idlio:idlio},
            function (data) {
                $('.my-newselect').html("<b>Lote</b>"+data);
            });
    });
</script>
