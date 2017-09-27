<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CfRadiopharmaceuticalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Radiofarmacia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-radiopharmaceutical-index">


    <h3 class="pull-left" style="color: #2679B5"><?= Html::encode($this->title) ?></h3>
        <?= Html::a(html_entity_decode("<i class='fa fa-flask'></i> Adicionar Radiof&aacute;rmaco"),'#',['id' => 'actv-crear',
            'data-toggle' => 'modal-mesa',
            'data-target' => '#modal-mesa',
            'data-url' => Url::to(['create']),
            'data-title'=>html_entity_decode('Adicionar Radiof&aacute;rmaco'),
            //'data-pjax' => '0',
            'class' => 'btn btn-primary pull-left',
            'style'=>'margin:10px'
        ]);
        ?>



    <?php    Modal::begin([
        'id' => 'modal-mesa',    ]);
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
    'summary'=>'',
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
                'attribute' => 'cf_types_radiopharmaceutical_id',
                'format' => 'raw',
                'value' => function ($data)
                {
                    return Html::a($data->cfTypesRadiopharmaceutical->name , yii\helpers\Url::toRoute(['/cf-types-radiopharmaceutical/index']));
                },
            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($data)
                {
                    return Html::a($data->nombreRadiopharmaceutical->nombre , yii\helpers\Url::toRoute(['/cf-nombre-radiofarmaco/index']));
                },
            ],
            'marcage_datetime',
            'marcage_activity',
             'marcage_volumen',
            'lote_utilizado',
            [
            'attribute' => 'status',
            'format' => 'raw',
            'value' => function ($data)
            {
                if($data->status == 1)
                    return "Apto";
                return "No Apto";
            },
            ],
            [
                'attribute' => 'specialist',
                'format' => 'raw',
                'value' => function ($data)
                {
                    return $data->especialista->firstname;
                },
            ],
            // 'observation',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{detail} {update} {delete} ','header'=>'Acciones',
                'buttons' =>
                    [   'detail' => function ($url, $model, $key)                        {
                        return Html::a('<span class="fa fa-eye"></span>', '#', [
                            'id' => 'actv-crear',
                            'data-title'=>html_entity_decode("Ver Radiofarmaco:"." ".$model->nombreRadiopharmaceutical->nombre),
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
                                'data-title'=>html_entity_decode("Actualizar Radiof&aacute;rmaco {$model->nombreRadiopharmaceutical->nombre}"),
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
                $('#modal-mesa .modal-dialog').addClass('modal-lg');
                $('.modal-header').html('$tag' + titulo + '$btn' + '$tag2');
                $('#modal-mesa').modal();
            });    })    );

             $('#my-search').keyup(function(event){
                  $('#refreshButton').submit();
              });   ");  ?>
</div>
<?php Pjax::end(); ?>