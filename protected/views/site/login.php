<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
    'Login',
);
?>

<div class="login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="#"><b>Antri</b> CUY</a>
		</div>
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in to start your session</p>

				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'login-form',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
				)); ?>

				<p class="note">Fields with <span class="required">*</span> are required.</p>

				<!-- Email Input -->
				<div class="input-group mb-3">
					<?php echo $form->textField($model,'username', array('class'=>'form-control', 'placeholder'=>'Username')); ?>
					<div class="input-group-text">
						<span class="bi bi-envelope"></span>
					</div>
				</div>
				<?php echo $form->error($model,'username'); ?>

				<!-- Password Input -->
				<div class="input-group mb-3">
					<?php echo $form->passwordField($model,'password', array('class'=>'form-control', 'placeholder'=>'Password')); ?>
					<div class="input-group-text">
						<span class="bi bi-lock-fill"></span>
					</div>
				</div>
				<?php echo $form->error($model,'password'); ?>

				<!-- Remember Me -->
				<div class="row">
					<div class="col-8">
						<div class="form-check">
							<?php echo $form->checkBox($model,'rememberMe', array('class'=>'form-check-input')); ?>
							<?php echo $form->label($model,'rememberMe', array('class'=>'form-check-label')); ?>
						</div>
					</div>
					<!-- Submit Button -->
					<div class="col-4">
						<div class="d-grid gap-2">
							<?php echo CHtml::submitButton('Sign In', array('class'=>'btn btn-primary')); ?>
						</div>
					</div>
				</div>

				<?php $this->endWidget(); ?>

				<!-- Forgot Password and Register Links -->
				<p class="mb-0">
					<a href="<?php echo Yii::app()->createUrl('site/register'); ?>" class="text-center">Register a new membership</a>
				</p>
			</div>
		</div>
	</div>
</div>
    
