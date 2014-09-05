<?php
/* @var $this GameController */
/* @var $dataProvider CActiveDataProvider */
$board = Board::model()->find('id=:id', array(':id' => $_GET['board_id']));
$title =$board->name;
if(CHtml::encode($board->type_id) == 1) $img = 'aoe.jpg';
if(CHtml::encode($board->type_id) == 2) $img = 'fb.jpg';
if(CHtml::encode($board->type_id) == 3) $img = 'football.jpg';
if(CHtml::encode($board->type_id) == 4) $img = 'coding.jpg';
$this->breadcrumbs=array(
	$title,
);
$flashMessages = Yii::app()->user->getFlashes();
	if ($flashMessages) {
	    foreach($flashMessages as $key => $message) {
	        echo '<div class="alert alert-' . $key . '" role="alert">' . $message . "</div>\n";
	}
}
$i=1;
if($count==0) {
	if(Yii::app()->user->id == $board->author_id) echo '<br><br><h3 class="text-center">Hiện tại BXH đang trống, bấm <a href="'.Yii::app()->request->baseUrl.'/index.php/game/create?board_id='.$_GET['board_id'].'" class="btn btn-primary">Thêm mới</a> để cập nhật BXH';
	else echo '<br><br><h2 class="text-center">Hiện tại BXH chưa có kết quả nào';
	}else { ?>


<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="row" style="margin-bottom: 20px;">
			<div class="col-md-2 col-md-offset-2"><img class="img-responsive ava" width="70px" height="70px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $img;?>"/></div>	
			<div class="col-md-7"><h3><kbd><?php echo $title;?></kbd></div>
		</div>
	<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<a class="whites" href="<?php echo Yii::app()->request->baseUrl.'/index.php/game/index?board_id='.$_GET['board_id']?>"><kbd>Tất cả</kbd></a>
		<a class="whites" href="<?php echo Yii::app()->request->baseUrl.'/index.php/game/index?board_id='.$_GET['board_id'].'&topPlayer'?>"><kbd>Top 10 Cao thủ</kbd></a>
		<a class="whites" href="<?php echo Yii::app()->request->baseUrl.'/index.php/game/index?board_id='.$_GET['board_id'].'&topGame'?>"><kbd>Top 10 lượt chơi</kbd></a>
	</div>
	</div>
	<br>

	<table class="table table-striped table-bordered">
	<thead><th>#<th>Người chơi<th>Điểm<th>Quản lý</thead>
	<tbody class="table table-hover">

<?php foreach ($models as $model) {

	echo '<tr><td>'.$i;
	$this->renderPartial('_view', array('model'=>$model,'board'=>$board));
	$i++;
} ?>
	</tbody>
	</table>
	<?php if(Yii::app()->user->id == $board->author_id) { ?> <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/game/create?board_id=<?php echo $_GET['board_id']?>" class="btn btn-primary">Thêm mới</a><?php } ?>
	</div>
	<div class="col-md-1"></div>
</div>
<?php } ?>
