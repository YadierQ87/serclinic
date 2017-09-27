<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FactoresDosisRadiofarmacoEmbarazo */

$this->title = 'Create Factores Dosis Radiofarmaco Embarazo';
$this->params['breadcrumbs'][] = ['label' => 'Factores Dosis Radiofarmaco Embarazos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factores-dosis-radiofarmaco-embarazo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
