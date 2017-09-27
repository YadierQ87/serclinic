<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfGenerator */

$this->title = 'Crear Generator';
$this->params['breadcrumbs'][] = ['label' => 'Listado de Generadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-generator-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
