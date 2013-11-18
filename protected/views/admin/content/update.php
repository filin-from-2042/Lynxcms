<?php
/* @var $this ContentController */
/* @var $model Content */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->title=>array('view','id'=>$model->content_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список контента', 'url'=>array('index')),
	array('label'=>'Создать контент', 'url'=>array('create')),
	array('label'=>'Просмотр контента', 'url'=>array('view', 'id'=>$model->content_id)),
	array('label'=>'Менеджер контента', 'url'=>array('admin')),
);
?>

<h1>Изменить контент <?php echo $model->content_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>