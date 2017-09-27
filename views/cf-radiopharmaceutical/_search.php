<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfRadiopharmaceuticalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-radiopharmaceutical-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cf_types_radiopharmaceutical_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'marcage_datetime') ?>

    <?= $form->field($model, 'marcage_activity') ?>

    <?php // echo $form->field($model, 'marcage_volumen') ?>

    <?php // echo $form->field($model, 'specialist') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'observation') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
