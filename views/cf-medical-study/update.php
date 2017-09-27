<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfMedicalStudy */

$this->title = 'Actualizar  Estudio Medico: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cf Medical Studies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
$this->params['titulo'] = $this->title;
?>
<div class="cf-medical-study-update">
    <?= $this->render('_form', [
        'model' => $model,'title'=>$this->title
    ]) ?>
</div>
