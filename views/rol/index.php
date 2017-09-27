<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-index container-fluid">
    <h4>
                <?= Html::encode($this->title) ?>
                <?= Html::a('Insertar Rol','#',['id' => 'actv-crear',
                    'data-toggle' => 'modal-mesa',
                    'data-target' => '#modal-mesa',
                    'data-url' => Url::to(['create']),
                    'class'=>'btn btn-primary',
                    'data-title'=>html_entity_decode("Crear Rol"),
                    'data-pjax' => '0',]);
                ?>
            </h4>
    <?php
    Modal::begin([
        'id' => 'modal-mesa',
    ]);
    echo "<div class='well'></div>";
    Modal::end();
    ?>
    <?php Pjax::begin(); ?>
            <?= Html::beginForm(['index'], 'post', ['data-pjax' => '0']); ?>
            <div class="input-group custom-search-form col-lg-3" style="float: right;margin-bottom: 5px;">
                <input class="form-control" placeholder="Search..." type="text"
                       id="my-search" name="my-search" value="<?=Yii::$app->request->post('my-search')?>">
                                <span class="input-group-btn">
                                    <?= Html::submitButton(" <i class='fa fa-search'></i>", ['class' => 'btn btn-default',
                                        'name' => 'refreshButton','id' => 'refreshButton']) ?>
                            </span>
            </div>
            <?= Html::endForm(); ?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
           // 'id_rol',
            'nombre',
            ['class' => 'yii\grid\ActionColumn'],
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
                $('.modal-header').html('$tag' + titulo + '$btn' + '$tag2');
                $('#modal-mesa').modal();
            });    })    );


             $('#my-search').keyup(function(event){
                  $('#refreshButton').submit();
              });

            ");            ?>
<?php Pjax::end(); ?>
</div>