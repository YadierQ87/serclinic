<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$title = Yii::t('app', 'Insertar usuario');
?>
<div class="user-update">
    <?= $this->render('_form', [
        'model' => $model,'title'=>$title,
    ]) ?>
</div>
