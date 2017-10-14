<?php

/**
 * This is the model class for table "fees_tax".
 *
 * The followings are the available columns in table 'fees_tax':
 * @property integer $id
 * @property string $label
 * @property string $value
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Taxes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EmployeeLeaveTypes the static model class
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
		return 'fees_tax';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('status','numerical', 'integerOnly'=>true),
			array('label, value', 'length', 'max'=>255),
                        array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
//			array('name','CRegularExpressionValidator', 'pattern'=>'/^[A-Za-z_ ]+$/','message'=>"{attribute} should contain only letters."),
			array('id, label, value, status, created_at, updated_at', 'safe', 'on'=>'search'),
			array('label, value, status', 'required',),
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
			'label' => 'Label',
			'value' => 'Value(%)',
			'status' => 'Status',
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
		$criteria->compare('label',$this->label,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('status',$this->status);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
