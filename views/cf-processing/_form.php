<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CfProcessing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-processing-form container-fluid">

    <?= $this->render('/cf-medical-consultation/_details',['mcf'=>$mcf]); ?>
<div class="widget-box container-fluid">
    <?php $form = ActiveForm::begin([
        "method" => "post",
        "enableClientValidation" => true,
        "options" => ["enctype" => "multipart/form-data"],
    ]); ?>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'cf_medical_consultation_id')->textInput(['value'=>$mcf->id]); ?> </div>
    <div class="col-lg-12"><?= $form->field($model, 'specialist')
            ->dropDownList(ArrayHelper::map(app\models\CfWorker::find()->all(), 'id', 'nombreCompleto'),[]); ?></div>
    <!-- cargar Imagen !-->
    <div class="col-lg-6">
        <label class="ace-file-input ace-file-multiple col-lg-12" style="cursor: pointer; border-radius: 2px;
             border: solid rosybrown; border-style: dashed; padding-top: 6px; padding-bottom:6px;  ">
            <input id="fichero_jpg" name="fichero_jpg" type="file" class="file-change"
                   onchange="showimagepreview(this)">
            <div class="dz-default dz-message" >
                <b style="color: #595959 !important;">
                    <i class="blue ace-icon fa fa-cloud-upload"></i>   Cargar Imagen <i class="blue ace-icon fa fa-cloud-upload"></i>
                </b>
            </div>
        </label>
        <div class="panel hide-placeholder selected col-lg-12" id="ace-file-container">
            <h5><i class="red fa fa-file-image-o"></i> Imagen Cargada</h5>
            <div class='progress progress-striped active hidden'>
                <div class='progress-bar progress-bar-yellow' style='width: 60%'>       </div>
            </div>
        </div>
    </div>


    <div class="col-lg-6"> <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?></div>
    <div class="col-lg-6 hidden"> <?= $form->field($model, 'datetime_w')->textInput(['class'=>' my-date form-control','value'=>date('Y-m-d')]) ?></div>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'datetime_r')->textInput(['class'=>' my-date form-control','value'=>date('Y-m-d')]) ?></div>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'username')->textInput(['value'=>Yii::$app->user->identity->username]) ?></div>
    <div class="col-lg-6 hidden"><?= $form->field($model, 'status')->textInput(['value' =>'1']) ?></div>
    <div class="col-lg-6">
        <label class="middle">
            <input type="checkbox" class="ace" name="causesBy" id="causesBy" onchange="addCausas();" >
            <span class="lbl"> Rechazar Imagen </span>
        </label>
        <div class="hidden" id="causesDiv"><?= $form->field($model, 'causes')->textarea(['rows' => 6]) ?></div>
    </div>
        <div class="col-lg-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
  </div>
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
    $('#cfpatient-telephone').validaCampo('0123456789');
    $('#cfpatient-personal_id').validaCampo('0123456789');
           ");  ?>

<script type="text/javascript">
    function addCausas(){
        if($("input:checked").length == 1){
           $("#causesDiv").removeClass("hidden");
           $("#cfprocessing-status").val('0');
        }
        else{
           $("#causesDiv").addClass("hidden");
           $("#cfprocessing-status").val('1');
        }
    }

    function showimagepreview(input) {
        $(".progress-striped").removeClass('hidden');
        if (input.files && input.files[0]) {
            for(var i = 0; i < input.files.length ; i++) {
                var reader = new FileReader();
                var newfile = input.files[i];
                reader.onload = function (e) {
                    var contents = e.target.result;
                    var myhtml = "<div class='container-fluid row col-lg-4 tags'>"
                        +  "<div class='cboxElement col-lg-12'  title='" + newfile.name + "' >"
                        +  "<img alt='150x150' src='" + contents + "' height='140' width='150'></div>"
                        +  "<div class='col-lg-12'><span class='label-holder'>"
                        +  "<span class='label label-info'>type:" + newfile.type + "</span></span>"
                        +  "<span class='label-holder'><span class='label label-danger'>size:" + newfile.size + " bytes</span>"
                        +  "</div></span></div>";
                    $("#ace-file-container").append(myhtml);
                }
                reader.readAsDataURL(input.files[i]);
            }   //endfor
            reader.onloadend = function(){
                $(".progress-striped").addClass('hidden');
            }
        }//endif input vacio
    }

    function remover(input){
        $(input).parent().remove();
        console.log('black');
    }
</script>
