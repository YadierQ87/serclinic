<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CfDiaryElution */

$this->title = 'Elucion Diaria';
$this->params['breadcrumbs'][] = ['label' => 'Elucion Diaria', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-diary-elution-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
