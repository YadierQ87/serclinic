<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FactoresDosisRadiofarmacoEmbarazo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Factores Dosis Radiofarmaco Embarazos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factores-dosis-radiofarmaco-embarazo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'early_pregnant',
            '3_meses',
            '6_meses',
            '9_meses',
            'id_radiofarmaco',
        ],
    ]) ?>

</div>
