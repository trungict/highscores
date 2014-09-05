<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'Bảng'=>array('index'),
	'Tạo bảng',
);

?>

<h1>Tạo bảng mới</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'board'=>$board)); ?>