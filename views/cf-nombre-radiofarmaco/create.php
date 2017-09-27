<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfNombreRadiofarmaco */

$this->title = 'Create Cf Nombre Radiofarmaco';
$this->params['breadcrumbs'][] = ['label' => 'Cf Nombre Radiofarmacos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-nombre-radiofarmaco-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
