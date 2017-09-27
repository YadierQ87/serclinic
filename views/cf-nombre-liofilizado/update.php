<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfNombreLiofilizado */

$this->title = 'Update Cf Nombre Liofilizado: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Nombre Liofilizados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-nombre-liofilizado-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
