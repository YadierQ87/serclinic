<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FactoresDosisRadiofarmaco */

$this->title = 'Create Factores Dosis Radiofarmaco';
$this->params['breadcrumbs'][] = ['label' => 'Factores Dosis Radiofarmacos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factores-dosis-radiofarmaco-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
