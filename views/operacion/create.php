<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Operacion */

$title = Yii::t('app', 'Crear operación');
?>
<div class="operacion-create">
    <?= $this->render('_form', [
        'model' => $model,'title' => $title,
    ]) ?>
</div>
