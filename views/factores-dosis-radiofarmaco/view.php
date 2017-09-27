<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FactoresDosisRadiofarmaco */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Factores Dosis Radiofarmacos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factores-dosis-radiofarmaco-view">

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
            'organo_critico',
            'id_radiofarmaco',
            'dosis_efectiva_0a2',
            'dosis_efectiva_3a7',
            'dosis_efectiva_8a12',
            'dosis_efectiva_13a18',
            'dosis_efectiva_hombre',
            'dosis_efectiva_mujer',
            'dosis_org_crit_0a2',
            'dosis_org_crit_3a7',
            'dosis_org_crit_8a12',
            'dosis_org_crit_13a18',
            'dosis_org_crit_hombre',
            'dosis_org_crit_mujer',
        ],
    ]) ?>

</div>
