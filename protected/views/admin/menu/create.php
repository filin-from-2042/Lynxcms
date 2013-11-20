<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Menus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список меню', 'url'=>array('index')),
	array('label'=>'Менеджер меню', 'url'=>array('admin')),
);
?>

<h1>Создать меню</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>