<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfNombreLiofilizado */

$this->title = 'Create Cf Nombre Liofilizado';
$this->params['breadcrumbs'][] = ['label' => 'Cf Nombre Liofilizados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-nombre-liofilizado-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
