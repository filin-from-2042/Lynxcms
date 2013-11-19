<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->name=>array('view','id'=>$model->item_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список меню', 'url'=>array('index')),
	array('label'=>'Создать меню', 'url'=>array('create')),
	array('label'=>'Обзор меню', 'url'=>array('view', 'id'=>$model->item_id)),
	array('label'=>'Менеджер меню', 'url'=>array('admin')),
);
?>

<h1>Изменить меню <?php echo $model->item_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>