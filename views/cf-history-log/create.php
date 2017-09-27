<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfHistoryLog */

$this->title = 'Create Cf History Log';
$this->params['breadcrumbs'][] = ['label' => 'Cf History Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-history-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
