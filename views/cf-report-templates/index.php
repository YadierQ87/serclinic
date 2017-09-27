<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CfReportTemplatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cf Report Templates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-report-templates-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cf Report Templates', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'template_pre_document:ntext',
            'template_document:ntext',
            'template_post_document:ntext',
            // 'status',
            // 'observation:ntext',
            // 'datetime_r',
            // 'username',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
