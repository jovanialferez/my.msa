<?php

/**
 * This is the model class for table "abuse_ticket_history".
 *
 * The followings are the available columns in table 'abuse_ticket_history':
 * @property integer $id
 * @property integer $ticket_id
 * @property integer $moderator_id
 * @property string $comment
 * @property integer $state_id
 * @property string $timestamp
 */
class AbuseTicketHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AbuseTicketHistory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'abuse_ticket_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ticket_id, moderator_id, comment, state_id, timestamp', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'state' => array(self::BELONGS_TO, 'AbuseTicketState', 'state_id'),
			'moderator' => array(self::BELONGS_TO, 'User', 'moderator_id')
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ticket_id' => 'Ticket',
			'moderator_id' => 'Moderator',
			'comment' => 'Comment',
			'state_id' => 'State',
			'timestamp' => 'Timestamp',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('ticket_id',$this->ticket_id);
		$criteria->compare('moderator_id',$this->moderator_id);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('timestamp',$this->timestamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}