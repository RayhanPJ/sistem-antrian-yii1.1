<?php
/* @var $this MerchantsController */
/* @var $model Merchants */

$this->breadcrumbs=array(
	'Merchants'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Merchants', 'url'=>array('index')),
	array('label'=>'Manage Merchants', 'url'=>array('admin')),
);
?>

<h1>Create Merchants</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>