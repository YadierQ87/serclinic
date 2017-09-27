<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfActivimetro */

$this->title = 'Create Cf Activimetro';
$this->params['breadcrumbs'][] = ['label' => 'Cf Activimetros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-activimetro-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
