<?php
/* @var $this QueuesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Queues',
);

$this->menu=array(
	array('label'=>'Create Queues', 'url'=>array('create')),
	array('label'=>'Manage Queues', 'url'=>array('admin')),
);
?>

<h1>Queues</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
