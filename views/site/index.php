<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Modal;

$this->title = 'Servicios Clinicos';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <?php    Modal::begin([
                'id' => 'modal-mesa',
                'header' => "<h4 class='modal-title'> Registrar Paciente </h4>",
            ]);
            echo "<div class='well'></div>";
            Modal::end();    ?>
<p>Breve Descripcion de la Clinica , Imagen o foto de Entrada , Otros datos.</p>
            <img src="images/gallery/image-5.jpg">
        </div>
    </div>
</div>
