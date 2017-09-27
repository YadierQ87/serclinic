<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CfDiaryElution */

$this->title = 'Update Cf Diary Elution: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Diary Elutions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cf-diary-elution-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
