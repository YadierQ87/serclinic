<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfCodZonas */

$this->title = 'Create Cf Cod Zonas';
$this->params['breadcrumbs'][] = ['label' => 'Cf Cod Zonas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-cod-zonas-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
