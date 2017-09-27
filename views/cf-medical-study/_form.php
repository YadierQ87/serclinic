<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CfMedicalStudy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-medical-study-form container-fluid">

    <?php $form = ActiveForm::begin([    ]); ?>
    <div class="col-lg-4"> <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?></div>
    <div class="col-lg-4">     <?= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(app\models\CfMedicalStudy::find()->all(), 'id', 'name'),['prompt'=>'Ninguno']) ?>    </div>
    <div class="col-lg-2">     <?= $form->field($model, 'tipo_moneda')->dropDownList(['CUP'=>'CUP','CUC'=>'CUC']) ?>    </div>
    <div class="col-lg-2">     <?= $form->field($model, 'price')->textInput() ?>    </div>
    <div class="col-lg-12">
    <label class="control-label">Planificaci&oacute;n Semanal</label>
    <table class="table table-condensed table-responsive table-bordered">
        <thead>
        <tr>
            <th title="Lunes">
                <translate>L</translate>
            </th>
            <th title="Martes">
                <translate>M</translate>
            </th>
            <th title="Miércoles">
                <translate>M</translate>
            </th>
            <th title="Jueves">
                <translate>J</translate>
            </th>
            <th title="Viernes">
                <translate>V</translate>
            </th>
            <th title="Sábado">
                <translate>S</translate>
            </th>
            <th title="Domingo">
                <translate>D</translate>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <input class="form-control input-sm validar" placeholder="0" type="text" id="lunes" name="lunes">
            </td>
            <td>
                <input class="form-control input-sm validar" placeholder="0" type="text" id="martes" name="martes">
            </td>
            <td>
                <input class="form-control input-sm validar"  placeholder="0" type="text" id="miercoles" name="miercoles">
            </td>
            <td>
                <input class="form-control input-sm validar"  placeholder="0" type="text" id="jueves" name="jueves">
            </td>
            <td>
                <input class="form-control input-sm validar" placeholder="0" type="text" id="viernes" name="viernes">
            </td>
            <td>
                <input class="form-control input-sm validar"  placeholder="0" type="text" id="sabado" name="sabado">
            </td>
            <td>
                <input class="form-control input-sm validar"  placeholder="0" type="text" id="domingo" name="domingo">
            </td>
        </tr>
        </tbody>
    </table></div>

    <div class="col-lg-4"> <label class="control-label">   Zonas de administraci&oacute;n de dosis </label>
        <?= Html::dropDownList('select-dosis','', ArrayHelper::map(app\models\CfCodZonas::find()->all(),'nombre_lugar','nombre_lugar'),
            ['class'=>'mymultiple','id'=>'select-dosis','multiple'=>'multiple']) ?>
        <input type="hidden" id="h_zonas" name="h_zonas" value="">
    </div>

    <div class="col-lg-4"> <label class="control-label"> Seleccione    Radiof&aacute;rmacos</label>
        <?= Html::dropDownList('select-radio','', ArrayHelper::map(app\models\CfNombreRadiofarmaco::find()->groupBy('nombre')->all(),'id','nombre'),
            ['class'=>'mymultiple','id'=>'select-radio','multiple'=>'multiple']) ?>
        <input type="hidden" id="h_nombre_radio" name="h_nombre_radio" value="">
    </div>

    <div class="col-lg-4">
        <?= $form->field($model, 'dosis_sugerida')->textInput([]) ?>
    </div>

    <div class="col-lg-12">&nbsp;</div>
    </br></br>

    <div class="form-inline col-lg-12 panel hidden">
        <label class="control-label"> Pasos del Estudios </label>
        <div class="form-group">
            <?= Html::dropDownList('select-proceso','', ArrayHelper::map(app\models\CfCodProceso::find()->all(),'id','nombre'), ['prompt'=>'Seleccione Proceso']) ?>
        </div>
        <div class="form-group">
            <input class="form-control"  placeholder="Introducir dias-proceso" type="text" name="cantDias" id="cantDias">
        </div>
        <button type="button" class="btn btn-primary btn-sm no-border"  title="Insertar" id="insertarProc">
            <span class="ace-icon fa fa-plus icon-on-right bigger-110"></span>
        </button>
        <input type="hidden" id="h_Procesos" value="" name="h_Procesos">
        <div id="MostrarProc"><?php #mostrar los procesos ?>    </div>
    </div>
    </br>

    <div class="hidden"><?= $form->field($model, 'status')->textInput(['value'=>1]) ?></div>
    <div class="hidden"> <?= $form->field($model, 'username')->textInput(['value'=>Yii::$app->user->identity->username]) ?>  </div>
    <div class="hidden"> <?= $form->field($model, 'datetime_r')->textInput(['value'=>date('Y-m-d')]) ?>  </div>
    <div class="col-lg-8"><?= $form->field($model, 'observation')->textarea(['row'=>6]) ?></div>
    <div class="col-lg-2"><?= $form->field($model, 'is_dinamic')->dropDownList(['No'=>'No','Si'=>'Si']) ?></div>
    <div class="col-lg-12">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary pull-right' : 'btn btn-primary pull-right']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <style>
        .my-label {
            margin-top: 3px;
            padding: 5px !important;
        }
    </style>
    <?php
    $tag = '<div class="well well-xs my-label col-lg-12 control-label">';
    $tag2 = ' <i class="fa fa-trash btn btn-xs btn-danger" id="remove" onclick="$(this).parent().remove()"></i> </div>';
    $this->registerJs("
        $('.mymultiple').change(function() {
            todoselect1();
        }).multipleSelect({            width: '100%'        });

        function todoselect1(){
            elementos = document.getElementById('select-dosis');
            longitud = document.getElementById('select-dosis').length;

            j=0; arreglo = new Array();
            for (var i = 0; i < longitud; i++){
                if( elementos[i].selected == true)            {
                    console.log(elementos[i].value);
                    //$('.ms-drop > ul').children();
                    arreglo[j] = elementos[i].value; j++;
                }
            }
            document.getElementById('h_zonas').value = arreglo;
        }

        $('#select-radio').change(function() {    todoselect2();    }).multipleSelect({            width: '100%'        });

        function todoselect2(){
            elementos = document.getElementById('select-radio');
            longitud = document.getElementById('select-radio').length;

            j=0; arreglo = new Array();
            for (var i = 0; i < longitud; i++){
                if( elementos[i].selected == true)            {
                    console.log(elementos[i].value);
                    //$('.ms-drop > ul').children();
                    arreglo[j] = elementos[i].value; j++;
                }
            }
            document.getElementById('h_nombre_radio').value = arreglo;
        }

        (function(a){a.fn.validaCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
        $('#cantDias').validaCampo('0123456789');
        $('.validar').validaCampo('0123456789');
        $('#cfmedicalstudy-price').validaCampo('0123456789,');

        $('#insertarProc').click(function() {
        var process= $('select[name=select-proceso]').val();
        var dia= $('input[name=cantDias]').val();
        var pro=$('select[name=select-proceso] option:selected').text();
        var lista=$('#h_Procesos').val();
        if(process != '' && dia != ''){
            $('#MostrarProc').append('$tag Proceso:' + pro + ' Dias: ' + dia + '$tag2' );
            $('#h_Procesos').val(lista  + process + ',' + dia+ ';');
        }
       });         ");            ?>
</div>
<script>
    /* $('#insertarProc').click(function() {
     var process= $('select[name=select-proceso]').val();
     var dia= $('input[name=cantDias]').val();
     var pro=$('select[name=select-proceso] option:selected').text();
     var lista=$('#h_Procesos').val();
     if(process != '' && dia != ''){
     $('#MostrarProc').append('$tag Proceso:' + pro + ' Dias: ' + dia + '$tag2' );
     $('#h_Procesos').val(lista  + process + ',' + dia+ ';');
     }
     });*/
</script>