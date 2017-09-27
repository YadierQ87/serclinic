<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CfHistoryLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'History Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-history-log-index">

    <h1><?= Html::encode($this->title) ?> <?= Html::a('Crear History Log', ['create'], ['class' => 'btn btn-success']) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'entity',
            'section',
            'level',
            'username',
            // 'user_id',
            // 'user_ip_source',
            // 'action',
            // 'field_name',
            // 'old_value:ntext',
            // 'new_value:ntext',
            // 'datetime',
            // 'msg:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
