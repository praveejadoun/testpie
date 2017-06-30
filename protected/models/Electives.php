<?php

/**
 * This is the model class for table "electives".
 *
 * The followings are the available columns in table 'electives':
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $max_weekly_classes
 * @property integer $elective_group_id
 * @property string $created_at
 * @property string $updated_at
 */
class Electives extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Electives the static model class
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
		return 'electives';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('elective_group_id,max_weekly_classes', 'numerical', 'integerOnly'=>true),
                        array('name, code, max_weekly_classes','required'),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, elective_group_id, name, code, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'elective_group_id' => 'Elective Group',
                        'name'=>'Name',
                        'code'=>'Code',
                        'max_weekly_classes'=>'Max Weekly Classes',
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
		$criteria->compare('elective_group_id',$this->elective_group_id);
                $criteria->compare('name',$this->name,true);
                $criteria->compare('code',$this->code,true);
                $criteria->compare('max_weekly_classes',$this->max_weekly_classes,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}