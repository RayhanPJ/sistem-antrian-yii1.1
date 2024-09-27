<?php
/* @var $this QueuesController */
/* @var $model Queues */

$this->breadcrumbs=array(
	'Queues'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Queues', 'url'=>array('index')),
	array('label'=>'Create Queues', 'url'=>array('create')),
	array('label'=>'View Queues', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Queues', 'url'=>array('admin')),
);
?>

<h1>Update Queues <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>