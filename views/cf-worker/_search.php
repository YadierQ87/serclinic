<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CfWorkerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cf-worker-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fos_user_id') ?>

    <?= $form->field($model, 'firstname') ?>

    <?= $form->field($model, 'lastname') ?>

    <?= $form->field($model, 'personal_id') ?>

    <?php // echo $form->field($model, 'entity_id') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'date_birth') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'is_toe') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'observation') ?>

    <?php // echo $form->field($model, 'nationality') ?>

    <?php // echo $form->field($model, 'town') ?>

    <?php // echo $form->field($model, 'region') ?>

    <?php // echo $form->field($model, 'datetime_r') ?>

    <?php // echo $form->field($model, 'username') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
