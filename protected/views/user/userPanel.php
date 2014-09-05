<?php
$this->pageTitle=Yii::app()->name . ' - Trang cá nhân - '.$model->username;
$this->breadcrumbs=array(
	'Trang cá nhân - '.$model->username,
);
$flashMessages = Yii::app()->user->getFlashes();
	if ($flashMessages) {
	    foreach($flashMessages as $key => $message) {
	        echo '<div class="alert alert-' . $key . '" role="alert">' . $message . "</div>\n";
	}
}
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h1>Người dùng <kbd><?php echo $model->username ?></kbd>
  </div>
  <div class="panel-body">
  <div class="list-group">
  <span class="list-group-item"><strong>Ngày tham gia:</strong> <?php echo $model->joined?></span>
  <span class="list-group-item"><strong>Số bảng đã tạo: </strong><?php echo $count ?>
  <?php if(Yii::app()->user->id != $model->id) {?>
  <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/board/index?id=<?php echo $model->id;?>" class="btn btn-primary" style="margin-left: 20px;">Danh sách</a><?php } ?></span>

  </div>
  </div>
</div>
