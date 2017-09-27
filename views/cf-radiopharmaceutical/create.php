<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfRadiopharmaceutical */

$this->title = 'Create Cf Radiopharmaceutical';
$this->params['breadcrumbs'][] = ['label' => 'Cf Radiopharmaceuticals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-radiopharmaceutical-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
