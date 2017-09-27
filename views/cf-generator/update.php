<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfGenerator */

$this->title = 'Update Cf Generator: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cf Generators', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-generator-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
