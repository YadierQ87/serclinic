<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CfMediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado Imagenes-Media';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-media-index">

    <h1><?= Html::encode($this->title) ?>  <?= Html::a('Crear Media', ['create'], ['class' => 'btn btn-success']) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'file_name',
            'mime_type',
            'size',
            // 'path',
            // 'meta',
            // 'status',
            // 'observation:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
