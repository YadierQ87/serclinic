<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Operacion */

$title = Yii::t('app', 'Actualizar {modelClass}: ', ['modelClass' => 'operación',]) . ' ' . $model->id;

?>
<div class="operacion-update">
    <?= $this->render('_form', [
        'model' => $model,'title' => $title,
    ]) ?>
</div>
