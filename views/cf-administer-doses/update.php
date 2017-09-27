<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfAdministerDoses */

$this->title = 'Update Cf Administer Doses: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Administer Doses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-administer-doses-update">
    <?= $this->render('_form', [
        'model' => $model,'mcf'=>$mcf
    ]) ?>
</div>
