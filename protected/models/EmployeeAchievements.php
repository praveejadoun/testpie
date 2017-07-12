<?php

/**
 * This is the model class for table "employee_achievments".
 *
 * The followings are the available columns in table 'employee_achievments':
 * @property integer $id
 * @property string $employee_id
 * @property integer $achievement_title
 * @property string $achievement_document_name
 * @property integer $achievement_description
 */
class EmployeeAchievements extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ExamGroups the static model class
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
		return 'employee_achievments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, employee_id', 'numerical', 'integerOnly'=>true),
			array('achievement_title, achievement_document_name, achievement_description', 'length', 'max'=>255),
					
			array('achievement_title, achievement_document_name, achievement_description', 'required'),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			
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
			'employee_id' => 'Employee Id',
			'achievement_title' => 'Achievement Title',
			'achievement_document_name' => 'Achievement Document Name',
			'achievement_description' => 'Achievement Description',
			
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
		$criteria->compare('employee_id',$this->employee_id,true);
		$criteria->compare('achievement_title',$this->achievement_title);
		$criteria->compare('achievement_document_name',$this->achievement_document_name,true);
		$criteria->compare('achievement_description',$this->achievement_description);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}