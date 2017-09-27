<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfNombreMedicos */

$this->title = 'Create Cf Nombre Medicos';
$this->params['breadcrumbs'][] = ['label' => 'Cf Nombre Medicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-nombre-medicos-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
