<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Recuperar Password';
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
												<h4 class="header red lighter bigger">
													<i class="ace-icon fa fa-key"></i>
													Recuperar Password
												</h4>

												<div class="space-6"></div>
												<p>
													Entre su direccion email para recibir instrucciones
												</p>

												<form>
													<fieldset>
														<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
														</label>

														<div class="clearfix">
															<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
																<i class="ace-icon fa fa-lightbulb-o"></i>
																<span class="bigger-110">Enviar !</span>
															</button>
														</div>
													</fieldset>
												</form>
											</div><!-- /.widget-main -->

											<div class="toolbar center">
												<?= Html::a(("<i class='ace-icon fa fa-arrow-right'></i> Volver Inicio"), ['/site/login'],['class'=>'forgot-password-link']) ?>
											    <br>
											</div>

								</div><!-- /.widget-body -->
							</div><!-- /.login-box -->
						</div><!-- /.position-relative -->
					</div>




