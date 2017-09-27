<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FactoresDosisRadiofarmacoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Factores Dosis Radiofarmacos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factores-dosis-radiofarmaco-index">

    <h3 class="pull-left" style="color: #2679B5">
        <?= Html::encode($this->title) ?></h3>
    <?= Html::a(' Adicionar Factores Dosis Radiofarmaco','#',['id' => 'actv-crear',
        'data-toggle' => 'modal-mesa',
        'data-target' => '#modal-mesa',
        'data-url' => Url::to(['create']),
        'data-title'=>html_entity_decode("Adicionar Factores Dosis Radiofarmaco"),
        'class' => 'btn btn-primary pull-left',
        'style'=>'margin:10px'
    ]);
    ?>
    <?php    Modal::begin([
        'id' => 'modal-mesa',


    ]);
    echo "<div class='well'></div>";
    Modal::end();    ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'organo_critico',
            'id_radiofarmaco',
            'dosis_efectiva_0a2',
            'dosis_efectiva_3a7',
            // 'dosis_efectiva_8a12',
            // 'dosis_efectiva_13a18',
            // 'dosis_efectiva_hombre',
            // 'dosis_efectiva_mujer',
            // 'dosis_org_crit_0a2',
            // 'dosis_org_crit_3a7',
            // 'dosis_org_crit_8a12',
            // 'dosis_org_crit_13a18',
            'dosis_org_crit_hombre',
            'dosis_org_crit_mujer',
            ['class' => 'yii\grid\ActionColumn'],
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
                $('#modal-mesa .modal-dialog').addClass('modal-lg')
                $('.modal-header').html('$tag' + titulo + '$btn' + '$tag2');
                $('#modal-mesa').modal();
            });    })    );

            ");            ?>