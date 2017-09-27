<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use app\models\CfPatient;

use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CfPatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historial de Pacientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-patient-historial-index">

    <h3> Historial</h3>
    <h4> Nombre: <?= $model->fullname ?>  CI: <?= $model->personal_id ?> </h4>



      <?php    Modal::begin([
        'id' => 'modal-mesa',
    ]);
    echo "<div class='well'></div>";
    Modal::end();    ?>


    <?= Html::beginForm(['index'], 'post', ['data-pjax' => '0']); ?>
    <div class="input-group custom-search-form col-lg-3" style="float: right;margin-top: 25px;">
        <input class="form-control" placeholder="Search..." type="text"
               id="my-search" name="my-search" value="<?=Yii::$app->request->post('my-search')?>">
                                <span class="input-group-btn" >
                                    <?= Html::submitButton(" <i class='fa fa-search'></i>", ['class' => 'btn btn-default',
                                        'name' => 'refreshButton','id' => 'refreshButton','style'=>'height:34px; ']) ?>
                            </span>
    </div>
    <?= Html::endForm(); ?>
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
           /* [
                'attribute' => 'cf_patient_id',                'format' => 'raw',
                'value' => function($data)                {
                    return $data->cfPatient->fullname;
                }
            ],*/
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
                'template' => '{detail} ','header'=>'Acciones',
                'buttons' =>
                    [
                        'detail' => function ($url, $model, $key)                        {
                            return Html::a('<span class="fa fa-eye"></span>', '#', [
                                'id' => 'actv-crear',
                                'data-title'=>html_entity_decode("Informe Turno:"." ".$model->id),
                                'data-toggle' => 'modal-mesa',
                                'data-target' => '#modal-mesa',
                                'title'=>'Detalles',
                                'data-url' => Url::to(['reporte', 'id' => $model->id]),
                                'data-pjax' => '0',
                            ]);
                        },





                    ]
            ],
        ],
    ]); ?>

    <?php
    $btn = '<i class="fa fa-close close" data-dismiss=modal aria-hidden=true></i>';
    $tag = "<h4>"; $tag2 = "</h4>";
    $this->registerJs("
            $(document).on('click', '#actv-crear', (function() {
            var titulo = $(this).data('title');
        $.get(            $(this).data('url'),
            function (data) {
                $('#modal-mesa .modal-body').html(data);
                $('#modal-mesa .modal-dialog').addClass('modal-lg')
                $('.modal-header').html('$tag' + titulo + '$btn' + '$tag2');
                $('#modal-mesa').modal();
            });    })    );


             $('#my-search').keyup(function(event){
                  $('#refreshButton').submit();
              });

            ");            ?>

</div>
