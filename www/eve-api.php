<?php
/**
 * Project: eve2
 *
 * @author Yuri Efimov
 * @email yura.karas@gmail.com
 * @git  https://bitbucket.org/yurakaras
 * @date 6/7/2014  01:46
 * 
 */

date_default_timezone_set("Asia/Yekaterinburg");
require __DIR__ . '/../vendor/autoload.php';

use Pheal\Pheal;
use Pheal\Core\Config;
// create pheal object with default values
// so far this will not use caching, and since no key is supplied
// only allow access to the public parts of the EVE API
//$pheal = new Pheal();

Config::getInstance()->http_ssl_verifypeer = false;

//$response = $pheal->serverScope->ServerStatus();


/*echo sprintf(
    "Hello Visitor! The EVE Online Server is: %s!, current amount of online players: %s",
    $response->serverOpen ? "open" : "closed",
    $response->onlinePlayers
);*/



// создать объект Pheal
$phealId= new Pheal($keyId, $vCode);

/**
 * Все вызовы разделены на scope (пространства)
 * scope - в URL является вторым после адреса
 *
 * указываем что будем использовать scope "some"
 * $pheal->someScope
 *
 * далее идёт вызов метода API - название метода полностью совпадает
 * с документацией - регистр учитывается
 *
 * Вызов AnyMethod - не требует параметров, из some scope
 * $response = $pheal->someScope->AnyMethod()
 *
 * $response - это ответ в формате Pheal
 *
 * Вызов метда с 2 параметрами - параметры передаются как массив
 * $response = $pheal->someScope->ParamsMethod(
 * ["id"=>1222,"location"=>"100.1,12.2"])
 *
 *
 *
 *
 */

//$phealId->accountScope->AccountStatus();

$responseChars = $phealId->accountScope->Characters();




foreach($responseChars->characters as $character) {
    /*echo $character->name."\n";
    echo $character->corporationName."\n";
    echo $character->corporationID."\n";
    echo $character->characterID."\n";
    echo ",,,,,,,,,\n";*/

}

$responseChars = $phealId->charScope->ContactList(
    ["apiKey"=>$vCode,
     "characterId"=>"94403918",
      "userId"=>$keyId  ]);


$list1 =$responseChars->contactList;
$list2 = $responseChars->corporateContactList;
$list3 = $responseChars->allianceContactsList;


foreach ($list1 as $contact) {
  //  foreach ($contactType as $contact) {
        ?><div><?=$contact->contactID?></div><?
 //   }


}


