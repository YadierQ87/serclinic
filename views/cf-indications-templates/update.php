<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfIndicationsTemplates */

$this->title = 'Update Cf Indications Templates: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cf Indications Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-indications-templates-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
