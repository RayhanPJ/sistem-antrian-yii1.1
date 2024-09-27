<?php
/* @var $this MerchantsController */
/* @var $model Merchants */

$this->breadcrumbs=array(
	'Merchants'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Merchants', 'url'=>array('index')),
	array('label'=>'Create Merchants', 'url'=>array('create')),
	array('label'=>'Update Merchants', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Merchants', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Merchants', 'url'=>array('admin')),
);
?>

<h1>View Merchants #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'location',
		'category',
		'created_at',
	),
)); ?>
