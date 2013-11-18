<?php
/* @var $this ContentController */
/* @var $model Content */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список контента', 'url'=>array('index')),
	array('label'=>'Менеджер контента', 'url'=>array('admin')),
);
?>

<h1>Создать контент</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>