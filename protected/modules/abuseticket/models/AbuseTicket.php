<?php

/**
 * This is the model class for table "abuse_ticket".
 *
 * The followings are the available columns in table 'abuse_ticket':
 * @property integer $id
 * @property string $create_timestamp
 * @property integer $issuer_id
 * @property integer $target_type
 * @property integer $target_id
 * @property integer $reason_id
 * @property string $comment
 * @property integer $archived
 */
class AbuseTicket extends CActiveRecord
{
	const TARGET_PROFILE = 'profile';
	const TARGET_MESSAGE = 'message';
	const TARGET_DISCUSSION = 'discussion';
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AbuseTicket the static model class
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
		return 'abuse_ticket';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('create_timestamp, issuer_id, target_type, target_id, reason_id, comment, archived', 'safe'),
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
			'issuer' => array(self::BELONGS_TO, 'User', 'issuer_id'),
			'history' => array(self::HAS_MANY, 'AbuseTicketHistory', 'ticket_id', 'order' => 'timestamp DESC'),
			'latestHistory' => array(self::HAS_ONE, 'AbuseTicketHistory', 'ticket_id', 'order' => 'timestamp DESC'),
			'reason' => array(self::BELONGS_TO, 'AbuseTicketReason', 'reason_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'create_timestamp' => 'Create Timestamp',
			'issuer_id' => 'Issuer',
			'target_type' => 'Target Type',
			'target_id' => 'Target',
			'reason_id' => 'Reason',
			'comment' => 'Comment',
			'archived' => 'Archived',
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
		$criteria->compare('create_timestamp',$this->create_timestamp,true);
		$criteria->compare('issuer_id',$this->issuer_id);
		$criteria->compare('target_type',$this->target_type);
		$criteria->compare('target_id',$this->target_id);
		$criteria->compare('reason_id',$this->reason_id);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('archived',$this->archived);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}