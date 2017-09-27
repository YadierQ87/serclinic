<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CfNombreRadiofarmacoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nombre Radiofarmarcos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-nombre-radiofarmaco-index">

    <h3 class="pull-left" style="color: #2679B5"><?= Html::encode($this->title) ?></h3>
    <?= Html::a(' Adicionar Nombre de radiofarmaco','#',['id' => 'actv-crear',
        'data-toggle' => 'modal-mesa',
        'data-target' => '#modal-mesa',
        'data-url' => Url::to(['create']),
        'data-title'=>html_entity_decode("Adicionar Nombre de radiofarmaco"),
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
        //'filterModel' => $searchModel,
        'summary'=>'',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'nombre',

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Acciones',
                'template' => '{detail} {actualizar} {delete} ',
                'buttons' =>
                    [
                        'detail' => function ($url, $model, $key)                        {
                            return Html::a('<span class="fa fa-eye"></span>', '#', [
                                'id' => 'actv-crear',
                                'data-title'=>html_entity_decode("Ver Nombre de radiofarmaco:"." ".$model->nombre),
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
                                'data-title'=>html_entity_decode("Actualizar Nombre de radiofarmaco:"." ".$model->nombre),
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

</div>
<?php
$btn = '<i class="fa fa-close close" data-dismiss=modal aria-hidden=true></i>';
$tag = "<h4>"; $tag2 = "</h4>";
$this->registerJs("
            $(document).on('click', '#actv-crear', (function() {
            var titulo = $(this).data('title');
        $.get(            $(this).data('url'),
            function (data) {
                $('#modal-mesa .modal-body').html(data);

                $('.modal-header').html('$tag' + titulo + '$btn' + '$tag2');
                $('#modal-mesa').modal();
            });    })    );

            ");            ?>