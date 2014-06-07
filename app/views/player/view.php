<?php
/* @var $this PlayerController */
/* @var $model Player */

$this->breadcrumbs=[
	'Players'=>['index'],
	$model->id,
];

$this->menu=[
	['label'=>'List Player', 'url'=>['index']],
	['label'=>'Create Player', 'url'=>['create']],
	['label'=>'Update Player', 'url'=>['update', 'id'=>$model->id]],
	['label'=>'Delete Player', 'url'=>'#', 'linkOptions'=>['submit'=>['delete','id'=>$model->id],'confirm'=>'Are you sure you want to delete this item?']],
	['label'=>'Manage Player', 'url'=>['admin']],
];
?>

<h1>View Player #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', [
	'data'=>$model,
	'attributes'=>[
		'id',
		'player_name',
		'player_id',
		'player_vcode',
	],
]); ?>
