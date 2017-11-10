<?php

/**
 * This is the model class for table "finance_fee_particular_accesses".
 *
 * The followings are the available columns in table 'finance_fee_particular_accesses':
 * @property integer $id
 * @property string $access_type
 * @property integer $course_id
 * @property integer $batch_id
 * @property integer $finance_fee_particular_id
 * @property integer $student_category_id
 * @property string $amount
 * @property string $created_at
 * @property string $updated_at
 */
class FinanceFeeParticularAccess extends CActiveRecord
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
		return 'finance_fee_particular_accesses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
//		return array(
//			array('finance_fee_particular_id, student_category_id,course_id,batch_id', 'numerical', 'integerOnly'=>true),
//			array('amount', 'match', 'pattern'=>'/([1-9][0-9]*?)(\.[0-9]{2})?/'),
//			array('access_type', 'length', 'max'=>25),
//			array('amount', 'length', 'max'=>15),
//			array(' created_at, updated_at', 'safe'),
////			array('name, amount','required'),
////			array('name','CRegularExpressionValidator', 'pattern'=>'/^[A-Za-z_ ]+$/','message'=>"{attribute} should contain only letters."),
//			// The following rule is used by search().
//			// Please remove those attributes that should not be searched.
//			array('id, access_type, amount, finance_fee_particular_id, student_category_id,course_id,batch_id,created_at, updated_at', 'safe', 'on'=>'search'),
//		);
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
                        'access_type' => 'Access Type',
			'course_id' => 'Course',
			'batch_id' => 'Batch',
			'amount' => 'Amount',
			'finance_fee_particular_id' => 'Finance Fee Particular',
			'student_category_id' => 'Student Category',
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
		$criteria->compare('access_type',$this->access_type,true);
		$criteria->compare('course_id',$this->course_id,true);
                $criteria->compare('batch_id',$this->batch_id,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('finance_fee_particular_id',$this->finance_fee_particular_id);
		$criteria->compare('student_category_id',$this->student_category_id);
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