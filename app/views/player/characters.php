<?php
/* @var $this PlayerController */
/* @var $model Player */

$this->breadcrumbs=[
	'Players'=>['index'],
	'Manage',
];

$this->menu=[
	['label'=>'List Player', 'url'=>['index']],
	['label'=>'Create Player', 'url'=>['create']],
];
?>

<h1>Characters</h1>


<?php $this->widget('zii.widgets.grid.CGridView', [
	'id'=>'player-grid',
        'dataProvider'=>$dataProvider,
	'columns'=>[
		'id',
		'name',
		'characterID',
        'corporationID',
        'corporationName',
	/*	array(
			'class'=>'CButtonColumn',
		),*/
	],
]); ?>
