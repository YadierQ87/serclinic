<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfMedia */

$this->title = 'Crear Media';
$this->params['breadcrumbs'][] = ['label' => 'Listado Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-media-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
