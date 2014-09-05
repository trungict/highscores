<?php
$this->pageTitle=Yii::app()->name . ' - Người chơi - '.$_GET['name'];
$this->breadcrumbs=array(
	'Người chơi - '.$_GET['name'],
);

?>
<div class="row">
<div class="col-md-6">
<h1>Người chơi  <kbd><?php echo $_GET['name']; ?></kbd></h1>
<br><br>
<table class="table table-striped table-bordered">
<thead><th>#<th>Điểm<th>Bảng</thead>
<tbody>
<?php
$i = 1;
foreach ($models as $model) {
	$board = Board::model()->findByPk($model->board_id);
	echo '<tr><td>'.$i.'<td>'.$model->score.'<td><a href="'.Yii::app()->request->baseUrl.'/index.php/game/index?board_id='.$board->id.'">'.$board->name.'</a>';
	$i++;
}
?>
</tbody>
<tbody>
</table>
</div>
</div>