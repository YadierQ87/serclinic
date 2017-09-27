<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DosisPedriatica */

$this->title = 'Update Dosis Pedriatica: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dosis Pedriaticas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dosis-pedriatica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
