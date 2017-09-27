<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\CfNombreHospitales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-nombre-hospitales-form container-fluid">

    <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'nombre')->textInput(['maxlength' => 200]) ?>
  <?= $form->field($model, 'direccion')->textInput(['maxlength' => 200]) ?>


    <label for="provincia">Seleccione Provincia</label>
    <?= Html::dropDownList('provincia','',ArrayHelper::map(app\models\CfProvincias::find()->all(), 'id', 'nombre'),
        ['id'=>'select-prov','class'=>'form-control ','prompt'=>'-Provincia-','data-url' => Url::to(['selection'])]) ?>

  <div class=" my-newselect" style='margin-top: 10px'>
    <label class="control-label  " > Municipios <select class="form-control" style="margin-top: 5px"><option>Seleccione Provincia Primero</option></select></label>

  </div>



    <div class="col-lg-12">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php   $this->registerJs("
            $('#select-prov').change(function() {
    var idprov = $(this).val();
    $.get( $(this).data('url'),{idprov:idprov},
        function (data) {
          $('.my-newselect').html('<label class=control>Municipios</label>'+data);
        });
  });
           ");  ?>

