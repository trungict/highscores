<?php
/* @var $this GameController */
/* @var $model Game */

$this->breadcrumbs=array(
	'Cập nhật BXH',
);

?>

<h1>Thêm mới</h1>
<p><mark>Chú ý!</mark> Tên người chơi phân biệt hoa, thường</p>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>