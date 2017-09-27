<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AuditoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Auditoría');
$this->params['breadcrumbs'][] = ['label' => 'Administración', 'url' => ['admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auditoria-index">
    <i class="fa fa-binoculars fa-3x"
       style="width: 50px; height: 50px; position: static; margin-top: 10px; margin-right: 15px; float: right;"></i>
    <div class="panel panel-default">
        <div class="panel-heading"><h4><?= Html::encode($this->title) ?></h4></div>
        <div class="panel-body">
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            
            'operacion',
            'autor',
            'fecha',
            'ip',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],
        ],
    ]); ?>
        </div>

</div>
