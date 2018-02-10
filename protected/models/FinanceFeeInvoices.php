<?php

/**
 * This is the model class for table "finance_fee_invoices".
 *
 * The followings are the available columns in table 'finance_fee_invoices':
 * @property integer $id
 * @property string $invoice_id
 * @property string $student_id
 * @property integer $finance_fee_category_id
 * @property integer $finance_fee_particular_id
 * @property string $amount
 * @property string $amount_payable
 * @property string $actual_amount
 * @property string $status
 * @property string $due_date
 * @property string $last_payment_date
 * @property integer $is_deleted
 * @property string $created_at
 * @property string $updated_at
 */
class FinanceFeeInvoices extends CActiveRecord
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
		return 'finance_fee_invoices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('finance_fee_category_id, student_id, is_deleted', 'numerical', 'integerOnly'=>true),
			array('amount', 'match', 'pattern'=>'/([1-9][0-9]*?)(\.[0-9]{2})?/'),
			array('created_at, updated_at', 'safe'),
//			array('name, amount','required'),
//			array('name','CRegularExpressionValidator', 'pattern'=>'/^[A-Za-z_ ]+$/','message'=>"{attribute} should contain only letters."),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, invoice_id,amount,amount_payable,actual_amount, finance_fee_category_id,finance_fee_particular_id, status, student_id, due_date, last_payment_date, is_deleted, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'invoice_id' => 'Invoice',
			'finance_fee_category_id' => 'Finance Fee Category',
                        'finance_fee_particular_id' => 'Finance Fee PArticular',
                        'amount' => 'Amount',
                        'amount_payable' => 'Amount Payable',
                        'actual_amount' => 'Actual Amount',
			'student_id' => 'Student',
                        'status' => 'Status',
                        'due_date' => 'Due Date',
                        'last_payment_date' =>'Last Payment Date',
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
		$criteria->compare('invoice_id',$this->invoice_id,true);
                $criteria->compare('finance_fee_category_id',$this->finance_fee_category_id);
                $criteria->compare('finance_fee_particular_id',$this->finance_fee_particular_id);
                $criteria->compare('amount',$this->amount,true);
                $criteria->compare('amount_payable',$this->amount_payable,true);
                $criteria->compare('actual_amount',$this->actual_amount,true);
		$criteria->compare('student_id',$this->student_id);
                $criteria->compare('status',$this->status);
                $criteria->compare('due_date',$this->due_date,true);
                $criteria->compare('last_payment_date',$this->last_payment_date,true);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function amount($data,$row){		
		
		$amount = number_format($data->amount,2);
		return $amount;
	}
	 public function getCategory($data,$row)
	{
		$student_category=StudentCategories::model()->findByAttributes(array('id'=>$data->student_category_id,'is_deleted'=>0));
		if(count($student_category)>0)
		{
			return $student_category->name;
		}
		else
		{
			return '-';
		}
	}
	
	 public function financeCategory($data,$row)
	{
		$fees_category=FinanceFeeCategories::model()->findByAttributes(array('id'=>$data->finance_fee_category_id,'is_deleted'=>0));
		if(count($fees_category)>0)
		{
			return $fees_category->name;
		}
		else{
			return '-';
		}
	}

}