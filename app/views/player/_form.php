<?php
/* @var $this PlayerController */
/* @var $model Player */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', [
	'id'=>'player-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
]); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'player_name'); ?>
		<?php echo $form->textField($model,'player_name',['size'=>50,'maxlength'=>50]); ?>
		<?php echo $form->error($model,'player_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'player_id'); ?>
		<?php echo $form->textField($model,'player_id',['size'=>16,'maxlength'=>16]); ?>
		<?php echo $form->error($model,'player_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'player_vcode'); ?>
		<?php echo $form->textField($model,'player_vcode',['size'=>60,'maxlength'=>255]); ?>
		<?php echo $form->error($model,'player_vcode'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->