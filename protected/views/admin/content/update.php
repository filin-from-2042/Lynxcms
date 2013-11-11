<?php
/* @var $this ContentController */
/* @var $model Content */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->title=>array('view','id'=>$model->content_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Content', 'url'=>array('index')),
	array('label'=>'Create Content', 'url'=>array('create')),
	array('label'=>'View Content', 'url'=>array('view', 'id'=>$model->content_id)),
	array('label'=>'Manage Content', 'url'=>array('admin')),
);
?>

<h1>Update Content <?php echo $model->content_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>