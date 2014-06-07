<?php
/* @var $this EveApiController */

$this->breadcrumbs = [
    'Eve Api',
];
?>


<section>
    <h3>Account - characters</h3>

    <?php $this->widget(
        'zii.widgets.grid.CGridView',
        [
            'id' => 'player-grid',
            'dataProvider' => $dp,
            'columns' => [
                'id',
                'name',
                'characterID',
                'corporationID',
                'corporationName',
                [
                    'class' => 'CButtonColumn',
                    'template'=>'{view}',
                    'buttons'=>[
                        'view'=>[
                            'label'=>'View contacts list',
                            'url'=>'Yii::app()->controller->createUrl("contactList",array("characterID"=>$data->characterID))'

                        ],
                    ]
                ],
            ],
        ]
    ); ?>

    <h4>Pheal response \Pheal\Core\Result as array</h4>

    <p><?= CVarDumper::dumpAsString($response->toArray(), 10, true); ?></p>
</section>