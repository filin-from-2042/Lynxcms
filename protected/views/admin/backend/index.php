<?php
/* @var $this BackendController */

$this->breadcrumbs=array(
	'Backend',
);
?>
<h1><?php echo 'Добро пожаловать в административную панель' ?></h1>
<br/>
<p>
    Главная страница административной панели
</p>

<p>
	
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Категории', 'url'=>array('//admin/category'),),
				array('label'=>'Контент', 'url'=>array('/admin/content', )),
				array('label'=>'Пользователи', 'url'=>array('/admin/user')),
                                array('label'=>'Настройки', 'url'=>array('#')),
                                array('label'=>'Общие сведения', 'url'=>array('#')),
                                ),
		)); ?>
	
</p>
