<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfWorker */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Workers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-worker-view" style="margin-top: 10px">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fos_user_id',
            'firstname',
            'lastname',
            'personal_id',
            'entity_id',
            'photo',
            'date_birth',
            'sex',
            'status',
            'user_id',
            'email:email',
            'telephone',
            'is_toe',
            'category',
            'observation:ntext',
            'nationality:ntext',
            'town:ntext',
            'region:ntext',
            'datetime_r',
            'username',
        ],
    ]) ?>



</div>
