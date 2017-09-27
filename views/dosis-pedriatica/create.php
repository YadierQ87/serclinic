<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DosisPedriatica */

$this->title = 'Create Dosis Pedriatica';
$this->params['breadcrumbs'][] = ['label' => 'Dosis Pedriaticas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosis-pedriatica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
