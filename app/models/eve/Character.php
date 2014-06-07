<?php

/**
 * This is the model class for table "charlist".
 *
 * The followings are the available columns in table 'charlist':
 * @property integer $id
 * @property integer $player_id
 * @property string $name
 * @property string $characterID
 * @property string $corporationID
 * @property string $corporationName
 */
class Character extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'charlist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return [
			['player_id', 'numerical', 'integerOnly'=>true],
			['name, characterID, corporationID, corporationName', 'length', 'max'=>255],
            ['characterID','unique'],
            ['characterID, corporationID, corporationName','safe','on'=>'api'],
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			['id, player_id, name, characterID, corporationID, corporationName', 'safe', 'on'=>'search'],
		];
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
	 return [
        'player'=>[self::BELONGS_TO,'Player','player_id'],
     ];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'player_id' => 'Player',
			'name' => 'Name',
			'characterID' => 'Character',
			'corporationID' => 'Corporation',
			'corporationName' => 'Corporation Name',
		];
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('player_id',$this->player_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('characterID',$this->characterID,true);
		$criteria->compare('corporationID',$this->corporationID,true);
		$criteria->compare('corporationName',$this->corporationName,true);

		return new CActiveDataProvider($this, [
			'criteria'=>$criteria,
		]);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Character the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
