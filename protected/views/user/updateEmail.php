<?php
$this->pageTitle=Yii::app()->name . ' - Thay đổi Email';
$this->breadcrumbs=array(
	'Thay đổi Email',
);?>
<h1>Thay đổi Email</h1>

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
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
		</div>
		<div class="form-group">
		<?php echo $form->labelEx($model,'newEmail'); ?>
		<?php echo $form->textField($model,'newEmail'); ?>
		<?php echo $form->error($model,'newEmail'); ?>
		</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Cập nhật',array('class' => 'btn btn-primary')); ?>
	</div>
</div><!-- form -->
<?php $this->endWidget(); ?>