<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CfMedicalStudySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = html_entity_decode("Estudios M&eacute;dicos");
$this->params['breadcrumbs'][] = ($this->title);
?>
<div class="cf-medical-study-index">
    <h3 class="pull-left" style="color: #2679B5"><?= Html::encode($this->title) ?></h3>
    <?= Html::a(' Adicionar Estudio medico','#',['id' => 'actv-crear',
        'data-toggle' => 'modal-mesa',
        'data-target' => '#modal-mesa',
        'data-url' => Url::to(['create']),
        'data-title'=>html_entity_decode("Adicionar Estudio medico"),
        'class' => 'btn btn-primary pull-left',
        'style'=>'margin:10px'
    ]);
    ?>
    <?php    Modal::begin([
        'id' => 'modal-mesa',
    ]);
    echo "<div class='well'></div>";
    Modal::end();    ?>

    <?php Pjax::begin(); ?>
    <?= Html::beginForm(['index'], 'post', ['data-pjax' => '0']); ?>
    <div class="input-group custom-search-form col-lg-3" style="float: right;margin-top: 25px;">
        <input class="form-control" placeholder="Buscar..." type="text"
               id="my-search" name="my-search" value="<?=Yii::$app->request->post('my-search')?>">
                                <span class="input-group-btn">
                                    <?= Html::submitButton(" <i class='fa fa-search'></i>", ['class' => 'btn btn-default',
                                        'name' => 'refreshButton','id' => 'refreshButton','style'=>'height:34px']) ?>
                            </span>
    </div>
    <?= Html::endForm(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary'=>'',
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'cf_report_templates_id',
            //'cf_indications_templates_id',
            'name',
            //'days_week_planned_and_amount:ntext',
            // 'planned_process_medical_consultation:ntext',
             'administer_doses_zone:ntext',
            [
                'attribute' => 'price',                'format' => 'raw',
                'value' => function ($data)
                {
                    return $data->price." <b>$</b>".$data->tipo_moneda;
                },
            ],
            // 'status',
             'observation:ntext',
            // 'datetime_r',
             'username',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{detail} {actualizar} {delete} ','header'=>'Acciones',
                'buttons' =>
                    [
                        'detail' => function ($url, $model, $key)                        {
                            return Html::a('<span class="fa fa-eye"></span>', '#', [
                                'id' => 'actv-crear',
                                'data-title'=>html_entity_decode("Ver Estudio M&eacute;dico:"." ".$model->name),
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
                                'data-title'=>html_entity_decode("Actualizar Estudio M&eacute;dico:"." ".$model->name),
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
    <?php Pjax::end(); ?>
</div>
