<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Usuarios');
?>
<div class="user-index">

    <h3 class="pull-left" style="color: #2679B5"><?= Html::encode($this->title) ?></h3>
    <?= Html::a(' Crear Usuario','#',['id' => 'actv-crear',
        'data-toggle' => 'modal-mesa',
        'data-target' => '#modal-mesa',
        'data-url' => Url::to(['create']),
        'data-title'=>html_entity_decode("Crear Usuario"),
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
    <div class="input-group custom-search-form col-lg-3" style="float: right;margin-bottom: 5px;">
        <input class="form-control" placeholder="Buscar..." type="text"
               id="my-search" name="my-search" value="<?=Yii::$app->request->post('my-search')?>">
                                <span class="input-group-btn">
                                    <?= Html::submitButton(" <i class='fa fa-search'></i>", ['class' => 'btn btn-default',
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

            'username',
            'nombre',
            //'apellidos',
            //'email:email',
            'status',
            [
                'label' => 'Rol',
                'value' => 'rol.nombre'
            ],
            
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' =>
                    [
                        'update' => function ($url, $model, $key)                        {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                'id' => 'actv-crear',
                                'title' => Yii::t('app', 'Actualizar'),
                                'data-toggle' => 'modal-mesa',
                                'data-target' => '#modal-mesa',
                                'data-url' => Url::to(['update', 'id' => $model->id]),
                                'data-title'=>html_entity_decode("Actualizar Usuario:"." ".$model->username),
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


             $('#my-search').keyup(function(event){
                  $('#refreshButton').submit();
              });

            ");            ?>
<?php Pjax::end(); ?>
