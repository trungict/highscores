<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'Bảng'=>array('index'),
	$board->name=>array('view','id'=>$board->id),
	'Cập nhật bảng',
);

?>

<h1>Cập nhật bảng <kbd><?php echo $board->name; ?></kbd></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'board'=>$board)); ?>