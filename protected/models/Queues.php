<?php

/**
 * This is the model class for table "queues".
 *
 * The followings are the available columns in table 'queues':
 * @property integer $id
 * @property integer $user_id
 * @property integer $merchant_id
 * @property integer $service_id
 * @property integer $queue_number
 * @property string $queue_status
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property Users $user
 * @property Merchants $merchant
 * @property Services $service
 */
class Queues extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'queues';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			// Format: array('attributes', 'validator', 'additional_parameters')
			
			// Validasi untuk fields required (wajib diisi)
			array('user_id, merchant_id, service_id, queue_number, queue_status', 'required'),
			
			// Validasi untuk tipe numerik
			array('user_id, merchant_id, service_id, queue_number', 'numerical', 'integerOnly' => true),
			
			// Validasi untuk panjang maksimum queue_status (contoh max 10 karakter)
			array('queue_status', 'length', 'max' => 10),
			
			// Validasi untuk format tanggal pada field created_at
			array('created_at', 'date', 'format' => 'yyyy-MM-dd HH:mm:ss'),
			
			// Aturan ini hanya berlaku ketika melakukan pencarian (digunakan di search)
			array('user_id, merchant_id, service_id, queue_number, queue_status, created_at', 'safe', 'on' => 'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'merchant' => array(self::BELONGS_TO, 'Merchants', 'merchant_id'),
			'service' => array(self::BELONGS_TO, 'Services', 'service_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'merchant_id' => 'Merchant',
			'service_id' => 'Service',
			'queue_number' => 'Queue Number',
			'queue_status' => 'Queue Status',
			'created_at' => 'Created At',
		);
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('merchant_id',$this->merchant_id);
		$criteria->compare('service_id',$this->service_id);
		$criteria->compare('queue_number',$this->queue_number);
		$criteria->compare('queue_status',$this->queue_status,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Queues the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
