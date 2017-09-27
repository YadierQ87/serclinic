<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CfActivimetro */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cf Activimetros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cf-activimetro-view">



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fecha_medicion',
            'hora',
            'fondo_act',
            'actv_fuente_patron:ntext',
            'actv_estandar:ntext',
        ],
    ]) ?>

</div>
