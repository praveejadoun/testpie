<?php

/**
 * This is the model class for table "finance_fee_subscription".
 *
 * The followings are the available columns in table 'finance_fee_subscription':
 * @property integer $id
 * @property string $start_date
 * @property string $end_date
 * @property integer $checkbox
 * @property integer $subscription_type
 * @property string $due_date
 * @property integer $fee_category_id
 * @property integer $is_deleted
 * @property string $created_at
 * @property string $updated_at
 */
class FinanceFeeSubscription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FinanceFeeCollections the static model class
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
		return 'finance_fee_subscription';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fee_category_id,checkbox,subscription_type, is_deleted', 'numerical', 'integerOnly'=>true),
//			array('name', 'length', 'max'=>25),
			array('start_date, end_date, due_date', 'safe'),
			array('start_date, end_date, due_date','required'),
                        array(
				'due_date',
				'compare',
				'compareAttribute'=>'start_date',
				'operator'=>'>', 
				'allowEmpty'=>false , 
				'message'=>'{attribute} must be greater than start date.'
			  ),
                        array(
				'due_date',
				'compare',
				'compareAttribute'=>'end_date',
				'operator'=>'<', 
				'allowEmpty'=>false , 
				'message'=>'{attribute} must be less than end date.'
			  ),
//			array('name','CRegularExpressionValidator', 'pattern'=>'/^[A-Za-z_ ]+$/','message'=>"{attribute} should contain only letters."),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, subscription_type, start_date, end_date, due_date, fee_category_id, checkbox, is_deleted, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'subscription_type' => 'Subscription Type',
                        'checkbox' => 'Divide the fee amount by number of subscriptions',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'due_date' => 'Due Date',
			'fee_category_id' => 'Fee Category',
			'is_deleted' => 'Is Deleted',
                        'created_at' => 'Created At',
                        'updated_at' => 'Updated At'
                        
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
		$criteria->compare('subscription_type',$this->subscription_type,true);
                $criteria->compare('checkbox',$this->checkbox,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('due_date',$this->due_date,true);
		$criteria->compare('fee_category_id',$this->fee_category_id);
		$criteria->compare('is_deleted',$this->is_deleted);
                $criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}

