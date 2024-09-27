<?php
/* @var $this MerchantsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Merchants',
);

$this->menu=array(
	array('label'=>'Create Merchants', 'url'=>array('create')),
	array('label'=>'Manage Merchants', 'url'=>array('admin')),
);
?>

<h1>Merchants</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
