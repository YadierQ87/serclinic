<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel app\models\CfReceptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="cf-reception-index">


    <?php    Modal::begin([
        'id' => 'modal-mesa',
    ]);
    echo "<div class='well'></div>";
    Modal::end();    ?>

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
            // 'date_remission',
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
                'template' => '{detail} {recepcionar}{posponer}{cancelar} ','header'=>'Acciones',
                'buttons' =>
                    [
                        'detail' => function ($url, $model, $key)                        {
                            return Html::a('<span class="fa fa-eye"></span>', '#', [
                                'id' => 'actv-crear',
                                'data-title'=>html_entity_decode("Ver Datos del Turno:"." ".$model->id),
                                'data-toggle' => 'modal-mesa',
                                'data-target' => '#modal-mesa',
                                'data-url' => Url::to(['view', 'id' => $model->id]),
                                'data-pjax' => '0',
                            ]);
                        },
                        'recepcionar' => function ($url, $model, $key)                        {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                'id' => 'actv-crear',
                                'data-title'=>html_entity_decode("Actualizar Turno:"." ".$model->id),
                                'data-toggle' => 'modal-mesa',
                                'data-target' => '#modal-mesa',
                                'data-url' => Url::to(['update', 'id' => $model->id]),
                                'data-pjax' => '0',
                                'style'=>'margin:5px'
                            ]);
                        },
                        'posponer' => function ($url, $model, $key)                        {
                            return Html::a('<span class="glyphicon glyphicon-sort-by-attributes"></span>', '#', [
                                'id' => 'actv-crear',
                                'data-title'=>html_entity_decode("Posponer Turno:"." ".$model->id),
                                'data-toggle' => 'modal-mesa',
                                'data-target' => '#modal-mesa',
                                'data-url' => Url::to(['posponer', 'id' => $model->id]),
                                'data-pjax' => '0',
                            ]);
                        },
                        'cancelar' => function ($url, $model, $key)                        {
                            return Html::a('<span class="glyphicon glyphicon-remove-sign"></span>', ['cancel', 'id' => $model->id], [
                                'id' => 'actv-crear',
                                'style'=>'margin-left:5px',
                                'data' => [
                                    'confirm' => 'Seguro desea cancelar la consulta?',
                                    'method' => 'post',
                                ],

                            ]);
                        },
                    ]
            ],
        ],
    ]); ?>

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



$('#recep').css({'background-color':'#84B3DC','border-color':'#84B3DC'});

            $(document).on('click', '#recep', (function() {

        $.get( $(this).data('url'),  function (data) {

         $('#aRecep').css({'background-color':'#84B3DC','border-color':'#84B3DC'});
         $('#recep').css({'background-color':'#428BCA','border-color':'#428BCA'});

        })}))

                 $(document).on('click', '#aRecep', (function() {
              $.get( $(this).data('url'),  function (data) {

        $('#recep').css({'background-color':'#84B3DC','border-color':'#84B3DC'});
         $('#aRecep').css({'background-color':'#428BCA','border-color':'#428BCA'});

        })}))


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




            ");            ?>


