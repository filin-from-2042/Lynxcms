<?php
/* @var $this MenuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Menus',
);

$this->menu=array(
	array('label'=>'Создать меню', 'url'=>array('create')),
	array('label'=>'Менеджер меню', 'url'=>array('admin')),
);
?>

<h1>Меню</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
