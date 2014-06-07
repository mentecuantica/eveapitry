<?php
/* @var $this PlayerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=[
	'Players',
];

$this->menu=[
	['label'=>'Create Player', 'url'=>['create']],
	['label'=>'Manage Player', 'url'=>['admin']],

];
?>

<h1>Players</h1>

<?php $this->widget('zii.widgets.CListView', [
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
]); ?>
