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

use Pheal\Pheal;
use Pheal\Core\Config;

// i use this cause of ssl verifing error, haven't dig deeper
Config::getInstance()->http_ssl_verifypeer = false;

class EveApiController extends Controller
{
    public function actionIndex()
    {
        $scopes = [
            'account' => 'account',
            'character' => 'char',
            'corporation' => 'corp',
            "eve" => "eve",
            "map" => "map",
            "server" => "server",
            "api" => "api",

        ];

        $this->render("index", ['scopes' => $scopes]);
    }


    /**
     * Find characters by requesting /account/Characters.xml.aspx
     *
     *
     * requires two params
     * @var $keyID int - The ID of the Customizable API Key for authentication, found at: @link https://support.eveonline.com/api
     * @var $vCode string - The user defined or CCP generated Verification Code for the Customizable API Key, found at @link https://support.eveonline.com/api.
     *
     * @link http://wiki.eve-id.net/APIv2_Account_Characters_XML
     *
     */
    public function actionCharacters()
    {

        /**@var $player Player * */
        //$player = Player::model()->findByPk(2);
        //$playerId = $player->player_id;

        $vCode = Yii::app()->params->vCode;
        $keyId = Yii::app()->params->keyId;
        $phealInstance = new Pheal($keyId, $vCode);

        /**@var $response \Pheal\Core\Result * */
        $response = $phealInstance->accountScope->Characters();

        foreach ($response->characters as $characterRaw) {
            $newCharacter = new Character();
            // $newCharacter->scenario = 'api';
            //$newCharacter->attributes = $characterRaw;
            $newCharacter->name = $characterRaw->name;
            $newCharacter->corporationName = $characterRaw->corporationName;
            $newCharacter->corporationID = $characterRaw->corporationID;
            $newCharacter->characterID = $characterRaw->characterID;

            $newCharacter->player_id = $keyId;
            if (!$newCharacter->validate()) {

            }

            $newCharacter->save();

        }


        $dp = new CActiveDataProvider('Character', ['criteria' => ['condition' => 'player_id=' . $keyId]]);


        $this->render('characters', ['dp' => $dp, 'response' => $response]);
    }

    /**
     *
     * "94403918"
     * @param $characterID
     */
    public function actionContactList($characterID = 0)
    {

        $vCode = Yii::app()->params->vCode;
        $keyId = Yii::app()->params->keyId;

        $phealInstance = new Pheal($keyId, $vCode);

        /**@var $responseContactList \Pheal\Core\Result * */
        $responseContactList = $phealInstance->charScope->ContactList(
            [
                "apiKey" => $vCode,
                "characterId" => $characterID,
                "userId" => $keyId
            ]
        );


        $list1 = $responseContactList->contactList;
        $list2 = $responseContactList->corporateContactList;
        $list3 = $responseContactList->allianceContactsList;

        $dp1 = new CArrayDataProvider($list1->toArray(), ['keyField' => false, 'pagination' => false]);


        $this->render('contactList', ['dp1' => $dp1, 'response' => $responseContactList]);
    }


    /**
     *
     * http://api.eve-online.com/server/ServerStatus.xml.aspx
     *
     * Output Rowset Columns
     * Name    Type    Description
     * serverOpen     boolean     Server status
     * onlinePlayers     integer     How many players are currently signed into eve.
     */
    public function actionServerStatus()
    {
        $phealInstance = new Pheal();

        /**@var $response \Pheal\Core\Result * */
        $response = $phealInstance->serverScope->ServerStatus();


        $this->render('serverStatus', ['response' => $response]);

    }
}