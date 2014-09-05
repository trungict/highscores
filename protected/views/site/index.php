<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<div class="panel panel-default">
  <div class="panel-heading" style="background-color:#428bca;color:white">
    <h1>Top 5 BXH mới nhất</h1>
  </div>
  <div class="panel-body">
  <?php foreach ($models as $model) {
  	if($model->type_id == 1) $img = 'aoe.jpg';
	if($model->type_id == 2) $img = 'fb.jpg';
	if($model->type_id == 3) $img = 'football.jpg';
	if($model->type_id == 4) $img = 'coding.jpg';	?>
	<div class="row item">
	<div class="col-md-2">

	<img class="img-responsive ava" width="70px" height="50px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $img?>"/>
	</div>
	<div class="col-md-6">
	<b><?php echo $model->getAttributeLabel('name'); ?>:</b>
	<?php echo $model->name ?>
	<br />
	<b><?php echo $model->getAttributeLabel('author_id'); ?>:</b>
	<kbd><?php $user = User::model()->find('id=:id', array(':id' => $model->author_id));
	echo CHtml::link(CHtml::encode($user->username), array('user/panel', 'id'=>$user->id), array('class' => 'whites')); ?></kbd>
	<br />

	<b><?php echo $model->getAttributeLabel('create_time'); ?>:</b>
	<?php echo $model->create_time; ?>
	<br />
	</div>
	<div class="col-md-4">
	<a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/game/index?board_id=<?php echo $model->id;?>">Xem</a>
	</div>
  </div>
  <?php } ?>
</div>
