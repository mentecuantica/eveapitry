<?php
/* @var $this EveApiController */

$this->breadcrumbs=[
	'Eve Api',
];
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
    Wiki about Eve API2 - here <a href="http://wiki.eve-id.net/APIv2_Page_Index">http://wiki.eve-id.net/APIv2_Page_Index</a>


</p>

<section>
    <p>While using Pheal instance, you can consider this "scopes": <? foreach ($scopes as $name=>$short) {
    ?><div><?=$name?> => <?=$short?></div>
   <? } ?></p>

    <h2>This example uses my sample Eve online auth data, which is stored in Yii config.php </h2>
    <h4>Please change to yours, mine is basically empty</h4>
    <p>
        <strong>vCode:<?=strlen(Yii::app()->params->vCode);?> symbols</strong>
       </p>
    <p>
        <strong>keyId:<?=strlen(Yii::app()->params->keyId);?> digits</strong>

    </p>
    <p>
        <a href="https://secure.eveonline.com/trial/">To obtain your own keys you need to register</a>
    </p>
</section>


<section>


    <h3>Account</h3>

    <p>api call example:
    <?=CHtml::link('Characters (List)', ['characters']);?>
         you can call a contact list request from characters table (click on view button)

        <pre>My account has no characters</pre>
    </p>




    <h3>Server</h3>
    <p>api call example:
        <?=CHtml::link('Servers status (List of)', ['serverStatus']);?>
    <pre>No parameters required</pre>
    </p>
</section>