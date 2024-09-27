<?php
/* @var $this MerchantsController */
/* @var $model Merchants */

$this->breadcrumbs=array(
	'Merchants'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Merchants', 'url'=>array('index')),
	array('label'=>'Create Merchants', 'url'=>array('create')),
	array('label'=>'View Merchants', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Merchants', 'url'=>array('admin')),
);
?>

<h1>Update Merchants <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>