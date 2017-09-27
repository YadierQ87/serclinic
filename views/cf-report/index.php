<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel app\models\CfReceptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Informar';
$this->params['breadcrumbs'][] = $this->title;

if(!isset($fecha)){
    $fecha=Yii::$app->request->post('h_date');}


?>

<div class="cf-reception-index">




    <h3 class="pull-left" style="color: #2679B5"><?= Html::encode($this->title) ?></h3>
      <span class=" pull-left" style="margin:10px">
<div class="col-lg-5">
    <?= Html::beginForm(['reportado'], 'post', ['data-pjax' => '0']); ?>

    <?= Html::submitButton(" Reportados", ['class' => 'btn btn-primary ',
        'name' => 'recep','id' => 'recep']) ?>

    <?= Html::endForm(); ?>
</div>
<div class="col-lg-2">
    <?= Html::beginForm(['index'], 'post', ['data-pjax' => '0']); ?>

    <?= Html::submitButton(" A Reportar", ['class' => 'btn btn-primary','name' => 'aRecep','id' => 'aRecep','style'=>'margin-left:-7px']) ?>

    <?= Html::endForm(); ?>
</div>
      </span>

    <?php    Modal::begin([
        'id' => 'modal-mesa',
    ]);
    echo "<div class='well'  ></div>";
    Modal::end();    ?>
    <div class="row ">
        <?= Html::beginForm(['busqueda'], 'post', ['data-pjax' => '0','id'=>'formSearch']); ?>
        <div class="input-group custom-search-form col-lg-3 pull-right" style="margin-top: 25px;margin-right: 15px;">
            <input class="form-control" placeholder="Buscar..." type="text"
                   id="my-search" name="my-search" value="<?=Yii::$app->request->post('my-search')?>">
            <input type="hidden" id="h_fecha" name="h_fecha" value='' >

            <input class="h_tipo" type="hidden" id="h_tipo2" name="h_tipo" value="">
                         <span class="input-group-btn">
                           <?= Html::submitButton(" <i class='fa fa-search'></i>", ['class' => 'btn btn-default',
                               'name' => 'refreshButton','id' => 'refreshButton','style'=>'height:34px']) ?>
                            </span>

            <?= Html::endForm(); ?></div>
        <?= Html::beginForm(['fechax'], 'post', ['data-pjax' => '0']); ?>

        <div class="col-lg-2 pull-right" style="margin-top: 25px">

            <div class="input-group custom-search-form" >

				<span class="input-group-addon">
				    <i class="fa fa-calendar bigger-110"></i>
				</span>

                <input class="form-control" type="text" name="date-range-picker" id="id-date-range-picker-1" />
                <input type="hidden" id="h_date" name="h_date" value='' >
                <input class="h_tipo" type="hidden" id="h_tipo" name="h_tipo" value="">
            <span class="input-group-btn" >
                           <?= Html::submitButton(" <i class='fa fa-search'></i>", ['class' => 'btn btn-default',
                               'name' => 'rangoFecha','id' => 'rangoFecha','style'=>'height:34px']) ?>
                            </span>
            </div>
        </div>
        <?= Html::endForm(); ?>


    </div>
    <?php Pjax::begin();?>
    <div id="gridChance">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary'=>'',
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                    'attribute' => 'cf_medical_study_id',                'format' => 'raw',
                    'value' => function($data)                {
                        return $data->cfMedicalStudy->name;
                    }
                ],
                [
                    'attribute' => 'cf_patient_id',                'format' => 'raw',
                    'value' => function($data)                {
                        return $data->cfPatient->fullname;
                    }
                ],
                'date_turn',
                'hour_turn',
                'off_calendar',
                // 'doctor_makes_referral_id',
                //'doctor_makes_referral_name',
                // 'doctor_makes_referral_email:email',
                //'hospital_makes_referral_name',
                // 'applicant_makes_referral_data:ntext',
                // 'date_remission',
                // 'planning_process_medical_consultation:ntext',
                // 'real_process_medical_consultation:ntext',
                'size',
                'weight',
                // 'indication:ntext',
                // 'price:ntext',
                'status',
                // 'causes:ntext',
                // 'is_external',
                'age',
                // 'observation:ntext',
                // 'datetime_w',
                // 'datetime_r',
                // 'username',
                /* [
                     'attribute' => 'specialist',                'format' => 'raw',
                     'value' => function($data)                {
                         return $data->especialista->nombreCompleto;
                     }
                 ],*/

                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{detail} {reportar} ','header'=>'Acciones',
                    'buttons' =>
                        [
                            'detail' => function ($url, $model, $key)                        {
                                return Html::a('<span class="fa fa-eye"></span>', '#', [
                                    'id' => 'actv-crear',
                                    'data-title'=>html_entity_decode("Ver Datos del Turno:"." ".$model->id),
                                    'data-toggle' => 'modal-mesa',
                                    'data-target' => '#modal-mesa',
                                    'title'=>'Detalles',
                                    'data-url' => Url::to(['view', 'id' => $model->id]),
                                    'data-pjax' => '0',
                                ]);
                            },

                            'reportar' => function ($url, $model, $key)                        {
                                return Html::a('<span class="fa fa-pencil-square-o"></span>', '#', [
                                    'id' => 'actv-crear',
                                    'data-title'=>html_entity_decode("Preparar Informe:"." ".$model->id),
                                    'title'=>html_entity_decode("Preparar Informe"),
                                    'data-toggle' => 'modal-mesa',
                                    'data-target' => '#modal-mesa',
                                    'data-url' => Url::to(['create', 'id' => $model->id]),
                                    'data-pjax' => '0',
                                    'style'=>'margin:5px'
                                ]);
                            },

                            /* 'update' => function ($url, $model, $tipo)                        {
                                 if(!is_null($tipo)){
                                 return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                     'id' => 'actv-crear',
                                     'data-title'=>html_entity_decode("Administar Dosis:"." ".$tipo),
                                     'data-toggle' => 'modal-mesa',
                                     'data-target' => '#modal-mesa',
                                     'data-url' => Url::to(['update', 'id' => $model->dosificado]),
                                     'data-pjax' => '0',
                                     'style'=>'margin:5px'
                                 ]);
                                 }},*/

                        ]
                ],
            ],
        ]); ?>
    </div>
    <?php Pjax::end();?>
</div>
<?php

$btn = '<i class="fa fa-close close" data-dismiss=modal aria-hidden=true></i>';
$tag = "<h4>"; $tag2 = "</h4>";
$this->registerJs("

    $('.my-date2').datetimepicker({
        format: 'yyyy/mm/dd',
        weekStart: 2,        todayBtn:  1,
		autoclose: 1,		todayHighlight: 1,
		startView: 2, minView:2,
        });


/*$('#my-rangoFecha').change(function(){

var a=$('#my-rangoFecha').val();
$('#my-rangoFecha2').attr('disabled', false);
$('#my-rangoFecha2').datetimepicker({
        format: 'yyyy/mm/dd',
        weekStart: 2,        todayBtn:  1,
		autoclose: 1,		todayHighlight: 1,
		startView: 2, minView:2,

        });

});*/

document.getElementById('id-date-range-picker-1').value = '$fecha';
document.getElementById('h_fecha').value = '$fecha';
document.getElementById('h_tipo2').value = '$tipo';


if('$tipo'=='Procesado'){
$('#aRecep').addClass('active');
}
else {
 $('#recep').addClass('active');
};

$('#rangoFecha').click(function(){
var fechai=$('#id-date-range-picker-1').val();
document.getElementById('h_date').value = fechai;
document.getElementById('h_tipo').value = '$tipo';

})



               $(document).on('click', '#actv-crear', (function() {
            var titulo = $(this).data('title');
        $.get(            $(this).data('url'),
            function (data) {
             $('#modal-mesa .modal-dialog').addClass('modal-lg')
                $('#modal-mesa .modal-body').html(data);
                $('.modal-header').html('$tag' + titulo + '$btn' + '$tag2');
                $('#modal-mesa').modal();
            });    })    );


             $('#my-search').keyup(function(event){
                  $('#refreshButton').submit();
              });


$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
					    format: 'YYYY/MM/DD',
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});



            ");            ?>

