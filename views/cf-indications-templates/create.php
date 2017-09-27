<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfIndicationsTemplates */

$this->title = 'Create Cf Indications Templates';
$this->params['breadcrumbs'][] = ['label' => 'Cf Indications Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-indications-templates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
