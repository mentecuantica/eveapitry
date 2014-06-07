<?php
/* @var $this PlayerController */
/* @var $model Player */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', [
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
]); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',['size'=>11,'maxlength'=>11]); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'player_name'); ?>
		<?php echo $form->textField($model,'player_name',['size'=>50,'maxlength'=>50]); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'player_id'); ?>
		<?php echo $form->textField($model,'player_id',['size'=>16,'maxlength'=>16]); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'player_vcode'); ?>
		<?php echo $form->textField($model,'player_vcode',['size'=>60,'maxlength'=>255]); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->