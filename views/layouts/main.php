<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\bootstrap\Modal;

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
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php $this->head() ?>
    <?php date_default_timezone_set('Canada/Central'); ?>
</head>
<body class="no-skin">
<style>
    .breadcrumb li.active {
        color:#F28338 !important;
        font-size: medium; font-weight: bold;
    }
    .breadcrumb li > a {
        color: #2B7DBC !important;
        font-size: medium;
        font-weight: bold;
    }
    .mensajes {
        max-width: 35%; position: absolute;
        z-index: 100;
        margin-top: 10px; right: 20px;
    }

    .widget-box {
        padding: 0px;
        box-shadow: none;
        margin: 3px 0px;
        border: 1px solid #CCC;
    }
    .widget-header {
        box-sizing: content-box;
        position: relative;
        min-height: 38px;
        background: #F7F7F7 linear-gradient(to bottom, #FFF 0px, #EEE 100%) repeat-x scroll 0% 0%;
        color: #669FC7;
        border-bottom: 1px solid #DDD;
        padding-left: 12px;
    }
    .widget-header > .widget-title {
        line-height: 36px;
        padding: 0px;
        margin: 0px;
        display: inline;
    }
    .widget-toolbar {
        display: inline-block;
        padding: 0px 10px;
        line-height: 37px;
        float: right;
        position: relative;
    }
    .widget-body {
        background-color: #FFF;
    }
    .gritter-image {
        width: 48px;
        height: 48px;
        float: left;
    }
</style>
<?php
$this->beginBody() ?>
        <?php
        if (!Yii::$app->user->isGuest)
        {
        ?>
<div class="wrap">
        <div id="navbar" class="navbar navbar-default" style="background-color: #393939">
            <script type="text/javascript">
                try {
                    ace.settings.check('navbar', 'fixed')
                } catch (e) {
                }
            </script>
            <div class="navbar-container" id="navbar-container">
                <!-- /section:basics/sidebar.mobile.toggle -->
                <div class="navbar-header pull-left">
                    <!-- #section:basics/navbar.layout.brand -->
                    <a href="#" class="navbar-brand" style="color:#ffffff !important;">
                        <small>
                            <i class="fa fa-hospital-o"></i>
                            Sistema de Servicios Cl&iacute;nicos
                        </small>
                    </a>
                </div>
                <!-- #section:basics/navbar.dropdown -->
                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                   <ul class="nav ace-nav">
                           <!-- #section:basics/navbar.user_menu -->
                       <li >
                           <a data-toggle="dropdown" href="#" class="dropdown-toggle" style="background-color: #393939; color:#ffffff !important;">
                               <i class='menu-icon fa fa-cogs'></i>
                               <span class='menu-text'>Configuraci&oacute;n </span>
                               <i class="ace-icon fa fa-caret-down"></i>
                           </a>
                           <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                               <li>  <a href="<?= Url::to(['/rol']) ?>">  <i class="ace-icon fa fa-cog"></i>  Roles del Sistema </a>                 </li>
                               <li>  <a href="<?= Url::to(['/user']) ?>">  <i class="ace-icon fa fa-user"></i> Usuarios del Sistema </a>           </li>
                               <li>  <a href="<?= Url::to(['/operacion']) ?>">  <i class="ace-icon fa fa-flag"></i> Permisos Roles </a>  </li>
                           </ul>
                       </li>
                        <li >
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle" style="background-color: #393939; color:#ffffff !important;">
                                <img class="nav-user-photo" src="../assets/avatars/avatar4.png" alt="Photo"/>
								<span class="user-info">
									<small>Usuario</small>
									<?= yii::$app->user->identity->username; ?>
								</span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>  <?= Html::a(("<i class='ace-icon fa fa-power-off'></i> Salir "), ['site/logout'], ['data-method' => 'post']) ?>       </li>
                            </ul>
                        </li>
                        <!-- /section:basics/navbar.user_menu -->
                    </ul>
                </div>
                <!-- /section:basics/navbar.dropdown -->
            </div>
            <!-- /.navbar-container -->
        </div>

        <!-- /section:basics/navbar.layout -->
        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.check('main-container', 'fixed')
                } catch (e) {
                }
            </script>
            <!-- #section:basics/sidebar -->
            <div id="sidebar" class="sidebar responsive" style="background-color: #F2F2F2;">
                <script type="text/javascript">
                    try {
                        ace.settings.check('sidebar', 'fixed')
                    } catch (e) {
                    }
                </script>

                <div class="sidebar-shortcuts" id="sidebar-shortcuts" >
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">

                <?= Html::a((" <button class='btn btn-success' style='height: 32px; width: 40px'><i class='ace-icon fa fa-signal' style='color: #ffffff ;float:left; margin: -5px 0 0 -3px' ></i></button>"), ['/cf-medical-consultation']) ?>
                <?= Html::a((" <button class='btn btn-info' style='height: 32px; width: 40px'><i class='ace-icon fa fa-pencil' style='color: #ffffff; float:left; margin: -5px 0 0 -3px' ></i>  </button>"), ['/cf-medical-study']) ?>
                <?= Html::a((" <button class='btn btn-warning ' style='height: 32px; width: 40px'><i class='ace-icon fa fa-users'  style='color: #ffffff; float:left;margin: -5px 0 0 -3px  ' ></i>   </button>"), ['/cf-patient']) ?>
                <?= Html::a((" <button class='btn btn-danger ' style='height: 32px; width: 40px'><i class='ace-icon fa fa-cogs ' style='color: #ffffff; float:left;margin: -5px 0 0 -3px ' ></i> </button>"), ['/cf-medical-consultation']) ?>
            <!-- /section:basics/sidebar.layout.shortcuts -->
                    </div>
                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class='btn btn-success'></span>
                        <span class="btn btn-info"></span>
                        <span class="btn btn-warning"></span>
                        <span class="btn btn-danger"></span>
                    </div>
                </div>
                <!-- /.sidebar-shortcuts -->
                <?php    Modal::begin([
                    'id' => 'modal-mesa',
                    'header' => "<h4 class='modal-title'> Registrar Paciente </h4>",
                ]);
                echo "<div class='well'></div>";
                Modal::end();    ?>

                <ul class="nav nav-list">
                    <li class="active">
                        <?= Html::a(("<i class='menu-icon fa fa-tachometer'></i> <span class='menu-text'>Inicio </span> "), ['/']) ?>
                        <b class="arrow"></b>
                    </li>


                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-clone"></i>
							<span class="menu-text">
								Gestionar Entidades
							</span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">

                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Estudio M&eacute;dico"), ['/cf-medical-study']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-lock'></i> <span class='menu-text'>Usuario <i class='menu-icon fa fa-lock'></i></span> "), ['/cf-worker']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> <span class='menu-text'>Trabajador </span> "), ['/cf-worker']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Zonas de Inyeccion"), ['/cf-cod-zonas']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Local"), ['/cf-local']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Nombre Medicos"), ['/cf-nombre-medicos']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Nombre Hospitales"), ['/cf-nombre-hospitales']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Equipos"), ['/cf-equipment']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Tipos de Equipos"), ['/cf-types-equipment']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Nombre de Liofilizado"), ['/cf-nombre-liofilizado']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Nombre de Radiofarmaco"), ['/cf-nombre-radiofarmaco']) ?>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-medkit"></i>
							<span class="menu-text">	Admin Radiofarmacia		</span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i>RadioF&aacute;rmacos"), ['/cf-radiopharmaceutical']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Recepcion Farmacos"), ['/cf-types-radiopharmaceutical']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Generadores"), ['/cf-generator']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Eluciones Diarias"), ['/cf-diary-elution']) ?>
                                <b class="arrow"></b>
                            </li>
							<li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Factores-Dosis-Radiofarmaco"), ['/factores-dosis-radiofarmaco']) ?>
                                <b class="arrow"></b>
                            </li>

                        </ul>
                    </li>
                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-check-square-o"></i>
                            <span class="menu-text"> Control Calidad </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Calidad Equipos"), ['/cf-equipmente']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Calidad parametros"),  ['/cf-equipmente']) ?>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>



                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-book"></i>
                            <span class="menu-text"> Modelo </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Modelo reporte"), ['/cf-loca5l']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <?= Html::a(("<i class='menu-icon fa fa-caret-right'></i> Modelo indicaciones"), ['/cf-generatorr']) ?>
                                <b class="arrow"></b>
                            </li>

                        </ul>
                    </li>

                </ul>
                <!-- /.nav-list -->

                <!-- #section:basics/sidebar.layout.minimize -->
                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left"
                       data-icon2="ace-icon fa fa-angle-double-right" style="background-color: #ffffff;color: #B0AAAA;"></i>
                </div>

                <!-- /section:basics/sidebar.layout.minimize -->
                <script type="text/javascript">
                    try {
                        ace.settings.check('sidebar', 'collapsed')
                    } catch (e) {
                    }
                </script>
            </div>
            <!-- /section:basics/sidebar -->
            <div class="main-content">
                <div class="main-content-inner">
                    <div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
                        <ul class="nav nav-list" style="top: 0px;">
                            <li >
                                <?= Html::a(("<i class='menu-icon fa fa-male'></i> <span class='menu-text'>Pacientes </span> "),
                                    ['/cf-patient']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li >
                                <?= Html::a(("<i class='menu-icon fa fa-stethoscope'></i> <span class='menu-text'>Turnos </span> "),
                                    ['/cf-medical-consultation']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li >
                                <?= Html::a(("<i class='menu-icon fa fa-list-alt'></i> <span class='menu-text'>Recepci&oacute;n </span> "), ['/cf-reception']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li >
                                <?= Html::a(("<i class='menu-icon fa fa-flask'></i> Radiofarmacia"), ['/cf-prepare-doses']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li >
                                <?= Html::a(("<i class='menu-icon fa fa-crosshairs'></i> Administrar Dosis "), ['/cf-administer-doses']) ?>
                                <b class="arrow"></b>
                            </li>
                            <li >
                                <?= Html::a(("<i class='menu-icon fa fa-picture-o'></i> Adquirir Im&aacute;genes"), ['/cf-acquire-image']) ?>
                                <b class="arrow"></b>                            </li>
                            <li >

                                <?= Html::a(("<i class='menu-icon fa fa-spinner'></i> Procesamiento"), ['/cf-processing']) ?>
                                <b class="arrow"></b>
                            </li>

                            <li >

                                <?= Html::a(("<i class='menu-icon fa fa-pencil-square-o'></i> Informar"), ['/cf-report']) ?>
                                <b class="arrow"></b>
                            </li>

                            <li >

                                <?= Html::a(("<i class='menu-icon fa fa-fighter-jet'></i> Entregar"), ['/cf-entrega-reporte']) ?>
                                <b class="arrow"></b>
                            </li>
                            <div class="mensajes"><?= \app\controllers\StaticMembers::MostrarMensajes() ?></div>
                        </ul>
                        <!-- /.nav-list -->
                    </div>

                    <!-- #section:basics/content.breadcrumbs -->
                    <div class="breadcrumbs" id="breadcrumbs" style="background-color: #FCFCFC">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                        <script type="text/javascript">
                            try {
                                ace.settings.check('breadcrumbs', 'fixed')
                            } catch (e) {
                            }
                        </script>
                      <!-- /section:basics/content.searchbox -->
                    </div>

                    <!-- /section:basics/content.breadcrumbs -->
                    <div class="page-content">
                        <!-- /.page-header -->
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS Alertas -->
                                <div class="row">
  <div class="col-sm-12 infobox-container">
      <?= $content ?>
  </div>
                                </div>
                                <!-- /.row -->
                                <!-- #section:custom/extra.hr -->
                                <div class="hr hr32 hr-dotted"></div>
                                <!-- PAGE CONTENT ENDS -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.page-content -->
                </div>
            </div>
            <!-- /.main-content -->
            <?php            }
            else { ?>            <?= $content;            } ?>
            <footer class="footer" style="background-color: black !important;">
                <div class="container" >
                    <p class="pull-right" style="color: white;">&copy; Made By Michi Ing. <?= date('Y') ?></p>
                </div>
            </footer>
<?php $this->endBody(); ?>
</body>
    <!-- SB Admin Scripts - Include with every page -->
</html>
<?php $this->endPage() ?>
