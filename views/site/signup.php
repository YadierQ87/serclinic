<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Pais;
use app\models\User;
use app\controllers\SiteController;

$this->title = SiteController::translate('Registro de Usuario');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login" style="background-color: black !important; width: 100%; height: 100%;">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">
                            <h1>
                                <i class="ace-icon fa fa-leaf green"></i>
                                <span class="red"> Servicios </span>
                                <span class="white" id="id-text2">Cl&iacute;nicos</span>
                            </h1>
                            <h4 class="blue" id="id-company-text">&copy; Cl&iacute;nica Kohly</h4>
                        </div>

                        <div class="space-6"></div>

                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header green lighter bigger">
                                            <i class="ace-icon fa fa-users blue"></i>
                                            Nuevo Registro de Usuario
                                        </h4>

                                        <div class="space-6"></div>
                                        <p> Los datos de usuario: </p>

                                        <form>
                                            <fieldset>
                                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                                                </label>

                                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
                                                </label>

                                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                                </label>

                                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Repeat password" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
                                                </label>

                                                <label class="block">
                                                    <input type="checkbox" class="ace" />
														<span class="lbl">
															Acepto
															<a href="#">Acuerdo Usuario</a>
														</span>
                                                </label>

                                                <div class="space-24"></div>

                                                <div class="clearfix">
                                                    <button type="reset" class="width-30 pull-left btn btn-sm">
                                                        <i class="ace-icon fa fa-refresh"></i>
                                                        <span class="bigger-110">Cancel</span>
                                                    </button>

                                                    <button type="button" class="width-65 pull-right btn btn-sm btn-success">
                                                        <span class="bigger-110">Registrar</span>

                                                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                    </button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>

                                    <div class="toolbar center">
                                        <?= Html::a(("<i class='ace-icon fa fa-arrow-left'></i> Volver Inicio"), ['/site/login'],['class'=>'forgot-password-link']) ?>
                                    </div>

                                    </div><!-- /.widget-main -->

                                </div><!-- /.widget-body -->
                            </div><!-- /.login-box -->
                        </div><!-- /.position-relative -->
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->






    

