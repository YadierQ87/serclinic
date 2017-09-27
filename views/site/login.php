<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Acceso - Clinica';
//$this->layout = 'login.php';
//$this->params['breadcrumbs'][] = $this->title;
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
									<span class="white" id="id-text2">Clínicos</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Clínica Kohly</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-lock green"></i>
												Autenticarse
											</h4>

											<div class="space-6"></div>



<?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-4 control-label'],
        ],
    ]); ?>
          <div ><?= $form->field($model, 'username') ?></div>
			<div ><?= $form->field($model, 'password')->passwordInput() ?></div>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
			<label class="inline" style="float: left;">
				<input type="checkbox" class="ace" />
				<span class="lbl"> Remember Me </span>
				<span class="lbl"> &nbsp; </span>
			</label>
            <?= Html::submitButton("Acceso <i class='ace-icon fa fa-key'></i>", ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
	</div><!-- /.widget-main -->
	<div class="toolbar clearfix">
		<div><?= Html::a(("<i class='ace-icon fa fa-arrow-left'></i> Olvide mi password"), ['/site/retrievepasswd'],['class'=>'forgot-password-link']) ?></div>
		<div><?= Html::a(("<i class='ace-icon fa fa-arrow-right'></i> Registrarme"), ['/site/signup'],['class'=>'forgot-password-link']) ?></div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->




	