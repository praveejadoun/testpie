<?php

/**
 * This is the model class for table "applicants".
 *
 * The followings are the available columns in table 'applicants':
 * @property integer $id
 * @property string $registration_no
 * * @property string $admission_no
 * @property string $class_roll_no
 * @property string $registration_date
 * @property string $admission_date
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property integer $course_id
 * @property integer $batch_id
 * @property string $date_of_birth
 * @property string $gender
 * @property string $blood_group
 * @property string $birth_place
 * @property integer $nationality_id
 * @property string $language
 * @property string $religion
 * @property integer $student_category_id
 * @property string $address_line1
 * @property string $address_line2
 * @property string $city
 * @property string $state
 * @property string $pin_code
 * @property integer $country_id
 * @property string $phone1
 * @property string $phone2
 * @property string $email
 * @property integer $immediate_contact_id
 * @property integer $is_sms_enabled
 * @property string $photo_file_name
 * @property string $photo_content_type
 * @property string $photo_data
 * @property string $status_description
 * @property integer $is_active
 * @property integer $is_deleted
 * @property string $created_at
 * @property string $updated_at
 * @property integer $has_paid_fees
 * @property integer $photo_file_size
 * @property integer $user_id
 * @property integer $parent_id
 * @property string $academicyear_id
 * @property string $status 
 */
class Applicants extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Students the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public $status;
	public $dobrange;
	public $registrationrange;
	public $task_type;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'applicants';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('academicyear_id,registration_no, parent_id, course_id, nationality_id, student_category_id, country_id, immediate_contact_id, is_sms_enabled, is_active, is_deleted, has_paid_fees, photo_file_size,pin_code,  phone1, phone2, user_id, uid', 'numerical', 'integerOnly'=>true),
			array(' academicyear_id, registration_date, first_name, last_name, gender, date_of_birth, phone1, email', 'required',),
			array('registration_no','unique'),
			array('email','check'),
			array('registration_no, class_roll_no, first_name, middle_name, last_name, gender, blood_group, birth_place, language, religion, address_line1, address_line2, city, state, email, photo_file_name, photo_content_type, status_description,status', 'length', 'max'=>255),
			array('academicyear_id,date_of_birth,registration_date,admission_date,batch_id,date_of_birth, created_at, updated_at', 'safe'),			
			array('email','email'),
                        array('phone1,phone2','length','min'=>10,'max'=>10),
			array(
				'date_of_birth',
				'compare',
				'compareAttribute'=>'created_at',
				'operator'=>'<', 
				'allowEmpty'=>false , 
				'message'=>'{attribute} must be less than "{compareValue}".'
			  ),
                     array('state', 'match','pattern' => '/^[a-zA-Z\s]+$/','message' => 'state can only contain word characters'),
                     array('first_name,middle_name,last_name', 'match','pattern' => '/^[a-zA-Z\s]+$/','message' => 'It can only contain alphabets,space'),
                     array('language', 'match','pattern' => '/^[a-zA-Z,]+$/','message' => 'Language can only contain alphabets,comma'),
                     array('religion', 'match','pattern' => '/^[a-zA-Z]+$/','message' => 'Religion can only contain alphabets'),
                     array('birth_place', 'match','pattern' => '/^[a-zA-Z,\s]+$/','message' => 'Birth place can only contain alphabets,comma,space'),
                     array('city', 'match','pattern' => '/^[a-zA-Z,\s]+$/','message' => 'City can only contain alphabets,comma,space'),
                     array('pin_code', 'match','pattern' => '/^([1-9])([0-9]){5}$/','message' => 'PinCode must contain 6 characters'),
                     array('phone1,phone2', 'match','pattern' => '/^([7-9])([0-9]){9}$/','message' => 'Phone number must start b/w 7-9'),

                    
                        // The following rule is used by search().
			// Please remove those attributes that should not be searched.
//                        array('phone1','number','min'=>10,'max'=>10),
//                        array('phone1','match','pattern'=>'^[789]\d{9}$'),
			array('photo_data', 'file', 'types'=>'jpg, gif, png', 'allowEmpty' => true),
			array('id, registration_no, parent_id, class_roll_no, registration_date, first_name, middle_name, last_name, course_id, date_of_birth, gender, blood_group, birth_place, nationality_id, language, religion, student_category_id, address_line1, address_line2, city, state, pin_code, country_id, phone1, phone2, email, immediate_contact_id, is_sms_enabled, photo_file_name, photo_content_type, photo_data, status_description, is_active, is_deleted, created_at, updated_at, has_paid_fees, photo_file_size, user_id,academicyear_id,status', 'safe', 'on'=>'search'),
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
	
	public function check($attribute,$params)
    {
		if(Yii::app()->controller->action->id!='update' and $this->$attribute!='')
		{
		$validate = Applicants::model()->findByAttributes(array('email'=>$this->$attribute));
		if($validate!=NULL)
		{
        
            $this->addError($attribute,'Email allready in use');
		}
		}
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'registration_no' => 'Registration No',
			'class_roll_no' => 'Class Roll No',
			'registration_date' => 'Registration Date',
                        'admission_date' => 'Admission Date',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'course_id' => 'Course',
                        'batch_id'=>'Batch',
			'date_of_birth' => 'Date Of Birth',
			'gender' => 'Gender',
			'blood_group' => 'Blood Group',
			'birth_place' => 'Birth Place',
			'nationality_id' => 'Nationality',
			'language' => 'Language',
			'religion' => 'Religion',
			'student_category_id' => 'Student Category',
			'address_line1' => 'Address Line1',
			'address_line2' => 'Address Line2',
			'city' => 'City',
			'state' => 'State',
			'pin_code' => 'Pin Code',
			'country_id' => 'Country',
			'phone1' => 'Phone 1',
			'phone2' => 'Phone 2',
			'email' => 'Email',
			'immediate_contact_id' => 'Immediate Contact',
			'is_sms_enabled' => 'Is Sms Enabled',
			'photo_file_name' => 'Photo File Name',
			'photo_content_type' => 'Photo Content Type',
			'photo_data' => 'Photo Data',
			'status_description' => 'Status Description',
			'is_active' => 'Is Active',
			'is_deleted' => 'Is Deleted',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'has_paid_fees' => 'Has Paid Fees',
			'photo_file_size' => 'Photo File Size',
			'user_id' => 'User',
                        'parent_id' => 'Parent',
                        'academicyear_id' => 'Academic Year',
                        'status' => 'Status'
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
		$criteria->compare('registration_no',$this->registration_no,true);
		$criteria->compare('class_roll_no',$this->class_roll_no,true);
		$criteria->compare('registration_date',$this->registration_date,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('blood_group',$this->blood_group,true);
		$criteria->compare('birth_place',$this->birth_place,true);
		$criteria->compare('nationality_id',$this->nationality_id);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('student_category_id',$this->student_category_id);
		$criteria->compare('address_line1',$this->address_line1,true);
		$criteria->compare('address_line2',$this->address_line2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('pin_code',$this->pin_code,true);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('phone1',$this->phone1,true);
		$criteria->compare('phone2',$this->phone2,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('immediate_contact_id',$this->immediate_contact_id);
		$criteria->compare('is_sms_enabled',$this->is_sms_enabled);
		$criteria->compare('photo_file_name',$this->photo_file_name,true);
		$criteria->compare('photo_content_type',$this->photo_content_type,true);
		$criteria->compare('photo_data',$this->photo_data,true);
		$criteria->compare('status_description',$this->status_description,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('has_paid_fees',$this->has_paid_fees);
		$criteria->compare('photo_file_size',$this->photo_file_size);
		$criteria->compare('user_id',$this->user_id);
                $criteria->compare('parent_id',$this->parent_id);
                $critearia->compare('academicyear_id',$this->academicyear_id);
                $criteria->compare('status',$this->status);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getval()
	{
		return '"123"';
	}
	
	public function getFullname()
	{
	
		return '</td><td  style="padding:0 0 0 20px;" >'.CHtml::link($this->first_name, array('/students/students/view', 'id'=>$this->id)).'
								   </td><td  style="padding:0 0 0 20px;">'.$this->registration_no.'</td>'.
								 '</tr>';
									 
	}
	public function getStudentname()
	{
		return ucfirst($this->first_name).' '.ucfirst($this->middle_name).' '.ucfirst($this->last_name);
	}
	
	
	
}