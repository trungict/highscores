<?php
$this->pageTitle=Yii::app()->name . ' - Thay đổi mật khẩu';
$this->breadcrumbs=array(
	'Thay đổi mật khẩu',
);?>
<h1>Thay đổi mật khẩu</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'updatePassword-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
	'validateOnSubmit'=>true,
	),
)); ?>
		<?php echo $form->errorSummary($model);?>
		<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		</div>
		<div class="form-group">
		<?php echo $form->labelEx($model,'newPassword'); ?>
		<?php echo $form->passwordField($model,'newPassword'); ?>
		<?php echo $form->error($model,'newPassword'); ?>
		</div>
		<div class="form-group">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->passwordField($model,'password2'); ?>
		<?php echo $form->error($model,'password2'); ?>
		</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Cập nhật',array('class' => 'btn btn-primary')); ?>
	</div>
</div><!-- form -->
<?php $this->endWidget(); ?>