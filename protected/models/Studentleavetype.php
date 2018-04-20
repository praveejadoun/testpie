<?php

/**
 * This is the model class for table "studentleavetype".
 *
 * The followings are the available columns in table 'studentleavetype':
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $label
 * @property string $colorcode
 * @property integer $status
 * @property integer $exclude_attentance
 * @property string $created_at
 * @property string $updated_at
 */
class Studentleavetype extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Guardians the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'studentleavetype';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {

        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, code, label ,colorcode', 'length', 'max' => 255),
            array('status, exclude_attentance', 'numerical', 'integerOnly' => true),
            array('name, code, label ,colorcode,status', 'required'),
            array('name,code,label,colorcode', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'It can only contain alphabets,space'),
            array(' created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(' name, code, label, colorcode,status,exclude_attentance', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    public function check($attribute, $params) {
        if (Yii::app()->controller->action->id != 'update' and $this->$attribute != '') {
            $validate = User::model()->findByAttributes(array('email' => $this->$attribute));
            if ($validate != NULL) {

                $this->addError($attribute, 'Email allready in use');
            }
        }
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'label' => 'Label',
            'colorcode' => 'Color Code',
            'status' => 'Status',
            'exclude_attentance' => 'Exclude in Attendance % calculation',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('label', $this->label, true);
        $criteria->compare('colorcode', $this->colorcode, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('exclude_attentance', $this->exclude_attentance);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('updated_at', $this->updated_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getval() {
        return '"123"';
    }

    /* function studentname($data,$row)
      {
      $posts = Students::model()->findAllByAttributes(array('parent_id'=>$data->id));
      if($posts!=NULL)
      {
      $students = array();
      foreach($posts as $post)
      {
      echo $post->first_name.' '.$post->last_name.'<br/>';
      }
      }
      else
      {
      return '-';
      }
      }

      function parentname($data,$row)
      {
      //$posts=Students::model()->findByAttributes(array('id'=>$data->ward_id));
      return ucfirst($data->first_name).' '.ucfirst($data->last_name);
      } */
}
