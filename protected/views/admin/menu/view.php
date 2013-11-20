<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список меню', 'url'=>array('index')),
	array('label'=>'Создать меню', 'url'=>array('create')),
	array('label'=>'Изменить меню', 'url'=>array('update', 'id'=>$model->item_id)),
	array('label'=>'Удалить меню', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->item_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Менеджер меню', 'url'=>array('admin')),
);
?>

<h1>Обзор меню #<?php echo $model->item_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'item_id',
		'name',
		'url',
		'position',
		'published',
		'content_id',
	),
)); ?>
