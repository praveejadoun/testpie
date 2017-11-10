<?php

class FeesController extends RController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'rights', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'Create2', 'update2', 'Manage', 'savesearch', 'DisplaySavedImage', 'pdf', 'Address', 'Contact', 'Addinfo', 'Remove'),
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'batch', 'add'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $ffc = new FinanceFeeCategories;

        //Uncomment 

        if (!empty($_POST)) {
//           echo "<pre/>";
//           print_r($_POST);
//                    exit;

            $ffc->attributes = $_POST;
            $list = $_POST;


            $ffc->name = $list['cname'];
            $ffc->description = $list['description'];
            $ffc->is_deleted = 0;
            $ffc->is_master = 1;
            $ffc->created_at = date('Y-m-d H:i:s');
            $ffc->updated_at = date('Y-m-d H:i:s');
 

//				$ffc->save();

            if ($ffc->save()) {

                $listFeeParticulars = $list['FeeParticulars'];
//                                  echo "<pre/>";
//                                   print_r($listFeeParticulars);
//                                   exit;
                $particular_names = $listFeeParticulars['name'];
                $particular_descriptions = $listFeeParticulars['description'];
                $particular_taxs = $listFeeParticulars['tax_id'];
                $particular_discount_values = $listFeeParticulars['discount_value'];
                $particular_discount_types = $listFeeParticulars['discount_type'];
                $particular_category = $listFeeParticulars['student_category_id'];


                foreach ($particular_names as $particular_key => $particular_name) {
                    $ffp = new FinanceFeeParticulars;
                    $ffp->name = $particular_name;
                    $ffp->description = $particular_descriptions[$particular_key];
                    $ffp->tax_id = $particular_taxs[$particular_key]; //Other variable also will go here
                    $ffp->amount = $particular_discount_values[$particular_key];
                    $ffp->finance_fee_category_id = $ffc->id;
                     $ffp->student_category_id = $particular_category[$particular_key];
                    $ffp->created_at = date('Y-m-d H:i:s');
                    $ffp->updated_at = date('Y-m-d H:i:s');

                    $ffp->save();
//                    echo ($ffp->id);
//                    exit;

                    //$particular_id = $ffp->id
                    //Save access for this particular if given
                    //Get access array using $particular_key
                    //Loop throug it to save into aceess table
                    

//                    $particular_id = $ffp->id;
                        //Save access for this particular if given
                        //Get access array using $particular_key
                        //Loop throug it to save into aceess table
                        $listFeeParticularAccesses = $list['FeeParticularAccess'][$particular_key];
                        //echo "<pre>";
                        //print_r($listFeeParticularAccesses);exit;

                        $particular_access_types = $listFeeParticularAccesses['access_type'];
                        $particular_courses = $listFeeParticularAccesses['course'];
                        $particular_batches = $listFeeParticularAccesses['batch'];
                        $particular_student_category_ids = $listFeeParticularAccesses
                                ['student_category_id'];
                        $particular_amounts = $listFeeParticularAccesses['amount'];
                        $particular_finance_fee_particular_ids = $listFeeParticularAccesses['finance_fee_particular_id'];
//                        echo "<pre/>";
//                        print_r($particular_access_types);
//                        exit;
                        foreach ($particular_access_types as $access_key => $particular_access_type) {
                            $fpa = new FinanceFeeParticularAccess;
                            $fpa->access_type = $particular_access_type;
                            $fpa->course_id = !empty($particular_courses[$access_key])?$particular_courses[$access_key]:'';
                            $fpa->batch_id = !empty($particular_batches[$access_key])?$particular_batches[$access_key]:'';
                            $fpa->student_category_id = !empty($particular_student_category_ids[$access_key])?$particular_student_category_ids[$access_key]:'';
                            $fpa->amount = !empty($particular_amounts[$access_key])?$particular_amounts[$access_key]:0.00;
                            $fpa->finance_fee_particular_id = $ffp->id;
                            $fpa->created_at = date('Y-m-d H:i:s');
                            $fpa->updated_at = date('Y-m-d H:i:s');
                            $fpa->save();
                            
                        
                    }
                }
//                echo "Check DB for three tables";
//
//                exit;




                $this->redirect(array('/fees/subscription', 'id' => $ffc->id));
            }
        }

        $this->render('create', array(
            'model' => $ffc,
        ));
    }

    public function actionSubscription() {
        echo "<pre>";
        print_r($_GET);
        exit;
    }

    public function actionDisplaySavedImage() {
        $model = $this->loadModel($_GET['id']);
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');
        header('Content-length: ' . $model->photo_file_size);
        header('Content-Type: ' . $model->photo_content_type);
        header('Content-Disposition: attachment; filename=' . $model->photo_file_name);
        echo $model->photo_data;
    }

    public function actionRemove() {
        $model = Employees::model()->findByAttributes(array('id' => $_REQUEST['id']));
        $model->saveAttributes(array('photo_file_name' => '', 'photo_data' => ''));
        $this->redirect(array('update', 'id' => $_REQUEST['id']));
    }

    public function actionCreate2() {
        $model = new Employees;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Employees'])) {
            $model->attributes = $_POST['Employees'];
            $list = $_POST['Employees'];
            $model = $model->findByAttributes(array('id' => $_REQUEST['id']));

            $model->home_address_line1 = $list['home_address_line1'];
            $model->home_address_line2 = $list['home_address_line2'];
            $model->home_city = $list['home_city'];
            $model->home_state = $list['home_state'];
            $model->home_country_id = $list['home_country_id'];
            $model->home_pin_code = $list['home_pin_code'];

            $model->office_address_line1 = $list['office_address_line1'];
            $model->office_address_line2 = $list['office_address_line2'];
            $model->office_city = $list['office_city'];
            $model->office_state = $list['office_state'];
            $model->office_country_id = $list['office_country_id'];
            $model->office_pin_code = $list['office_pin_code'];

            $model->office_phone1 = $list['office_phone1'];
            $model->office_phone2 = $list['office_phone2'];
            $model->mobile_phone = $list['mobile_phone'];
            $model->home_phone = $list['home_phone'];
            $model->email = $list['email'];
            $model->fax = $list['fax'];


            $model->user_id = $list['user_id'];
            if ($model->save()) {

                //adding user for current student
                $user = new User;
                $profile = new Profile;
                $user->username = substr(md5(uniqid(mt_rand(), true)), 0, 10);
                $user->email = $model->email;
                $user->activkey = UserModule::encrypting(microtime() . $model->first_name);
                $password = substr(md5(uniqid(mt_rand(), true)), 0, 10);
                $user->password = UserModule::encrypting($password);
                $user->superuser = 0;
                $user->status = 1;

                if ($user->save()) {
                    //assign role
                    $authorizer = Yii::app()->getModule("rights")->getAuthorizer();
                    $authorizer->authManager->assign('teacher', $user->id);

                    //profile
                    $profile->firstname = $model->first_name;
                    $profile->lastname = $model->last_name;
                    $profile->user_id = $user->id;
                    $profile->save();

                    //saving user id to students table.
                    $model->saveAttributes(array('uid' => $user->id));

                    // For Sending SMS

                    $sms_settings = SmsSettings::model()->findAll();
                    $to = '';
                    if ($sms_settings[0]->is_enabled == '1' and $sms_settings[4]->is_enabled == '1') { // Check if SMS is enabled
                        if ($model->mobile_phone) {
                            $to = $model->mobile_phone;
                        }
                        if ($to != '') { //If phone number is provided, send SMS
                            $college = Configurations::model()->findByPk(1);
                            $from = $college->config_value;
                            $message = 'Welcome to ' . $college->config_value;
                            SmsSettings::model()->sendSms($to, $from, $message);
                        } // End send SMS
                    } // Check if SMS is provided


                    UserModule::sendMail($model->email, UserModule::t("You are registered from {site_name}", array('{site_name}' => Yii::app()->name)), UserModule::t("Please login to your account with your email id as username and password {password}", array('{password}' => $password)));
                }

                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->render('create2', array(
            'model' => $model,
        ));
    }

    public function actionAddress() {
        $model = new Employees;
        /* $this->render('address',array(
          'model'=>$model,
          )); */
        $this->render('address', array(
            'model' => $this->loadModel($_REQUEST['id']),
        ));
    }

    public function actionContact() {
        $model = new Employees;
        /* $this->render('address',array(
          'model'=>$model,
          )); */
        $this->render('contact', array(
            'model' => $this->loadModel($_REQUEST['id']),
        ));
    }

    public function actionAddinfo() {
        $model = new Employees;
        /* $this->render('address',array(
          'model'=>$model,
          )); */
        $this->render('addinfo', array(
            'model' => $this->loadModel($_REQUEST['id']),
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $settings = UserSettings::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
        if ($settings != NULL) {
            $date1 = date($settings->displaydate, strtotime($model->joining_date));
            $date2 = date($settings->displaydate, strtotime($model->date_of_birth));
        }
        $model->joining_date = $date1;
        $model->date_of_birth = $date2;
        if (isset($_POST['Employees'])) {
            $model->attributes = $_POST['Employees'];


            if ($model->joining_date)
                $model->joining_date = date('Y-m-d', strtotime($model->joining_date));
            if ($model->date_of_birth)
                $model->date_of_birth = date('Y-m-d', strtotime($model->date_of_birth));
            if ($file = CUploadedFile::getInstance($model, 'photo_data')) {
                $model->photo_file_name = $file->name;
                $model->photo_content_type = $file->type;
                $model->photo_file_size = $file->size;
                $model->photo_data = file_get_contents($file->tempName);
            }
            if ($model->save())
                $this->redirect(array('update2', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionUpdate2($id) {
        $model = $this->loadModel($id);


        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Employees'])) {
            $list = $_POST['Employees'];
            $model = $model->findByAttributes(array('id' => $_REQUEST['id']));

            $model->home_address_line1 = $list['home_address_line1'];
            $model->home_address_line2 = $list['home_address_line2'];
            $model->home_city = $list['home_city'];
            $model->home_state = $list['home_state'];
            $model->home_country_id = $list['home_country_id'];
            $model->home_pin_code = $list['home_pin_code'];

            $model->office_address_line1 = $list['office_address_line1'];
            $model->office_address_line2 = $list['office_address_line2'];
            $model->office_city = $list['office_city'];
            $model->office_state = $list['office_state'];
            $model->office_country_id = $list['office_country_id'];
            $model->office_pin_code = $list['office_pin_code'];

            $model->office_phone1 = $list['office_phone1'];
            $model->office_phone2 = $list['office_phone2'];
            $model->mobile_phone = $list['mobile_phone'];
            $model->home_phone = $list['home_phone'];
            $model->email = $list['email'];
            $model->fax = $list['fax'];


            $model->user_id = $list['user_id'];
            $model->save();
            if ($model->save()) {

                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->render('update2', array(
            'model' => $model,
        ));
    }

    public function actionPdf() {
        $employee = Employees::model()->findByAttributes(array('id' => $_REQUEST['id']));
        $employee = $employee->first_name . ' ' . $employee->last_name . ' Profile.pdf';
        $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->WriteHTML($this->renderPartial('print', array('model' => $this->loadModel($_REQUEST['id'])), true));
        $html2pdf->Output($employee);

        ////////////////////////////////////////////////////////////////////////////////////
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $criteria = new CDbCriteria;
        $criteria->compare('is_deleted', 0);
        $total = Employees::model()->count($criteria);
        $criteria->order = 'id DESC';
        $criteria->limit = '10';
        $posts = Employees::model()->findAll($criteria);


        $this->render('index', array(
            'total' => $total, 'list' => $posts
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Employees('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Employees']))
            $model->attributes = $_GET['Employees'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Employees::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'employees-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Performs the Advance search.
     * By Rajith
     */
    public function actionManage() {

        $model = new Employees;
        $criteria = new CDbCriteria;
        $criteria->compare('is_deleted', 0);
        if (isset($_REQUEST['val'])) {
            $criteria->condition = '(first_name LIKE :match or last_name LIKE :match or middle_name LIKE :match)';
            $criteria->params = array(':match' => $_REQUEST['val'] . '%');
        }
        if (isset($_REQUEST['name']) and $_REQUEST['name'] != NULL) {

            if ((substr_count($_REQUEST['name'], ' ')) == 0) {
                $criteria->condition = $criteria->condition . ' and ' . '(first_name LIKE :name or last_name LIKE :name or middle_name LIKE :name)';
                $criteria->params[':name'] = $_REQUEST['name'] . '%';
            } else if ((substr_count($_REQUEST['name'], ' ')) <= 1) {
                $name = explode(" ", $_REQUEST['name']);
                $criteria->condition = $criteria->condition . ' and ' . '(first_name LIKE :name or last_name LIKE :name or middle_name LIKE :name)';
                $criteria->params[':name'] = $name[0] . '%';
                $criteria->condition = $criteria->condition . ' and ' . '(first_name LIKE :name1 or last_name LIKE :name1 or middle_name LIKE :name1)';
                $criteria->params[':name1'] = $name[1] . '%';
            }
        }

        if (isset($_REQUEST['employeenumber']) and $_REQUEST['employeenumber'] != NULL) {
            $criteria->condition = $criteria->condition . ' and ' . 'employee_number LIKE :employeenumber';
            $criteria->params[':employeenumber'] = $_REQUEST['employeenumber'] . '%';
        }

        if (isset($_REQUEST['Employees']['employee_department_id']) and $_REQUEST['Employees']['employee_department_id'] != NULL) {
            $model->employee_department_id = $_REQUEST['Employees']['employee_department_id'];
            $criteria->condition = $criteria->condition . ' and ' . 'employee_department_id = :employee_department_id';
            $criteria->params[':employee_department_id'] = $_REQUEST['Employees']['employee_department_id'];
        }

        if (isset($_REQUEST['Employees']['employee_category_id']) and $_REQUEST['Employees']['employee_category_id'] != NULL) {
            $model->employee_category_id = $_REQUEST['Employees']['employee_category_id'];
            $criteria->condition = $criteria->condition . ' and ' . 'employee_category_id = :employee_category_id';
            $criteria->params[':employee_category_id'] = $_REQUEST['Employees']['employee_category_id'];
        }

        if (isset($_REQUEST['Employees']['employee_position_id']) and $_REQUEST['Employees']['employee_position_id'] != NULL) {
            $model->employee_position_id = $_REQUEST['Employees']['employee_position_id'];
            $criteria->condition = $criteria->condition . ' and ' . 'employee_position_id = :employee_position_id';
            $criteria->params[':employee_position_id'] = $_REQUEST['Employees']['employee_position_id'];
        }


        if (isset($_REQUEST['Employees']['employee_grade_id']) and $_REQUEST['Employees']['employee_grade_id'] != NULL) {
            $model->employee_grade_id = $_REQUEST['Employees']['employee_grade_id'];
            $criteria->condition = $criteria->condition . ' and ' . 'employee_grade_id = :employee_grade_id';
            $criteria->params[':employee_grade_id'] = $_REQUEST['Employees']['employee_grade_id'];
        }


        if (isset($_REQUEST['Employees']['gender']) and $_REQUEST['Employees']['gender'] != NULL) {
            $model->gender = $_REQUEST['Employees']['gender'];
            $criteria->condition = $criteria->condition . ' and ' . 'gender = :gender';
            $criteria->params[':gender'] = $_REQUEST['Employees']['gender'];
        }

        if (isset($_REQUEST['Employees']['marital_status']) and $_REQUEST['Employees']['marital_status'] != NULL) {
            $model->marital_status = $_REQUEST['Employees']['marital_status'];
            $criteria->condition = $criteria->condition . ' and ' . 'marital_status = :marital_status';
            $criteria->params[':marital_status'] = $_REQUEST['Employees']['marital_status'];
        }

        if (isset($_REQUEST['Employees']['blood_group']) and $_REQUEST['Employees']['blood_group'] != NULL) {
            $model->blood_group = $_REQUEST['Employees']['blood_group'];
            $criteria->condition = $criteria->condition . ' and ' . 'blood_group = :blood_group';
            $criteria->params[':blood_group'] = $_REQUEST['Employees']['blood_group'];
        }

        if (isset($_REQUEST['Employees']['nationality_id']) and $_REQUEST['Employees']['nationality_id'] != NULL) {
            $model->nationality_id = $_REQUEST['Employees']['nationality_id'];
            $criteria->condition = $criteria->condition . ' and ' . 'nationality_id = :nationality_id';
            $criteria->params[':nationality_id'] = $_REQUEST['Employees']['nationality_id'];
        }


        if (isset($_REQUEST['Employees']['dobrange']) and $_REQUEST['Employees']['dobrange'] != NULL) {

            $model->dobrange = $_REQUEST['Employees']['dobrange'];
            if (isset($_REQUEST['Employees']['date_of_birth']) and $_REQUEST['Employees']['date_of_birth'] != NULL) {
                if ($_REQUEST['Employees']['dobrange'] == '2') {
                    $model->date_of_birth = $_REQUEST['Employees']['date_of_birth'];
                    $criteria->condition = $criteria->condition . ' and ' . 'date_of_birth = :date_of_birth';
                    $criteria->params[':date_of_birth'] = date('Y-m-d', strtotime($_REQUEST['Employees']['date_of_birth']));
                }
                if ($_REQUEST['Employees']['dobrange'] == '1') {

                    $model->date_of_birth = $_REQUEST['Employees']['date_of_birth'];
                    $criteria->condition = $criteria->condition . ' and ' . 'date_of_birth < :date_of_birth';
                    $criteria->params[':date_of_birth'] = date('Y-m-d', strtotime($_REQUEST['Employees']['date_of_birth']));
                }
                if ($_REQUEST['Employees']['dobrange'] == '3') {
                    $model->date_of_birth = $_REQUEST['Employees']['date_of_birth'];
                    $criteria->condition = $criteria->condition . ' and ' . 'date_of_birth > :date_of_birth';
                    $criteria->params[':date_of_birth'] = date('Y-m-d', strtotime($_REQUEST['Employees']['date_of_birth']));
                }
            }
        } elseif (isset($_REQUEST['Employees']['dobrange']) and $_REQUEST['Employees']['dobrange'] == NULL) {
            if (isset($_REQUEST['Employees']['date_of_birth']) and $_REQUEST['Employees']['date_of_birth'] != NULL) {
                $model->date_of_birth = $_REQUEST['Employees']['date_of_birth'];
                $criteria->condition = $criteria->condition . ' and ' . 'date_of_birth = :date_of_birth';
                $criteria->params[':date_of_birth'] = date('Y-m-d', strtotime($_REQUEST['Employees']['date_of_birth']));
            }
        }


        if (isset($_REQUEST['Employees']['joinrange']) and $_REQUEST['Employees']['joinrange'] != NULL) {

            $model->joinrange = $_REQUEST['Employees']['joinrange'];
            if (isset($_REQUEST['Employees']['joining_date']) and $_REQUEST['Employees']['joining_date'] != NULL) {
                if ($_REQUEST['Employees']['joinrange'] == '2') {
                    $model->joining_date = $_REQUEST['Employees']['joining_date'];
                    $criteria->condition = $criteria->condition . ' and ' . 'joining_date = :joining_date';
                    $criteria->params[':joining_date'] = date('Y-m-d', strtotime($_REQUEST['Employees']['joining_date']));
                }
                if ($_REQUEST['Employees']['joinrange'] == '1') {

                    $model->joining_date = $_REQUEST['Employees']['joining_date'];
                    $criteria->condition = $criteria->condition . ' and ' . 'joining_date < :joining_date';
                    $criteria->params[':joining_date'] = date('Y-m-d', strtotime($_REQUEST['Employees']['joining_date']));
                }
                if ($_REQUEST['Employees']['joinrange'] == '3') {
                    $model->joining_date = $_REQUEST['Employees']['joining_date'];
                    $criteria->condition = $criteria->condition . ' and ' . 'joining_date > :joining_date';
                    $criteria->params[':joining_date'] = date('Y-m-d', strtotime($_REQUEST['Employees']['joining_date']));
                }
            }
        } elseif (isset($_REQUEST['Employees']['joinrange']) and $_REQUEST['Employees']['joinrange'] == NULL) {
            if (isset($_REQUEST['Employees']['joining_date']) and $_REQUEST['Employees']['joining_date'] != NULL) {
                $model->joining_date = $_REQUEST['Employees']['joining_date'];
                $criteria->condition = $criteria->condition . ' and ' . 'joining_date = :joining_date';
                $criteria->params[':joining_date'] = date('Y-m-d', strtotime($_REQUEST['Employees']['joining_date']));
            }
        }

        if (isset($_REQUEST['Employees']['status']) and $_REQUEST['Employees']['status'] != NULL) {
            $model->status = $_REQUEST['Employees']['status'];
            $criteria->condition = $criteria->condition . ' and ' . 'is_active = :status';
            $criteria->params[':status'] = $_REQUEST['Employees']['status'];
        }

        $criteria->order = 'first_name ASC';

        $total = Employees::model()->count($criteria);
        $pages = new CPagination($total);
        $pages->setPageSize(Yii::app()->params['listPerPage']);
        $pages->applyLimit($criteria);  // the trick is here!
        $posts = Employees::model()->findAll($criteria);


        $this->render('manage', array('model' => $model,
            'list' => $posts,
            'pages' => $pages,
            'item_count' => $total,
            'page_size' => Yii::app()->params['listPerPage'],));
    }

    public function actionDeletes() {

        $model = Employees::model()->findByAttributes(array('id' => $_REQUEST['id']));
        $model->saveAttributes(array('is_deleted' => '1'));
        echo $val;
    }

    public function actionDynamiccities() {
//              echo "<pre/>";
//              print_r($_POST);
//              exit;

        $data = Batches::model()->findAll('course_id=:course_id', array('course_id' => (int) $_POST['course_id']));

        $data = CHtml::listData($data, 'id', 'name');
        echo CHtml::tag('option', array('value' => ''), CHtml::encode('select'), true);
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

}
