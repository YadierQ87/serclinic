<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\CfRadiopharmaceutical */
/* @var $form yii\widgets\ActiveForm */
?>

<?= Html::dropDownList('meses',Yii::$app->request->post('meses'),
    ArrayHelper::map(app\models\CfTypesRadiopharmaceutical::find()->where("name='nombre'")->all(), 'batch', 'batch'),
    ['class'=>'mymultiple','multiple' => 'multiple','id'=>'meses']);
?>
