<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfReportTemplates */

$this->title = 'Create Cf Report Templates';
$this->params['breadcrumbs'][] = ['label' => 'Cf Report Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-report-templates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
