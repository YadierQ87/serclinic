<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfNombreRadiofarmaco */

$this->title = 'Update Cf Nombre Radiofarmaco: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Nombre Radiofarmacos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-nombre-radiofarmaco-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
