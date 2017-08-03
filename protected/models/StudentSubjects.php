<?php

/**
 * This is the model class for table "students_subjects".
 *
 * The followings are the available columns in table 'students_subjects':
 * @property integer $id
 * @property string $student_id
 * @property string $subject_id
 * @property integer $batch_id
 

 */
class StudentSubjects extends CActiveRecord
{
	public $job;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Subjects the static model class
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
		return 'students_subjects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		
			array('id,student_id,subject_id,batch_id,', 'numerical', 'integerOnly'=>true),
			
			array('student_id,subject_id', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id,student_id,subject_id,batch_id', 'safe', 'on'=>'search'),
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
		 'batch123'=>array(self::BELONGS_TO, 'Batches', 'batch_id'),        
		);

	}

	
	
	 
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'student_id' => 'Student Id',
			'subject_id' => 'Subject Id',
			'batch_id' => 'Batch Id',
                       
			//'created_at' => 'Created At',
			//'updated_at' => 'Updated At',
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
		$criteria->compare('student_id',$this->student_id,true);
		$criteria->compare('subject_id',$this->subject_id,true);
		$criteria->compare('batch_id',$this->batch_id);
              
		//$criteria->compare('created_at',$this->created_at,true);
		//$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getbatchname()
	{
		$batches=Batches::model()->findByAttributes(array('id'=>$this->batch_id,'is_deleted'=>0));
			return $this->name.'('.$batches->name.')';
	}
		
		
	
	
	
}

