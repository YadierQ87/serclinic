<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CfTypesRadiopharmaceuticalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = html_entity_decode('F&aacute;rmacos');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="cf-types-radiopharmaceutical-index">
    <h3 class="pull-left" style="color: #2679B5"><?= Html::encode($this->title) ?></h3>

    <?= Html::a(html_entity_decode("Recepcionar F&aacute;rmaco"),
            '#',['id' => 'actv-crear',
                'data-toggle' => 'modal-mesa',
                'data-target' => '#modal-mesa',
                'data-title'=>'Adicionar F&aacute;rmaco',
                'data-url' => Url::to(['create2']),
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
        <input class="form-control" placeholder="Search..." type="text"
               id="my-search" name="my-search" value="<?=Yii::$app->request->post('my-search')?>">
                                <span class="input-group-btn">
                                    <?= Html::submitButton(" <i class='fa fa-search'></i>", ['class' => 'btn btn-default',
                                        'name' => 'refreshButton','id' => 'refreshButton','style'=>'height:34px']) ?>
                            </span>
    </div>
    <?= Html::endForm(); ?>
    Leyenda
    <label class="label label-success"> bien  </label>
    <label class="label label-warning"> en el limite  </label>
    <label class="label label-danger">  alerta </label>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary'=>'',
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'name',
            'batch',
            'internal_code',
            'production_company',
            // 'production_datetime',
            // 'reception_datetime',
            [
                'attribute' => 'count',                'format' => 'raw',
                'value' => function ($data)
                {
                    $label = " <label class='label label-success'> ".$data->count." viales</label>";
                    if($data->count <= 5 && $data->count > 0)
                        $label = " <label class='label label-warning'>".$data->count." viales</label>";
                    if($data->count <= 0 )
                        $label = " <label class='label label-danger'>".$data->count." viales</label>";
                    return $label ;
                },
            ],
             'used_count',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data)
                {
                    date_default_timezone_set('Canada/Central');
                    $dias = (strtotime($data->expiration_datetime) - strtotime(date('Y-m-d')))  ;
                    $dias = ceil($dias/86400);
                    $label = " <label class='label label-success'>Apto</label>";
                    if($dias <= 1)
                        $label = " <label class='label label-danger'>No Apto</label>";
                    //$label = ($data->status == 1) ? "Apto" : "No Apto";
                    return Html::label($label);
                },
            ],
            [
                'attribute' => 'expiration_datetime',                'format' => 'raw',
                'value' => function ($data)
                {
                   date_default_timezone_set('Canada/Central');
                   $fecha_completa = explode(" ",$data->expiration_datetime);
                   $dias = (strtotime($data->expiration_datetime) - strtotime(date('Y-m-d')))  ;
                   $dias = ceil($dias/86400);
                   $label = " <label class='label label-success'> ".$dias." dias</label>";
                   if($dias <= 1)
                       $label = " <label class='label label-danger'>".$dias." dias</label>";
                   return $fecha_completa[0] . $label ;
                },
            ],
            // 'observation:ntext',
            // 'datetime_r',
            // 'username',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{detail} {update} {delete} ','header'=>'Acciones',
                'buttons' =>
                    [ 'detail' => function ($url, $model, $key)                        {
                        return Html::a('<span class="fa fa-eye"></span>', '#', [
                            'id' => 'actv-crear',
                            'data-title'=>html_entity_decode("Ver Liofilizado:"." ".$model->name),
                            'data-toggle' => 'modal-mesa',
                            'data-target' => '#modal-mesa',
                            'title'=>'Detalles',
                            'data-url' => Url::to(['view', 'id' => $model->id]),
                            'data-pjax' => '0',
                        ]);
                    },
                        'update' => function ($url, $model, $key)                        {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                'id' => 'actv-crear',
                                'data-title'=>html_entity_decode("Actualizar Liofilizado {$model->name}"),
                                'data-toggle' => 'modal-mesa',
                                'data-target' => '#modal-mesa',
                                'title'=>'Actualizar',
                                'data-url' => Url::to(['update', 'id' => $model->id]),
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
        $.get( $(this).data('url'),
            function (data) {
                $('#modal-mesa .modal-body').html(data);
                $('.modal-header').html('$tag' + titulo + '$btn' + '$tag2');
                $('#modal-mesa .modal-dialog').addClass('modal-lg');
                $('#modal-mesa').modal();
            });    })    );

             $('#my-search').keyup(function(event){
                  $('#refreshButton').submit();
              });   ");  ?>
</div>
<?php Pjax::end(); ?>