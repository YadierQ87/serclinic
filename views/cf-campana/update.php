<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfCampana */

$this->title = 'Update Cf Campana: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Campanas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-campana-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
