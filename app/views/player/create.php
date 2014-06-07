<?php
/* @var $this PlayerController */
/* @var $model Player */

$this->breadcrumbs=[
	'Players'=>['index'],
	'Create',
];

$this->menu=[
	['label'=>'List Player', 'url'=>['index']],
	['label'=>'Manage Player', 'url'=>['admin']],
];
?>

<h1>Create Player</h1>

<?php $this->renderPartial('_form', ['model'=>$model]); ?>