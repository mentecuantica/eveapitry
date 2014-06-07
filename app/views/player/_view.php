<?php
/* @var $this PlayerController */
/* @var $data Player */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), ['view', 'id'=>$data->id]); ?>
	<br />

    <b>Characters!</b>
	<?php echo CHtml::link(CHtml::encode($data->id), ['characters', 'id'=>$data->id]); ?>
	<br />



	<b><?php echo CHtml::encode($data->getAttributeLabel('player_name')); ?>:</b>
	<?php echo CHtml::encode($data->player_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('player_id')); ?>:</b>
	<?php echo CHtml::encode($data->player_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('player_vcode')); ?>:</b>
	<?php echo CHtml::encode($data->player_vcode); ?>
	<br />


</div>