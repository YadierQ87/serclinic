<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfProcessing */

$this->title = 'Procesar Imagen';
$this->params['breadcrumbs'][] = ['label' => 'Cf Processings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-processing-create">


    <?= $this->render('_form', [
        'model' => $model,'mcf'=>$mcf,
    ]) ?>

</div>
