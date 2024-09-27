<?php
/* @var $this QueuesController */
/* @var $model Queues */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'queues-form',
    'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <?php echo $form->hiddenField($model, 'user_id', array('value' => Yii::app()->user->id)); ?>
    <?php echo $form->error($model, 'user_id'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'Merchant'); ?>
    <?php echo $form->dropDownList($model, 'merchant_id', CHtml::listData(Merchants::model()->findAll(), 'id', 'name'), array(
        'prompt' => 'Select a Merchant',
        'ajax' => array(
            'type' => 'POST',
            'url' => CController::createUrl('queues/loadServices'),
            'update' => '#Queues_service_id',
            'data' => array(
                'merchant_id' => 'js:this.value',
                // CSRF token
                Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
            ),
        ),
    )); ?>
    <?php echo $form->error($model, 'merchant_id'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'Service'); ?>
    <?php
    // Dropdown for Service, which will be populated via AJAX
    echo $form->dropDownList($model, 'service_id', array(), array(
        'prompt' => 'Select a Service',
    )); 
    ?>
    <?php echo $form->error($model, 'service_id'); ?>
</div>

<?php if (Yii::app()->user->name === 'admin'): ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'queue_status'); ?>
        <?php echo $form->dropDownList($model, 'queue_status', array(
            'waiting' => 'Waiting',
            'completed' => 'Completed'
        ), array(
            'prompt' => 'Select Status',
            'options' => array(
                'waiting' => array('selected' => true), // Default to 'waiting'
            ),
        )); ?>
        <?php echo $form->error($model, 'queue_status'); ?>
    </div>
<?php endif; ?>

<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Get Queue Number' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>

<?php if (!$model->isNewRecord && isset($queueNumber)): ?>
    <h3>Your Queue Number is: <?php echo $queueNumber; ?></h3>
<?php endif; ?>

</div><!-- form -->
