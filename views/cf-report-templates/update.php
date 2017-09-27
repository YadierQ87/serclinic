<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfReportTemplates */

$this->title = 'Update Cf Report Templates: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cf Report Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-report-templates-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
