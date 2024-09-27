<?php
/* @var $this QueuesController */
/* @var $model Queues */

$this->breadcrumbs=array(
	'Queues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Queues', 'url'=>array('index')),
	array('label'=>'Manage Queues', 'url'=>array('admin')),
);
?>

<h1>Create Queues</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>