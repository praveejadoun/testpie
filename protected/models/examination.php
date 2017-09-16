<?php 
/**
 * This is the model class for table "examination".
 *
 * The followings are the available columns in table 'examination':
 * @property integer $id
 * @property string $name
 * @property integer $course_id
 * @property integer $batch_id
 * @property string $start_time
 * @property string $end_time
 * @property string $duration
 * @property integer $status
 * @property integer $is_deleted
 * @property string $created_at
 * @property string $updated_at
 * @property integer $user_id
 */
Class Examination extends CActiveRecord
{
    /**
	 * Returns the static model of the specified AR class.
	 * @return Batches the static model class
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
		return 'examination';
	}
        public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('batch_id,course_id, is_deleted', 'numerical', 'integerOnly'=>true),
			array(' status ,duration,name', 'length', 'max'=>25),
			array(' start_time,end_time,created_at,updated_at', 'safe'),
			// The following rule is used by search().
			array('name,start_time,end_time,duration', 'required'),
			//array('name','CRegularExpressionValidator', 'pattern'=>'/^[A-Za-z0-9 _ -]*[A-Za-z0-9][A-Za-z0-9 _ -]*$/','message'=>"{attribute} should not contain any special character(s) except _- "),
			// Please remove those attributes that should not be searched.
			array('id, name, duration,start_time,end_time,batch_id,course_id, status, is_deleted,created_at,updated_at ', 'safe', 'on'=>'search'),
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
                        'name'=>'Name',
                        'course_id'=> 'Course',
                        'batch_id'=>'Batch',
			'duration' => 'Duration',
                        'start_time' => 'Start Time',
			'end_time' => 'End Time',
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
                $criteria->compare('name',$this->name,true);
                $criteria->compare('course_id',$this->course_id,true);
                $criteria->compare('batch_id',$this->batch_id,true);
		$criteria->compare('duration',$this->duration,true);
                $criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('end_time',$this->end_time,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('is_deleted',$this->is_deleted,true);
		$criteria->compare('created_at',$this->created_at,true);
                $criteria->compare('updated_at',$this->updated_at,true);
                $criteria->compare('user_id',$this->user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
}
