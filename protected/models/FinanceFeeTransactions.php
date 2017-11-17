<?php

/**
 * This is the model class for table "finance_fee_transactions".
 *
 * The followings are the available columns in table 'finance_fee_transactions':
 * @property integer $id
 * @property string $date
 * @property integer $payment_type_id
 * @property string $transaction_id
 * @property string $invoice_id
 * @property string $description
 * @property string $amount
 * @property string $status
 * @property integer $is_deleted
 * @property string $created_at
 * @property string $updated_at
 */

class FinanceFeeTransactions extends CActiveRecord
{
    /**
	 * Returns the static model of the specified AR class.
	 * @return FinanceFeeParticulars the static model class
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
		return 'finance_fee_transactions';
	}
        
        public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('payment_type_id, is_deleted', 'numerical', 'integerOnly'=>true),
			array('amount', 'match', 'pattern'=>'/([1-9][0-9]*?)(\.[0-9]{2})?/'),
			array('amount', 'length', 'max'=>15),
			array('date, description, created_at, updated_at', 'safe'),
			array('date, amount','required'),
                        
//			array('name','CRegularExpressionValidator', 'pattern'=>'/^[A-Za-z_ ]+$/','message'=>"{attribute} should contain only letters."),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date, description, amount, payment_type_id, transaction_id, invoice_id, status, is_deleted, created_at, updated_at', 'safe', 'on'=>'search'),
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
		);
	}
        
        /**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'Date',
                        'payment_type_id' => 'Type',
                        'transaction_id' => 'Transaction Id',
                        'invoice_id' => 'Invoice Id',
			'description' => 'Description',
			'amount' => 'Amount',
                        'status' => 'Status',
			'is_deleted' => 'Is Deleted',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
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
		$criteria->compare('date',$this->date,true);
                $criteria->compare('payment_type_id',$this->payment_type_id);
                $criteria->compare('transaction_id',$this->transaction_id);
                $criteria->compare('invoice_id',$this->invoice_id,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('status',$this->status);
              	$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}