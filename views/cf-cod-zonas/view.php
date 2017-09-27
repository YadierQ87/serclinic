<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfCodZonas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Cod Zonas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-cod-zonas-view" style="margin-top: 10px">




    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre_lugar',
        ],
    ]) ?>

 <!--   <p style="margin-top: 50px">

        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

</div>
