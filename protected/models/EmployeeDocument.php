<?php

/**
 * This is the model class for table "employeeDocument".
 *
 * The followings are the available columns in table 'employeeDocument':
 * @property integer $id
 * @property integer $employee_id
 * @property string $document_name
 * @property string $document_file_name
 * @property string $document_content_type
 * @property string $document_data
 * @property integer $is_deleted
 * @property integer $is_active
 * @property string $created_at
 * @property string $updated_at
 * @property integer $document_file_size

 */
class EmployeeDocument extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 * @return Employees the static model class
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
		return 'employee_document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		
		return array(
			array('employee_id, document_file_size,is_active,is_deleted', 'numerical', 'integerOnly'=>true),
			array('document_name, document_file_name, document_content_type', 'length', 'max'=>255),
			array('created_at, updated_at', 'safe'),
			array('document_name', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('document_data', 'file', 'types'=>'jpg, gif, png','allowEmpty' => true, 'maxSize' => 5242880),
			array('id, employee_id, document_name, document_file_name, document_content_type, document_data, created_at, updated_at, is_active, is_deleted, document_file_size', 'safe', 'on'=>'search'),
			
			
			//array('photo_data', 'file', 'allowEmpty'=>true, 'types'=>'jpg, jpeg, gif, png')


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
			'document_name' => 'Document Name',
			'document_file_name' => 'Document File Name',
			'document_content_type' => 'Document Content Type',
			'document_data' => 'Document Data',
                        'is_deleted' => 'Is Deleted',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
                        'is_active' =>'Is Active',
			'document_file_size' => 'Document File Size',
			
                       
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
		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('document_name',$this->document_name,true);
		$criteria->compare('is_active',$this->is_active,true);
		$criteria->compare('document_file_name',$this->document_file_name,true);
		$criteria->compare('document_content_type',$this->document_content_type,true);
		$criteria->compare('document_data',$this->document_data,true);
                $criteria->compare('is_deleted',$this->is_deleted,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('document_file_size',$this->document_file_size);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function exp_validation(){
    if($this->experience_year == ''&&$this->experience_month == ''){
         $this->addError('experience_month', 'Enter experience details');
   	 }
	}
	
	public function exp_details_validation(){
    if(!$this->experience_detail){
         $this->addError('experience_detail', 'Enter experience details');
    }
   }
   
   
      
}

