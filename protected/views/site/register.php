<?php
/* @var $this SiteController */
/* @var $model RegisterForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
    'Register',
);
?>

<div class="register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Antri</b> CUY</a>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">Register a new membership</p>

                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'register-form',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                )); ?>

                <p class="note">Fields with <span class="required">*</span> are required.</p>

                <!-- Username Input -->
                <div class="input-group mb-3">
                    <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'placeholder' => 'Username')); ?>
                    <div class="input-group-text">
                        <span class="bi bi-person"></span>
                    </div>
                </div>
                <?php echo $form->error($model, 'username'); ?>

                <!-- Email Input -->
                <div class="input-group mb-3">
                    <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                    <div class="input-group-text">
                        <span class="bi bi-envelope"></span>
                    </div>
                </div>
                <?php echo $form->error($model, 'email'); ?>

                <!-- Password Input -->
                <div class="input-group mb-3">
                    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => 'Password')); ?>
                    <div class="input-group-text">
                        <span class="bi bi-lock-fill"></span>
                    </div>
                </div>
                <?php echo $form->error($model, 'password'); ?>

                <!-- Confirm Password Input -->
                <div class="input-group mb-3">
                    <?php echo $form->passwordField($model, 'confirmPassword', array('class' => 'form-control', 'placeholder' => 'Confirm Password')); ?>
                    <div class="input-group-text">
                        <span class="bi bi-lock-fill"></span>
                    </div>
                </div>
                <?php echo $form->error($model, 'confirmPassword'); ?>

                <!-- Terms and Agreement -->
                <div class="row">
                    <!-- Register Button -->
                    <div class="col-4">
                        <div class="d-grid gap-2">
                            <?php echo CHtml::submitButton('Register', array('class' => 'btn btn-primary')); ?>
                        </div>
                    </div>
                </div>

                <?php $this->endWidget(); ?>

                <p class="mb-0">
                    <a href="<?php echo Yii::app()->createUrl('/site/login'); ?>" class="text-center">I already have a membership</a>
                </p>
            </div>
        </div>
    </div>
</div>