<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfReception */

$this->title = 'Create Cf Reception';
$this->params['breadcrumbs'][] = ['label' => 'Cf Receptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-reception-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
