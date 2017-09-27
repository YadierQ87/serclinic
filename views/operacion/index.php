<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OperacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Listado de Operaciones');
?>
<div class="operacion-index">
    <i class="fa fa-cogs fa-3x"
       style="width: 50px; height: 50px; position: static; margin-top: 10px; margin-right: 15px; float: right;"></i>
    <div class="panel panel-default">
        <div class="panel-heading"><h4>
                <?= Html::encode($this->title) ?>
                <?= Html::a('Crear operación','#',['id' => 'actv-crear',
                    'data-toggle' => 'modal-mesa',
                    'data-target' => '#modal-mesa',
                    'data-url' => Url::to(['create']),
                    'data-pjax' => '0',
                    'class' => 'btn btn-success'
                ]);                ?>
            </h4></div>
        <?php
        Modal::begin([
            'id' => 'modal-mesa',
            'header' => "<h4 class='modal-title' style='text-align: center;color: #DB4437; padding: 4px;'>
        Formulario Operaci&oacute;n <i class='fa fa-cogs fa-2x'
       style='width: 50px; height: 50px; position: static; margin-top: 10px; margin-right: 15px; float: right;'></i></h4>",
        ]);
        echo "<div class='well'></div>";
        Modal::end();
        ?>
        <div class="panel-body">
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'nombre',
            'ruta',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{detail} {delete} ',
                'buttons' =>
                    [
                        'detail' => function ($url, $model, $key)                        {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                'id' => 'actv-crear',
                                'title' => Yii::t('app', 'Actualizar'),
                                'data-toggle' => 'modal-mesa',
                                'data-target' => '#modal-mesa',
                                'data-url' => Url::to(['update', 'id' => $model->id]),
                                'data-pjax' => '0',
                            ]);
                        },
                    ]
            ],
        ],
    ]); ?>
            </div>
        </div>
    <?php Pjax::end(); ?>
</div>
<script src="js/jquery-2.1.1.js"></script>
<script>
    $(document).on('click', '#actv-crear', (function() {
        $.get(            $(this).data('url'),
            function (data) {
                $('#modal-mesa .modal-body').html(data);
                $('#modal-mesa').modal();
            });    })    );
</script>