<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfLocal */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cf Locals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-local-view" style="margin-top: 10px">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'status',
            'observation:ntext',
            'datetime_r',
            'username',
        ],
    ]) ?>

    <!--  <p style="margin-top: 20px">
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
