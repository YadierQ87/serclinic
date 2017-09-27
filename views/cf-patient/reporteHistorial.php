<?php
/**
 * Created by PhpStorm.
 * User: anabel.rodriguez
 * Date: 25/04/2017
 * Time: 15:22
 */
$this->title = 'Reporte';
$this->params['breadcrumbs'][] = ['label' => 'Cf Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/cf-medical-consultation/_details',['mcf'=>$mcf]); ?>
<?= $this->render('/cf-medical-consultation/_process',['mcf'=>$mcf]); ?>
