<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfDiaryElution */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Diary Elutions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-diary-elution-view">


  <!--  <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'elution_datetime',
            'codigo_generator',
            'activity_elution',
            'volumen_elution',
            'activity99Mo',
            'percent_radiocoloides',
            'aluminio',
            'ph',
            'aspecto_organoleptico',
        ],
    ]) ?>

</div>
