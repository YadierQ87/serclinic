<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfTypesRadiopharmaceutical */

$this->title = 'Create Cf Types Radiopharmaceutical';
$this->params['breadcrumbs'][] = ['label' => 'Cf Types Radiopharmaceuticals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-types-radiopharmaceutical-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
