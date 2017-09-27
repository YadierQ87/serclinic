<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfReception */

$this->title = 'Update Cf Reception: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Receptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-reception-update">


    <?= $this->render('_form', [
        'model' => $model,'mcf' => $mcf,
    ]) ?>

</div>
