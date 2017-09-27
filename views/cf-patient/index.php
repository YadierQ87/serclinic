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

$this->title = 'Pacientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-patient-index">

    <h3 class="pull-left" style="color: #2679B5"><?= Html::encode($this->title) ?>
        <?= Html::a('<i class="fa fa-user-times"></i> Adicionar Paciente','#',['id' => 'actv-crear',
            'data-toggle' => 'modal-mesa',
            'data-target' => '#modal-mesa',
            'data-url' => Url::to(['create']),
            'data-title'=>html_entity_decode("Adicionar Paciente"),
            'class' => 'btn btn-primary'
        ]);
        ?>
    </h3>
    <?php    Modal::begin([
        'id' => 'modal-mesa',
        'header' => "<h4 class='modal-title'> Registrar Paciente </h4>",
    ]);
    echo "<div class='well'></div>";
    Modal::end();    ?>

      <?php Pjax::begin() ?>
    <?= Html::beginForm(['index'], 'post', ['data-pjax' => '0']); ?>
    <div class="input-group custom-search-form col-lg-3" style="float: right;margin-top: 25px;">
        <input class="form-control" placeholder="Search..." type="text"
               id="my-search" name="my-search" value="<?=Yii::$app->request->post('my-search')?>">
                                <span class="input-group-btn">
                                    <?= Html::submitButton(" <i class='fa fa-search'></i>", ['class' => 'btn btn-default',
                                        'name' => 'refreshButton','id' => 'refreshButton','style'=>'height:34px']) ?>
                            </span>
    </div>
    <?= Html::endForm(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'summary'=>'',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            //'cf_media_id',
            [
                'attribute' => 'foto',                'format' => 'raw',
                'value' => function($data)                {
                    return "<img class='photo-thumb gritter-image' src='".$data->photo."'/>";
                }
            ],
            'personal_id',
            'firstname',
            'lastname',
            // 'photo',
            // 'up_date',
             'date_birth',
            // 'medical_record_id',
            // 'medical_record:ntext',
             'email:email',
            // 'notification_email:email',
             'telephone',
             'sex',
            // 'status',
            // 'observation:ntext',
             'nationality:ntext',
            // 'town:ntext',
            // 'region:ntext',
            // 'datetime_r',
            // 'username',
            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Acciones',
                'template' => '{detail} {actualizar} {historial} {delete} ',
                'buttons' =>
                    [
                        'detail' => function ($url, $model, $key)                        {
                            return Html::a('<span class="fa fa-eye"></span>', '#', [
                                'id' => 'actv-crear',
                                'data-title'=>html_entity_decode("Ver Paciente:"." ".$model->firstname),
                                'data-toggle' => 'modal-mesa',
                                'data-target' => '#modal-mesa',
                                'title'=>'Detalles',
                                'data-url' => Url::to(['view', 'id' => $model->id]),
                                'data-pjax' => '0',
                            ]);
                        },
                        'actualizar' => function ($url, $model, $key)                        {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                'id' => 'actv-crear',
                                'data-title'=>html_entity_decode("Actualizar Paciente:"." ".$model->firstname),
                                'data-toggle' => 'modal-mesa',
                                'data-target' => '#modal-mesa',
                                'title'=>'Actualizar',
                                'data-url' => Url::to(['update', 'id' => $model->id]),
                                'data-pjax' => '0',
                            ]);
                        },
                        'historial' => function ($url, $model, $key)                        {
                            return Html::a('<span class="glyphicon glyphicon-user"></span>',  Url::to(["historial", 'id' => $model->id]) , [
                                'title'=>'Historial',

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
    <?php Pjax::end() ?>
</div>
