<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CfWorker */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-worker-form container-fluid"  >


    <?php $form = ActiveForm::begin([
        "method" => "post",
        "enableClientValidation" => true,
        "options" => ["enctype" => "multipart/form-data",],
    ]); ?>

    <div class="col-lg-12">
        <div class="col-lg-4">
            <?= $form->field($model, 'firstname')->textInput(['maxlength' => 100,'required'=>'required',]) ?> </div>
        <div class="col-lg-4"> <?= $form->field($model, 'lastname' )->textInput(['maxlength' => 100,'required'=>'required',]) ?></div>
        <div class="col-lg-4"> <?= $form->field($model, 'personal_id')->textInput(['maxlength' => 50,'required'=>'required',]) ?></div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-4"> <?= $form->field($model, 'entity_id')->textInput(['maxlength' => 50,]) ?></div>
        <div class="col-lg-4"> <?= $form->field($model, 'date_birth')->textInput(['class'=>'my-date form-control ']) ?></div>

        <div class="col-lg-4" style="margin-bottom: 20px; ">
            <label   for="fichero_jpg">Foto</label>  <input type="file" id="fichero_jpg" name="fichero_jpg"  >
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-4"><?= $form->field($model, 'email')->textInput(['maxlength' => 255,]) ?></div>

        <div class="col-lg-4">  <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(app\models\User::find()->all(),'id','username'), ['prompt'=>'Seleccione usuario',]) ?></div>

        <div class="col-lg-4"><?= $form->field($model, 'is_toe')->dropDownList(['0'=>'No','1'=>'Si']) ?></div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-4">

            <?= $form->field($model, 'category')->textInput(['maxlength' => 255,]) ?></div>
        <div class="col-lg-4">
            <?= $form->field($model, 'nationality')->dropDownList(['CUB'=>'CUB']) ?></div>

        <div class="col-lg-4">
            <?= $form->field($model, 'town')->dropDownList(ArrayHelper::map(app\models\CfProvincias::find()->all(), 'id', 'nombre'),
                ['id'=>'select-prov','prompt'=>'-Provincia-','data-url' => Url::to(['selection'])]) ?></div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-4">
            <div class=" my-newselect" >
                <label  for="Municipio">Municipio</label> <select  style="" class="form-control " id="Municipio"><option>Seleccione Provincia Primero</option></select>
            </div></div>
        <div class="col-lg-4">
            <?= $form->field($model, 'telephone')->textInput(['maxlength' => 100]) ?></div>
        <div class="col-lg-4">
            <?= $form->field($model, 'sex')->dropDownList(['1'=>'F','0'=>'M'],['required'=>'required']) ?></div>
    </div>
    <div class="col-lg-6" style="margin-left: 15px">
        <?= $form->field($model, 'observation')->textarea(['rows' => 6,]) ?></div>


    <div class=" hidden"> <?= $form->field($model, 'status')->textInput(['value'=>1,]) ?></div>
    <div class=" hidden">    <?= $form->field($model, 'datetime_r')->textInput(['class'=>'my-date form-control','value'=>date('Y-m-d H:mm:s')]) ?></div>
    <div class=" hidden">    <?= $form->field($model, 'username')->textInput(['maxlength' => 255,'value'=>Yii::$app->user->identity->username]) ?></div>
    <div class=" hidden"><?= $form->field($model, 'fos_user_id')->textInput(['maxlength' => 50]) ?></div>



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
    $('#select-prov').change(function() {
        var idprov = $(this).val();
        $.get( $(this).data('url'),{idprov:idprov},
            function (data) {
                $('.my-newselect').html("<label>Municipio</label>"+data);
            });
    });
</script>
