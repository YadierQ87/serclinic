<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CfSettingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado Ajustes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-settings-index">

    <h1><?= Html::encode($this->title) ?> <?= Html::a('Crear Ajuste', ['create'], ['class' => 'btn btn-success']) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parameter',
            'value:ntext',
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
