<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

  AppAsset::register($this);
  
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="control.jpg" type="image/x-jpg" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom Theme files -->
    <link href="css/contact-buttons.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!---pop-up-box---->
    <link href="js/datetimepicker/datetimepicker.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <link href="js/xcharts/xcharts.min.css" rel="stylesheet">
    <link href="js/select2/select2.css" rel="stylesheet">
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php $this->head() ?>
    <style>
    .my-menu{
    max-height:70px !important;padding-top: 6px !important;
    background-color: #F4F4F4 !important;
    font-size: 15px !important;
    }</style>
</head>
<body>

<?php 
$this->beginBody() ?>
    <div class="wrap">
        <div class="navbar header no-margin navbar-fixed-top my-menu">
        <div class="container">
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">M</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div style="width: 155px; height: 70px;">
                    <a href="<?= Yii::$app->homeUrl ?>" class="navbar-brand">
                        <?= 'Control Interno' ?>
                    </a>
                    <div style="width: 60%; float: right;">
        <p style="text-align: right; font-size: 80%; line-height: 1;position: absolute;top: 44px;left: 50px;">
                            <?= 'Herramienta Administrativa' ?></p>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse mega-menu">
                <ul class="nav navbar-nav" style="margin-left: 20px;">
                    <?php
                    if (!Yii::$app->user->isGuest)
                    {?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="false" data-target="#" href="#">
                                <?= ('Administrar Entidades') ?> <i class="fa fa-cog"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><?= Html::a(('Gestionar Acciones'), ['/accion/index']) ?></li>
                                <li><?= Html::a(('Gestionar Deficiencias'), ['/deficiencia-detectada/index']) ?></li>
                                <li><?= Html::a(('Gestionar Especialidades'), ['/especialidad/index']) ?></li>
                            </ul>
                        </li>
                        <li><?= Html::a(('Evaluaciones de Control '), ['/evaluacion-control/index']) ?></li>
                        <li><?= Html::a(('Plan de Acciones'), ['/plan-acciones/index']) ?></li>
                        <li><?= Html::a(('Documentos-Control'), ['/documentos-control/index']) ?></li>
                        <li><?= Html::a(('Telefonos DTMY'), ['/directorio/index'])  ?></a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="false" data-target="#" href="#">
                                <?= ('Mi Cuenta') ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header"> <?= Yii::$app->user->identity->username ?></li>
                                <li><?= Html::a(('Salir'), ['site/logout'], ['data-method' => 'post']) ?></li>
                            </ul>
                        </li>
                        <?php
                    }  ?>
                </ul>
            </div>
            <!-- END NAVIGATION -->
        </div>
    </div>
<div></br></div>
        <div class="container">
            <div class="panel panel-default">
            <div class="panel panel-header"> <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?></div>
                <div class="panel panel-body">
            <?= $content ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container" >
                        <p class="pull-right" style="color: black;">&copy; Made By Michi Ing. <?= date('Y') ?></p>
        </div>
    </footer>
<?php $this->endBody(); ?>
</body>
    <!-- SB Admin Scripts - Include with every page -->

<script src="js/datetimepicker/moments.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.backTop.min.js"></script>
<script src="js/datetimepicker/datetimepicker.js"></script>

</html>
<?php $this->endPage() ?>
