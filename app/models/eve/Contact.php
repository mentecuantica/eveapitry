<?php

/**
 * This is the model class for table "contact_list".
 *
 * The followings are the available columns in table 'contact_list':
 * @property integer $id
 * @property string $characterdId
 * @property string $contactName
 * @property integer $inWatchlist
 * @property integer $standing
 */
class Contact extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contact_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return [
			['inWatchlist, standing', 'numerical', 'integerOnly'=>true],
			['characterdId, contactName', 'length', 'max'=>250],
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			['id, characterdId, contactName, inWatchlist, standing', 'safe', 'on'=>'search'],
		];
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return [
		];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'characterdId' => 'Character Id',
			'contactName' => 'Contact Name',
			'inWatchlist' => 'In Watchlist',
			'standing' => 'Standing',
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
		$criteria->compare('characterdId',$this->characterdId,true);
		$criteria->compare('contactName',$this->contactName,true);
		$criteria->compare('inWatchlist',$this->inWatchlist);
		$criteria->compare('standing',$this->standing);

		return new CActiveDataProvider($this, [
			'criteria'=>$criteria,
		]);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contact the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
