<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfLocal */

$this->title = 'Create Cf Local';
$this->params['breadcrumbs'][] = ['label' => 'Cf Locals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-local-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
