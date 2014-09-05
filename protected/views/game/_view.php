<?php
/* @var $this GameController */
/* @var $data Game */
?>
<td><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/game/player?name=<?php echo $model->player;?>"><span class="glyphicon glyphicon-user" style="margin-right:20px"></span><?php echo $model->player ?>
<td><?php echo $model->score ?><td><?php if(Yii::app()->user->id == $board->author_id) {?>
	<a class="btn btn-primary fix" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/game/update/<?php echo $model->id;?>">Sửa</a>
	<?php echo CHtml::link(CHtml::encode('Xóa'), array('game/delete', 'id'=>$model->id),
  		array(
    'submit'=>array('game/delete', 'id'=>$model->id),
    'class' => 'btn btn-primary fix','confirm'=>'Bạn có chắc chắn muốn xóa game này?'
  		)
	); }?>

