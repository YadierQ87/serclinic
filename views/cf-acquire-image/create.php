<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfAcquireImage */

$this->title = 'Adquirir Imagen';
$this->params['breadcrumbs'][] = ['label' => 'Cf Acquire Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-acquire-image-create">
    <?= $this->render('_form', [
        'model' => $model,'mcf'=>$mcf,
    ]) ?>

</div>
