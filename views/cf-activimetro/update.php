<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfActivimetro */

$this->title = 'Update Cf Activimetro: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Activimetros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-activimetro-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
