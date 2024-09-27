<?php
/* @var $this QueuesController */
/* @var $model Queues */

$this->breadcrumbs=array(
	'Queues'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Queues', 'url'=>array('index')),
	array('label'=>'Create Queues', 'url'=>array('create')),
	array('label'=>'Update Queues', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Queues', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Queues', 'url'=>array('admin')),
);
?>

<h1>View Queues #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'merchant_id',
		'service_id',
		'queue_number',
		'queue_status',
		'created_at',
	),
)); ?>
