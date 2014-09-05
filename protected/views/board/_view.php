<?php
/* @var $this BoardController */
/* @var $data Board */
?>
<div class="row item">
	<div class="col-md-2">
	<?php
	if(CHtml::encode($data->type_id) == 1) $img = 'aoe.jpg';
	if(CHtml::encode($data->type_id) == 2) $img = 'fb.jpg';
	if(CHtml::encode($data->type_id) == 3) $img = 'football.jpg';
	if(CHtml::encode($data->type_id) == 4) $img = 'coding.jpg';?>
	<img class="img-responsive ava" width="70px" height="50px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $img;?>"/>
	</div>
	<div class="col-md-6">
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo $data->name ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('author_id')); ?>:</b>
	<kbd><?php $user = User::model()->find('id=:id', array(':id' => CHtml::encode($data->author_id)));
	echo CHtml::link(CHtml::encode($user->username), array('user/panel', 'id'=>$user->id), array('class' => 'whites')); ?></kbd>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />
	</div>
	<div class="col-md-4">
	<a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/game/index?board_id=<?php echo $data->id;?>">Xem</a>
	<?php if (Yii::app()->user->id == $data->author_id) { ?>
	<a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/board/update/<?php echo $data->id;?>">Sửa</a>
	<?php echo CHtml::link(CHtml::encode('Xóa'), array('board/delete', 'id'=>$data->id),
  		array(
    'submit'=>array('board/delete', 'id'=>$data->id),
    'class' => 'btn btn-primary','confirm'=>'Bạn có chắc chắn muốn xóa bảng này?'
  		)
	); }?>
	</div>

</div>