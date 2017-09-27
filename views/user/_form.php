<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use app\models\Pais;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<!--<div class="user-form">-->
<div class="container-fluid" style="margin-top: 20px">
    <?php $form = ActiveForm::begin(); ?>
        <div class="col-lg-6">
            <label for="my-username" class="pull-left">Usuario</label>  <input type="text" id="my-username" name="my-username" class="form-control" value="<?= $model->username ?>">
        </div>
        <div class="col-lg-6" style="margin-top: 15px">
            <label for="my-password" class="pull-left">Contrase&ntilde;a </label>
            <input type="password" id="my-password" name="my-password" class="form-control" value="<?= $model->password_hash ?>">
        </div>
        <div class="col-lg-6" style="margin-top: 15px">
            <?= $form->field($model, 'rol_id',['labelOptions' => [ 'class' => 'pull-left']])->dropDownList(ArrayHelper::map(app\models\Rol::find()->all(), 'id', 'nombre')) ?>
        </div>
    <div class="col-lg-12" style="margin-top: 20px">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>



