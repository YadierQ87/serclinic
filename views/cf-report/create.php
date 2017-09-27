<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfReport */

$this->title = 'Create Cf Report';
$this->params['breadcrumbs'][] = ['label' => 'Cf Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-report-create">


    <?= $this->render('_form', [
        'model' => $model,'mcf'=>$mcf,'listadoEstudios'=>$listadoEstudios,
    ]) ?>

</div>
