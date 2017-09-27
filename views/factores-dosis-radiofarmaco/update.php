<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FactoresDosisRadiofarmaco */

$this->title = 'Update Factores Dosis Radiofarmaco: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Factores Dosis Radiofarmacos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="factores-dosis-radiofarmaco-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
