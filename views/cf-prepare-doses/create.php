<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfPrepareDoses */

$this->title = 'Preparar Dosis';
$this->params['breadcrumbs'][] = ['label' => 'Listado de Dosis Preparadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-prepare-doses-create">
    <?= $this->render('_form', [
        'model' => $model,'mcf'=>$mcf,
    ]) ?>
</div>
