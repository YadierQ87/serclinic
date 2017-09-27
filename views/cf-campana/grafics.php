<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CfPrepareDosesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="panel panel-info">

    <!-- /.panel-heading -->
    <div class="panel-body">

        <div style="margin-left: 100px ">

<?= Highcharts::widget([
    'scripts' => [
        //'modules/exporting',
        'themes/grid-light',
    ],
    'options' => [
        'title' => [
            'text' => 'Campana Radioquimica',],
        'subtitle' => [
            'text' => $subtitle,
        ],
        'xAxis' => [
            'categories' => $categorias,
            'title'=>['text' => 'Fecha']
        ],
        'yAxis' => [
            'title' => ['text' => ''] ,
        ],
        'colors' => [
            '#367FA9',            '#183cf2',
            '#ec1414',            '#80FF00',
            '#DFFF00',            '#92A8CD',
            '#A47D7C',            '#B5CA92',
            '#ec1424',            '#80FF01',
        ],
        'labels' => [
            'items' => [
                [
                    'style' => [
                        'left' => '150px',
                        'top' => '18px',
                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                    ],
                ],
            ],
        ],
        /*'legend'=>[
            'layout'=> 'vertical',
            'align'=>'right',
            'verticalAlign'=> 'middle',
           ' borderWidth'=> 0,
            'title'=>['text' => 'Leyenda'],

        ],*/
        'series' => [
            #columna de top ten platos
            [
                'type' => 'line',
                'name' => $titlep,
                'data' => $graphdata,
                'center' => [100, 80],
                'size' => 80,
                'showInLegend' => false,
                'dataLabels' => [
                    'enabled' => true,
                ],
            ],
            [
                'type' => 'line',
                'name' => $titlef,
                'data' => $graph,
                'center' => [100, 80],
                'size' => 80,
                'showInLegend' => false,
                'dataLabels' => [
                    'enabled' => true,
                ],
            ],


            #end grafico
        ],
    ]
]);?></div>
</div></div>



    <!-- /.panel -->
