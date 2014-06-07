<?php
/* @var $this PlayerController */
/* @var $model Player */

$this->breadcrumbs=[
	'Players'=>['index'],
	$model->id=>['view','id'=>$model->id],
	'Update',
];

$this->menu=[
	['label'=>'List Player', 'url'=>['index']],
	['label'=>'Create Player', 'url'=>['create']],
	['label'=>'View Player', 'url'=>['view', 'id'=>$model->id]],
	['label'=>'Manage Player', 'url'=>['admin']],
];
?>

<h1>Update Player <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', ['model'=>$model]); ?>