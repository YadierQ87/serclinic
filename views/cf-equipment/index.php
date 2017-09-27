<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use app\models\CfEquipment;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CfEquipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-equipment-index">
    <h3 class="pull-left" style="color: #2679B5"><?= Html::encode($this->title) ?></h3>
    <?= Html::a(' Adicionar Equipo','#',['id' => 'actv-crear',
        'data-toggle' => 'modal-mesa',
        'data-target' => '#modal-mesa',
        'data-url' => Url::to(['create']),
        'data-title'=>html_entity_decode("Adicionar Equipo"),
        'class' => 'btn btn-primary pull-left',
        'style'=>'margin:10px'
    ]);
    ?>

    <?php    Modal::begin([
        'id' => 'modal-mesa',


    ]);
    echo "<div class='well'></div>";
    Modal::end();    ?>

    <?php Pjax::begin() ?>

    <?= Html::beginForm(['index'], 'post', ['data-pjax' => '0']); ?>
    <div class="input-group custom-search-form col-lg-3" style="float: right;margin-top: 25px;">
        <input class="form-control" placeholder="Buscar..." type="text"
               id="my-search" name="my-search" value="<?=Yii::$app->request->post('my-search')?>">
                      <span class="input-group-btn">
                             <?= Html::submitButton(" <i class='fa fa-search' style='vert-align:top '></i>", ['class' => 'btn btn-default',
                                 'name' => 'refreshButton','id' => 'refreshButton', 'style'=>'height:34px']) ?>
                      </span>
    </div>
    <?= Html::endForm(); ?>
 <?= GridView::widget([
        'dataProvider' => $dataProvider,
     'summary'=>'',
     //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'cf_local_id',                'format' => 'raw',
                'value' => function($data)                {
                    return $data->cfLocal->name;
                }
            ],
            [
                'attribute' => 'cf_types_equipment_id',                'format' => 'raw',
                'value' => function($data)                {
                    return $data->cfTypesEquipment->name;
                }
            ],
            'name',
            'stock_number',
            // 'mark',
            // 'model',
            // 'specialist',
            // 'production_datetime',
            // 'last_calibration_datetime',
            // 'last_calibration_certified',
            // 'status',
            // 'observation:ntext',
            // 'can_users:ntext',
            // 'datetime_r',
            // 'username',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{detail} {actualizar} {delete} ',
                'header'=>'Acciones',
                'buttons' =>
                    [
                        'detail' => function ($url, $model, $key)                        {
                            return Html::a('<span class="fa fa-eye"></span>', '#', [
                                'id' => 'actv-crear',
                                'data-title'=>html_entity_decode("Ver Equipo:"." ".$model->name),
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
                                'data-title'=>html_entity_decode("Actualizar Equipo:"." ".$model->name),
                                'data-toggle' => 'modal-mesa',
                                'data-target' => '#modal-mesa',
                                'title'=>'Actualizar',
                                'data-url' => Url::to(['update', 'id' => $model->id]),
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
$('#modal-mesa .modal-dialog').addClass('modal-lg')
                $('#modal-mesa .modal-body').html(data);
                $('.modal-header').html('$tag' + titulo + '$btn' + '$tag2');
                $('#modal-mesa').modal();
            });    })    );


             $('#my-search').keyup(function(event){
                  $('#refreshButton').submit();
              });

            ");            ?>
    <?php Pjax::end() ?>

</div>
