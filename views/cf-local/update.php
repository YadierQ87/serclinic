<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfLocal */

$this->title = 'Update Cf Local: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cf Locals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-local-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
