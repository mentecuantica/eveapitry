<?php
/* @var $this EveApiController */
/**@var $response \Pheal\Core\Result **/
$this->breadcrumbs=[
	'Eve Api',
];
?>


<section>
    <h3>Server - ServerStatus </h3>

    <code><a href="http://api.eve-online.com/server/ServerStatus.xml.aspx">http://api.eve-online.com/server/ServerStatus.xml.aspx</a></code>

    <p>Server status:<?=$response->serverOpen?></p>

    <p>How many players are currently signed into eve:<?=$response->onlinePlayers?></p>


    <h4>Pheal response \Pheal\Core\Result as array</h4>
    <p><?=CVarDumper::dumpAsString($response->toArray(),10,true);?></p>
</section>