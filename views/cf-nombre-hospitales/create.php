<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfNombreHospitales */

$this->title = 'Create Cf Nombre Hospitales';
$this->params['breadcrumbs'][] = ['label' => 'Cf Nombre Hospitales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-nombre-hospitales-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
