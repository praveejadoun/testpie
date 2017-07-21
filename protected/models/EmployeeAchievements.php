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
 * @property string $achievdoc_file_name
 * @property string $achievdoc_content_type
 * @property string $achievdoc_data
 * @property integer $is_deleted
 * @property string $created_at
 * @property string $updated_at
 * @property integer $achievdoc_file_size
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
			array('id, employee_id, achievdoc_file_size,is_deleted', 'numerical', 'integerOnly'=>true),
			array('achievement_title, achievement_document_name, achievement_description, achievdoc_file_name, achievdoc_content_type', 'length', 'max'=>255),
			array('achievdoc_data', 'file', 'types'=>'jpg, gif, png','allowEmpty' => true, 'maxSize' => 5242880),
                        array('created_at, updated_at', 'safe'),
			array('achievement_title, achievement_document_name, achievement_description', 'required'),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
                        array('id, employee_id, achievement_title, achievement_document_name, achievement_description, achievdoc_file_name, achievdoc_content_type, achievdoc_data, is_deleted, created_at, updated_at, achievdoc_file_size', 'safe', 'on'=>'search'),


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
                        'achievdoc_file_name' => 'Achievdoc File Name',
			'achievdoc_content_type' => 'Achievdoc Content Type',
			'achievdoc_data' => 'Achievdoc Data',
                        'is_deleted' => 'Is Deleted',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'achievdoc_file_size' => 'Achievdoc File Size',
			
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
                $criteria->compare('achievdoc_file_name',$this->achievdoc_file_name,true);
		$criteria->compare('achievdoc_content_type',$this->achievdoc_content_type,true);
		$criteria->compare('achievdoc_data',$this->achievdoc_data,true);
                $criteria->compare('is_deleted',$this->is_deleted,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('achievdoc_file_size',$this->achievdoc_file_size);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}