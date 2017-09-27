<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfPrepareDoses */

$this->title = 'Update Cf Prepare Doses: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Prepare Doses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-prepare-doses-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
