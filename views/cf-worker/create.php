<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfWorker */

$this->title = 'Create Cf Worker';
$this->params['breadcrumbs'][] = ['label' => 'Cf Workers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-worker-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
