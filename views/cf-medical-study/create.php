<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfMedicalStudy */

$this->title = 'Crear Estudio Medico';
$this->params['breadcrumbs'][] = ['label' => 'Cf Medical Studies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['titulo'] = $this->title;
?>
<div class="cf-medical-study-create">
    <?= $this->render('_form', [
        'model' => $model,'title'=>$this->title
    ]) ?>
</div>
