<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfAdministerDoses */

$this->title = 'Create Cf Administer Doses';
$this->params['breadcrumbs'][] = ['label' => 'Cf Administer Doses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-administer-doses-create">
    <?= $this->render('_form', [
        'model' => $model,'mcf'=>$mcf,
    ]) ?>

</div>
