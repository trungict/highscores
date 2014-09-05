<?php
/* @var $this GameController */
/* @var $model Game */

$this->breadcrumbs=array(
	'Games'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Cập nhật',
);

?>

<h1>Cập nhật điểm mới</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>