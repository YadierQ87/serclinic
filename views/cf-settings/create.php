<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfSettings */

$this->title = 'Crear Ajuste';
$this->params['breadcrumbs'][] = ['label' => 'Lista Ajustes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-settings-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
