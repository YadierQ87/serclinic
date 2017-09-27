<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfHistoryLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf History Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-history-log-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'entity',
            'section',
            'level',
            'username',
            'user_id',
            'user_ip_source',
            'action',
            'field_name',
            'old_value:ntext',
            'new_value:ntext',
            'datetime',
            'msg:ntext',
        ],
    ]) ?>

</div>
