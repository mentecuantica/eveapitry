<?php
/**
 * Project: eve2
 *
 * @author Yuri Efimov
 * @email yura.karas@gmail.com
 * @git  https://bitbucket.org/yurakaras
 * @date 6/7/2014  07:39
 * 
 */


/* @var $this EveApiController */
/* @var $dp1 CArrayDataProvider */

?>


<section>
    <h3>Character - Contact List</h3>

    <?php $this->widget(
        'zii.widgets.grid.CGridView',
        [
            'id' => 'player-grid',
            'dataProvider' => $dp1,
            'columns' => [
                'id',
                'contactID',
                'contactName',
                'inWatchlist',
                'standing',
               'contactTypeID'

            ],
        ]
    ); ?>


</section>