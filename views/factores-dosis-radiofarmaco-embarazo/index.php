<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FactoresDosisRadiofarmacoEmbarazoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Factores Dosis Radiofarmaco Embarazos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factores-dosis-radiofarmaco-embarazo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Factores Dosis Radiofarmaco Embarazo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'early_pregnant',
            '3_meses',
            '6_meses',
            '9_meses',
            // 'id_radiofarmaco',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
