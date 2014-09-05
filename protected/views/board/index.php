<?php
/* @var $this BoardController */
/* @var $dataProvider CActiveDataProvider */
$title = 'Tất cả các bảng';
if(isset($_GET['id'])) $title = 'Danh sách bảng';
if(isset($_GET['type_id'])) {
	if($_GET['type_id']==1) $title= 'Danh sách bảng AOE';
	if($_GET['type_id']==2) $title= 'Danh sách bảng FlappyBird';
	if($_GET['type_id']==3) $title= 'Danh sách bảng Football';
	if($_GET['type_id']==4) $title= 'Danh sách bảng Coding';
}
$this->breadcrumbs=array(
		$title,
);

$flashMessages = Yii::app()->user->getFlashes();
	if ($flashMessages) {
	    foreach($flashMessages as $key => $message) {
	        echo '<div class="alert alert-' . $key . '" role="alert">' . $message . "</div>\n";
	}
}
?>
<div class="panel panel-default">
	<div class="panel-heading" style="background-color:#428bca;color:white">
	<h1><?php echo $title ?></h1>
	</div>
	<div class="panel-body">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
	</div>
</div>
