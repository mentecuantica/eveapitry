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

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#player-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Players</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',['class'=>'search-button']); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',[
	'model'=>$model,
]); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', [
	'id'=>'player-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>[
		'id',
		'player_name',
		'player_id',
		'player_vcode',
		[
			'class'=>'CButtonColumn',
		],
	],
]); ?>
