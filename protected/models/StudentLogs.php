<?php

/**
 * This is the model class for table "student_logs".
 *
 * The followings are the available columns in table 'student_logs':
 * @property integer $id
 * @property integer $logcategory_id
 * @property integer $student_id
 * @property string $description
 * @property integer $is_deleted
 * @property string $created_at
 * @property string $updated_at
 */
class StudentLogs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Courses the static model class
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
		return 'student_logs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_deleted,id,student_id,logcategory_id', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>255),
			array('created_at, updated_at', 'safe'),
			array('description,logcategory_id', 'required'),
                    
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, logcategory_id, student_id, description, is_deleted, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'logcategory_id' => 'Logcategory Id',
                        'student_id' => 'Student Id',
                        'description' => 'Decription',
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
		$criteria->compare('logcategory_id',$this->logcategory_id,true);
                $criteria->compare('student_id',$this->student_id,true);
                $criteria->compare('description',$this->description,true);
		$criteria->compare('is_deleted',0);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
        }
}