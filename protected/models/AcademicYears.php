<?php

/**
 * This is the model class for table "academic_years".
 *
 * The followings are the available columns in table 'academic_years':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property integer $status
 * @property integer $is_deleted
 * @property string $created_at
 * @property string $updated_at
 * @property integer $user_id
 */
class AcademicYears extends CActiveRecord
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
		return 'academic_years';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, is_deleted', 'numerical', 'integerOnly'=>true),
			array(' status ,description,name', 'length', 'max'=>25),
			array(' start_date,end_date,created_at,updated_at', 'safe'),
			// The following rule is used by search().
			array('name,start_date,end_date,description', 'required'),
			array('name','CRegularExpressionValidator', 'pattern'=>'/^[A-Za-z0-9 _ -]*[A-Za-z0-9][A-Za-z0-9 _ -]*$/','message'=>"{attribute} should not contain any special character(s) except _- "),
			// Please remove those attributes that should not be searched.
			array('id, name, description,start_date,end_date, status, is_deleted,created_at,updated_at ', 'safe', 'on'=>'search'),
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
			'description' => 'Description',
                        'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'status' => 'Status',
			'is_deleted' => 'Is Deleted',
                        'created_at' => 'Created At',
                        'updated_at' => 'Updated At',
                        'User_id' => 'User Id',
                       
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
		$criteria->compare('description',$this->description,true);
                $criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
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