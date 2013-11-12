<?php
/* @var $this ContentController */
/* @var $model Content */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список контента', 'url'=>array('index')),
	array('label'=>'Создать контент', 'url'=>array('create')),
	array('label'=>'Редактировать контент', 'url'=>array('update', 'id'=>$model->content_id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->content_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Менеджер контента', 'url'=>array('admin')),
        array('label'=>'Создать тег', 'url'=>array('')),
        array('label'=>'Редактировать тег', 'url'=>array('admin')),
        array('label'=>'Удалить тег', 'url'=>array('admin')),
);
?>

<h1>Обзор контента #<?php echo $model->content_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'content_id',
		'title',
		'alias',
		'content',
		'published',
		'keywords',
		'description',
		'created_by',
		'creation_date',
		'updated_by',
		'updation_date',
		'category_id',
	),
)); ?>
