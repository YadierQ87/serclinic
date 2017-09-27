<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfNombreLiofilizado */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Nombre Liofilizados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-nombre-liofilizado-view">



 <!--   <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
        ],
    ]) ?>

</div>
