<?php

class StudentsController extends RController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    public function   init() {
             $this->registerAssets();
              parent::init();
 }
    private function registerAssets(){

            Yii::app()->clientScript->registerCoreScript('jquery');

         //IMPORTANT about Fancybox.You can use the newest 2.0 version or the old one
        //If you use the new one,as below,you can use it for free only for your personal non-commercial site.For more info see
		//If you decide to switch back to fancybox 1 you must do a search and replace in index view file for "beforeClose" and replace with 
		//"onClosed"
        // http://fancyapps.com/fancybox/#license
          // FancyBox2
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js_plugins/fancybox2/jquery.fancybox.js', CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js_plugins/fancybox2/jquery.fancybox.css', 'screen');
         // FancyBox
         //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/fancybox/jquery.fancybox-1.3.4.js', CClientScript::POS_HEAD);
         // Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/fancybox/jquery.fancybox-1.3.4.css','screen');
        //JQueryUI (for delete confirmation  dialog)
         Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/jqui1812/js/jquery-ui-1.8.12.custom.min.js', CClientScript::POS_HEAD);
         Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/jqui1812/css/dark-hive/jquery-ui-1.8.12.custom.css','screen');
          ///JSON2JS
         Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/json2/json2.js');
       

           //jqueryform js
               Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/ajaxform/jquery.form.js', CClientScript::POS_HEAD);
              Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/ajaxform/form_ajax_binding.js', CClientScript::POS_HEAD);
              Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/ajaxform/client_val_form.css','screen');

 }
    
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
                'actions' => array('index', 'view', 'manage', 'Website', 'savesearch', 'events', 'attentance', 'Assesments', 'DisplaySavedImage', 'Fees', 'Payfees', 'Pdf', 'Printpdf', 'Remove', 'Search', 'inactive', 'active', 'deletes','Managepdf','create1','courses','document','electives','deleterow','achievements'),
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
        //$this->layout='';
        //header("Content-type: image/jpeg");
        //echo $model->photo_data;
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionPrintpdf() {
        //$this->layout='';
        //header("Content-type: image/jpeg");
        //echo $model->photo_data;
        $this->render('printpdf', array(
            'model' => $this->loadModel($_REQUEST['id']),
        ));
    }

    public function actionPdf() {
        $student = Students::model()->findByAttributes(array('id' => $_REQUEST['id']));
        $student = $student->first_name . ' ' . $student->last_name . ' Profile.pdf';

        # HTML2PDF has very similar syntax
        $html2pdf = Yii::app()->ePdf->HTML2PDF();

        $html2pdf->WriteHTML($this->renderPartial('printpdf', array('model' => $this->loadModel($_REQUEST['id'])), true));
        $html2pdf->Output($student);

        ////////////////////////////////////////////////////////////////////////////////////
    }
       public function actionManagepdf()
    {
        
	 $student = Students::model()->findAll();
		 $student = 'student list.pdf';	
        $html2pdf = Yii::app()->ePdf->HTML2PDF();
		$html2pdf->WriteHTML($this->renderPartial('print_1_1',array(),true));
                ob_end_clean();
        $html2pdf->Output( $student);
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

        $model = Students::model()->findByAttributes(array('id' => $_REQUEST['id']));
        $model->saveAttributes(array('photo_file_name' => '', 'photo_data' => ''));
        $this->redirect(array('update', 'id' => $_REQUEST['id']));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Students;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
       
       
             
        if (isset($_POST['Students']) || isset($_POST['Applicants'])) {
            
//          echo "<pre>";
//           print_r($_POST['Applicants']);exit;

            if(!empty($_POST['Students'])){
                $batch = Batches::model()->findByAttributes(array('id'=>$_POST['Students']['batch_id']));
                $model->course_id = $batch->course_id;
                $model->attributes = $_POST['Students'];
                $list = $_POST['Students'];
            }else{
                $batch = Batches::model()->findByAttributes(array('id'=>$_POST['Applicants']['batch_id']));
                $model->course_id = $batch->course_id;
                $model->attributes = $_POST['Applicants'];
                $list = $_POST['Applicants'];
            }
            
            
            
            if ($model->admission_date)
                $model->admission_date = date('Y-m-d', strtotime($model->admission_date));
            if ($model->date_of_birth)
                $model->date_of_birth = date('Y-m-d', strtotime($model->date_of_birth));
            //$model->photo_data=CUploadedFile::getInstance($model,'photo_data');

            if ($file = CUploadedFile::getInstance($model, 'photo_data')) {
                $model->photo_file_name = $file->name;
                $model->photo_content_type = $file->type;
                $model->photo_file_size = $file->size;
                $model->photo_data = file_get_contents($file->tempName);
            }
             else{
              if(isset($_POST['photo_file_name'])){
              $model->photo_file_name=$_POST['photo_file_name'];
              $model->photo_content_type=$_POST['photo_content_type'];
              $model->photo_file_size=$_POST['photo_file_size'];
              $model->photo_data=hex2bin($_POST['photo_data']);
              }
            } 
            //echo $model->photo_data.'----';
             if(isset($_FILES['Students']) || isset($_FILES['Applicants']))
              {
            //  print_r($_FILES['Students']);
              //exit;
              if(!empty($_FILES['Students']['tmp_name'])){
              $tmpName = $_FILES['Students']['tmp_name'];
              }else{
                  $tmpName = $_FILES['Applicants']['tmp_name'];
              }
              $fp      = fopen($tmpName, 'r');
              $data = fread($fp, filesize($tmpName));
              $data = addslashes($data);
              fclose($fp);
              $model->photo_data = $data;
              } 
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
                    $authorizer->authManager->assign('student', $user->id);

                    //profile
                    $profile->firstname = $model->first_name;
                    $profile->lastname = $model->last_name;
                    $profile->user_id = $user->id;
                    $profile->save();

                    //saving user id to students table.
                    $model->saveAttributes(array('uid' => $user->id));

                    // for sending sms
                    $sms_settings = SmsSettings::model()->findAll();
                    $to = '';
                    if ($sms_settings[0]->is_enabled == '1' and $sms_settings[2]->is_enabled == '1') { // Checking if SMS is enabled.
                        if ($model->phone1) {
                            $to = $model->phone1;
                        } elseif ($model->phone2) {
                            $to = $model->phone2;
                        }
                        if ($to != '') { // Send SMS if phone number is provided
                            $college = Configurations::model()->findByPk(1);
                            $from = $college->config_value;
                            $message = 'Welcome to ' . $college->config_value;
                            SmsSettings::model()->sendSms($to, $from, $message);
                        } // End send SMS
                    } // End check if SMS is enabled


                    UserModule::sendMail($model->email, UserModule::t("You are registered from {site_name}", array('{site_name}' => Yii::app()->name)), UserModule::t("Please login to your account with your email id as username and password {password}", array('{password}' => $password)));
                }
                // for saving in fee table
                $fee_collection = FinanceFeeCollections::model()->findAll('batch_id=:x', array(':x' => $model->batch_id));

                if ($fee_collection != NULL) {
                    for ($i = 0; $i < count($fee_collection); $i++) {
                        $fee = new FinanceFees;
                        $fee->fee_collection_id = $fee_collection[$i]['id'];
                        $fee->student_id = $model->id;
                        $fee->is_paid = '0';
                        $fee->save();
                    }
                }

                $this->redirect(array('guardians/create', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        //echo "<pre>";
        //print_r($model->first_name);exit;
        $settings = UserSettings::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
        if ($settings != NULL) {
            $date1 = date($settings->displaydate, strtotime($model->admission_date));
            $date2 = date($settings->displaydate, strtotime($model->date_of_birth));
        }
        $model->admission_date = $date1;
        $model->date_of_birth = $date2;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Students'])) {
            $model->attributes = $_POST['Students'];
            if ($model->admission_date)
                $model->admission_date = date('Y-m-d', strtotime($model->admission_date));
            if ($model->date_of_birth)
                $model->date_of_birth = date('Y-m-d', strtotime($model->date_of_birth));
            if ($file = CUploadedFile::getInstance($model, 'photo_data')) {
                $model->photo_file_name = $file->name;
                $model->photo_content_type = $file->type;
                $model->photo_file_size = $file->size;
                $model->photo_data = file_get_contents($file->tempName);
            }
            if ($model->save())
                
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionAssesments() {
        $model = new Students;
        $this->render('assesments', array(
            'model' => $this->loadModel($_REQUEST['id']),
        ));
    }
    
      public function actionElectives() {
        $model = new Students;
        $this->render('electives', array(
            'model' => $this->loadModel($_REQUEST['id']),
        ));
    }
    
    public function actionDeleterow(){
     
		$postRecord = StudentSubjects::model()->findByPk($_REQUEST['id']);
		$postRecord->delete();
		 Yii::app()->user->setFlash('notification','Data Saved Successfully');
		$this->redirect(array('electives','id'=>$_REQUEST['sid']));
		   
    }

    public function actionAttentance() {
        $model = new Students;
        $this->render('attentance', array(
            'model' => $this->loadModel($_REQUEST['id']),
        ));
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
    
    public function actionDeletestudnts(){
        print_r($_REQUEST);exit;
    }

    /**
     * Performs the Advance search.
     * By Rajith
     */
    public function actionManage() {
        $model = new Students;
        $criteria = new CDbCriteria;
        $criteria->compare('is_deleted', 0);  // normal DB field
        $criteria->condition = 'is_deleted=:is_del';
        $criteria->params = array(':is_del' => 0);
        if (isset($_REQUEST['val'])) {
            $criteria->condition = $criteria->condition . ' and ' . '(first_name LIKE :match or last_name LIKE :match or middle_name LIKE :match)';
            //$criteria->params = array(':match' => $_REQUEST['val'].'%');
            $criteria->params[':match'] = $_REQUEST['val'] . '%';
        }

        if (isset($_REQUEST['name']) and $_REQUEST['name'] != NULL) {
            if ((substr_count($_REQUEST['name'], ' ')) == 0) {
                $criteria->condition = $criteria->condition . ' and ' . '(first_name LIKE :name or last_name LIKE :name or middle_name LIKE :name)';
                $criteria->params[':name'] = $_REQUEST['name'] . '%';
            } else if ((substr_count($_REQUEST['name'], ' ')) >= 1) {
                $name = explode(" ", $_REQUEST['name']);
                $criteria->condition = $criteria->condition . ' and ' . '(first_name LIKE :name or last_name LIKE :name or middle_name LIKE :name)';
                $criteria->params[':name'] = $name[0] . '%';
                $criteria->condition = $criteria->condition . ' and ' . '(first_name LIKE :name1 or last_name LIKE :name1 or middle_name LIKE :name1)';
                $criteria->params[':name1'] = $name[1] . '%';
            }
        }

        if (isset($_REQUEST['admissionnumber']) and $_REQUEST['admissionnumber'] != NULL) {
            $criteria->condition = $criteria->condition . ' and ' . 'admission_no LIKE :admissionnumber';
            $criteria->params[':admissionnumber'] = $_REQUEST['admissionnumber'] . '%';
        }

        if (isset($_REQUEST['Students']['batch_id']) and $_REQUEST['Students']['batch_id'] != NULL) {
            $model->batch_id = $_REQUEST['Students']['batch_id'];
            $criteria->condition = $criteria->condition . ' and ' . 'batch_id = :batch_id';
            $criteria->params[':batch_id'] = $_REQUEST['Students']['batch_id'];
        }

        if (isset($_REQUEST['Students']['gender']) and $_REQUEST['Students']['gender'] != NULL) {
            $model->gender = $_REQUEST['Students']['gender'];
            $criteria->condition = $criteria->condition . ' and ' . 'gender = :gender';
            $criteria->params[':gender'] = $_REQUEST['Students']['gender'];
        }

        if (isset($_REQUEST['Students']['blood_group']) and $_REQUEST['Students']['blood_group'] != NULL) {
            $model->blood_group = $_REQUEST['Students']['blood_group'];
            $criteria->condition = $criteria->condition . ' and ' . 'blood_group = :blood_group';
            $criteria->params[':blood_group'] = $_REQUEST['Students']['blood_group'];
        }

        if (isset($_REQUEST['Students']['nationality_id']) and $_REQUEST['Students']['nationality_id'] != NULL) {
            $model->nationality_id = $_REQUEST['Students']['nationality_id'];
            $criteria->condition = $criteria->condition . ' and ' . 'nationality_id = :nationality_id';
            $criteria->params[':nationality_id'] = $_REQUEST['Students']['nationality_id'];
        }


        if (isset($_REQUEST['Students']['dobrange']) and $_REQUEST['Students']['dobrange'] != NULL) {

            $model->dobrange = $_REQUEST['Students']['dobrange'];
            if (isset($_REQUEST['Students']['date_of_birth']) and $_REQUEST['Students']['date_of_birth'] != NULL) {
                if ($_REQUEST['Students']['dobrange'] == '2') {
                    $model->date_of_birth = $_REQUEST['Students']['date_of_birth'];
                    $criteria->condition = $criteria->condition . ' and ' . 'date_of_birth = :date_of_birth';
                    $criteria->params[':date_of_birth'] = date('Y-m-d', strtotime($_REQUEST['Students']['date_of_birth']));
                }
                if ($_REQUEST['Students']['dobrange'] == '1') {

                    $model->date_of_birth = $_REQUEST['Students']['date_of_birth'];
                    $criteria->condition = $criteria->condition . ' and ' . 'date_of_birth < :date_of_birth';
                    $criteria->params[':date_of_birth'] = date('Y-m-d', strtotime($_REQUEST['Students']['date_of_birth']));
                }
                if ($_REQUEST['Students']['dobrange'] == '3') {
                    $model->date_of_birth = $_REQUEST['Students']['date_of_birth'];
                    $criteria->condition = $criteria->condition . ' and ' . 'date_of_birth > :date_of_birth';
                    $criteria->params[':date_of_birth'] = date('Y-m-d', strtotime($_REQUEST['Students']['date_of_birth']));
                }
            }
        } elseif (isset($_REQUEST['Students']['dobrange']) and $_REQUEST['Students']['dobrange'] == NULL) {
            if (isset($_REQUEST['Students']['date_of_birth']) and $_REQUEST['Students']['date_of_birth'] != NULL) {
                $model->date_of_birth = $_REQUEST['Students']['date_of_birth'];
                $criteria->condition = $criteria->condition . ' and ' . 'date_of_birth = :date_of_birth';
                $criteria->params[':date_of_birth'] = date('Y-m-d', strtotime($_REQUEST['Students']['date_of_birth']));
            }
        }


        if (isset($_REQUEST['Students']['admissionrange']) and $_REQUEST['Students']['admissionrange'] != NULL) {

            $model->admissionrange = $_REQUEST['Students']['admissionrange'];
            if (isset($_REQUEST['Students']['admission_date']) and $_REQUEST['Students']['admission_date'] != NULL) {
                if ($_REQUEST['Students']['admissionrange'] == '2') {
                    $model->admission_date = $_REQUEST['Students']['admission_date'];
                    $criteria->condition = $criteria->condition . ' and ' . 'admission_date = :admission_date';
                    $criteria->params[':admission_date'] = date('Y-m-d', strtotime($_REQUEST['Students']['admission_date']));
                }
                if ($_REQUEST['Students']['admissionrange'] == '1') {

                    $model->admission_date = $_REQUEST['Students']['admission_date'];
                    $criteria->condition = $criteria->condition . ' and ' . 'admission_date < :admission_date';
                    $criteria->params[':admission_date'] = date('Y-m-d', strtotime($_REQUEST['Students']['admission_date']));
                }
                if ($_REQUEST['Students']['admissionrange'] == '3') {
                    $model->admission_date = $_REQUEST['Students']['admission_date'];
                    $criteria->condition = $criteria->condition . ' and ' . 'admission_date > :admission_date';
                    $criteria->params[':admission_date'] = date('Y-m-d', strtotime($_REQUEST['Students']['admission_date']));
                }
            }
        } elseif (isset($_REQUEST['Students']['admissionrange']) and $_REQUEST['Students']['admissionrange'] == NULL) {
            if (isset($_REQUEST['Students']['admission_date']) and $_REQUEST['Students']['admission_date'] != NULL) {
                $model->admission_date = $_REQUEST['Students']['admission_date'];
                $criteria->condition = $criteria->condition . ' and ' . 'admission_date = :admission_date';
                $criteria->params[':admission_date'] = date('Y-m-d', strtotime($_REQUEST['Students']['admission_date']));
            }
        }

        if (isset($_REQUEST['Students']['status']) and $_REQUEST['Students']['status'] != NULL) {
            $model->status = $_REQUEST['Students']['status'];
            $criteria->condition = $criteria->condition . ' and ' . 'is_active = :status';
            $criteria->params[':status'] = $_REQUEST['Students']['status'];
        }


        $criteria->order = 'id DESC';

        $total = Students::model()->count($criteria);
        $pages = new CPagination($total);
        $pages->setPageSize(Yii::app()->params['listPerPage']);
        $pages->applyLimit($criteria);  // the trick is here!
        $posts = Students::model()->findAll($criteria);


        $this->render('manage', array('model' => $model,
            'list' => $posts,
            'pages' => $pages,
            'item_count' => $total,
            'page_size' => Yii::app()->params['listPerPage'],));
    }

    public function actionDeletestudents(){
        print_r($_POST);exit;
    }

    public function actionIndex() {
        $criteria = new CDbCriteria;
        $criteria->compare('is_deleted', 0);
        $total = Students::model()->count($criteria);
        $criteria->order = 'id DESC';
        $criteria->limit = '10';
        $posts = Students::model()->findAll($criteria);


        $this->render('index', array(
            'total' => $total, 'list' => $posts
        ));
    }

    public function actionSavesearch() {
        $dataProvider = new CActiveDataProvider('Students');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionPayfees() {
        $list = FinanceFees::model()->findByAttributes(array('id' => $_REQUEST['id']));
        $list->is_paid = 1;
        $list->save();
        $this->redirect(array('fees', 'id' => $list->student_id));
    }

    public function actionFees($id) {
        //$model= new Students;
        $this->render('fees', array(
            'model' => $this->loadModel($id),
        ));
        //$this->render('fees',array('model'=>$model));
    }

    public function actionEvents() {
        $this->render('events');
    }

    public function actionAdd() {

        if (isset($_POST['title'])) {
            $data[MENU_TITLE] = trim($_POST['title']);
            if (!empty($data[MENU_TITLE])) {
                $data[MENU_URL] = $_POST['url'];
                $data[MENU_CLASS] = $_POST['class'];
                $data[MENU_GROUP] = $_POST['group_id'];
                $data[MENU_POSITION] = Menu::model()->get_last_position($_POST['group_id']);
                $data[MENU_POSITION] = $data[MENU_POSITION] + 1;
                if (Menu::model()->insert(MENU_TABLE, $data)) {
                    $data[MENU_ID] = $this->db->Insert_ID();
                    $response['status'] = 1;
                    $li_id = 'menu-' . $data[MENU_ID];
                    $response['li'] = '<li id="' . $li_id . '" class="sortable">' . Menu::model()->get_label($data) . '</li>';
                    $response['li_id'] = $li_id;
                } else {
                    $response['status'] = 2;
                    $response['msg'] = 'Add menu error.';
                }
            } else {
                $response['status'] = 3;
            }
            echo 'eee';
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }

    public function actionWebsite() {
        $group_id = 1;
        if (isset($_GET['group_id'])) {
            $group_id = (int) $_GET['group_id'];
        }
        $menu = Menu::model()->get_menu($group_id);
        $data['menu_ul'] = '<ul id="easymm"></ul>';
        if ($menu) {

            include 'includes/tree.php';
            $tree = new Tree;

            foreach ($menu as $row) {
                $tree->add_row(
                        $row[MENU_ID], $row[MENU_PARENT], ' id="menu-' . $row[MENU_ID] . '" class="sortable"', Menu::model()->get_label($row)
                );
            }

            $data['menu_ul'] = $tree->generate_list('id="easymm"');
        }
        $data['group_id'] = $group_id;
        $data['group_title'] = Menu::model()->get_menu_group_title($group_id);
        $data['menu_groups'] = Menu::model()->get_menu_groups();
        //$this->view('menu', $data);
        $this->render('website', $data);
    }

    public function actionBatch() {


        $data = Batches::model()->findAll('course_id=:id', array(':id' => (int) $_POST['cid']));

        echo CHtml::tag('option', array('value' => 0), CHtml::encode('-Select-'), true);

        $data = CHtml::listData($data, 'id', 'name');
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Students('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Students']))
            $model->attributes = $_GET['Students'];

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
        $model = Students::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
     public function loadModel1($aid) {
        $model = Applicants::model()->findByPk($aid);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionSearch() {

        $model = new Students;
        $criteria = new CDbCriteria;
        $criteria->condition = 'first_name LIKE :match or middle_name LIKE :match or last_name LIKE :match';
        $criteria->params = array(':match' => $_POST['char'] . '%');
        $criteria->order = 'first_name ASC';
        $total = Students::model()->count($criteria);
        $pages = new CPagination($total);
        $pages->setPageSize(Yii::app()->params['listPerPage']);
        $pages->applyLimit($criteria);  // the trick is here!
        $posts = Students::model()->findAll($criteria);

        $emp = new Employees;
        $criteria_1 = new CDbCriteria;
        $criteria_1->condition = 'first_name LIKE :match or middle_name LIKE :match or last_name LIKE :match';
        $criteria_1->params = array(':match' => $_POST['char'] . '%');
        $criteria_1->order = 'first_name ASC';
        $tot = Employees::model()->count($criteria_1);
        $pages_1 = new CPagination($total);
        $pages_1->setPageSize(Yii::app()->params['listPerPage']);
        $pages_1->applyLimit($criteria_1);  
        $posts_1 = Employees::model()->findAll($criteria_1);


        $this->render('search', array('model' => $model,
            'list' => $posts,
            'posts' => $posts_1,
            'pages' => $pages,
            'item_count' => $total,
            'page_size' => 10,));

        //$stud = Students::model()->findAll('first_name LIKE '.$_POST['char']);
        //echo count($stud);
        //exit;
        //print_r($_POST);	
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'students-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionInactive() {
        $model = Students::model()->findByAttributes(array('id' => $_REQUEST['sid']));
        $model->saveAttributes(array('is_active' => '0'));
        if ($model->uid and $model->uid != NULL and $model->uid != 0) {
            $user = User::model()->findByPk($model->uid); // Making student user inactive
            $user->saveAttributes(array('status' => '0'));
        }

        $guardian = Guardians::model()->findByAttributes(array('ward_id' => $_REQUEST['sid']));
        if ($guardian->uid and $guardian->uid != NULL and $guardian->uid != 0) {
            $parent_user = User::model()->findByPk($guardian->uid); // Making parent user inactive
            $parent_user->saveAttributes(array('status' => '0'));
        }



        $this->redirect(array('/courses/batches/batchstudents', 'id' => $_REQUEST['id']));
    }

   public function actionDeleteselected() {
       
       foreach($_POST['ids'] as $sid){
        $model = Students::model()->findByAttributes(array('id' => $sid));
        $model->saveAttributes(array('is_deleted' => '1'));
        if ($model->uid and $model->uid != NULL and $model->uid != 0) { // Deleting student user
            $user = User::model()->findByPk($model->uid);
            if ($user) {
                $profile = Profile::model()->findByPk($user->id);
                if ($profile)
                    $profile->delete();
                $user->delete();
            }
        }

        $guardian = Guardians::model()->findByAttributes(array('ward_id' => $sid));
        if ($guardian->uid and $guardian->uid != NULL and $guardian->uid != 0) { //Deleting parent user
            $parent_user = User::model()->findByPk($guardian->uid);
            if ($parent_user) {
                $profile = Profile::model()->findByPk($parent_user->id);
                if ($profile)
                    $profile->delete();
                $parent_user->delete();
            }
        }
        $examscores = ExamScores::model()->DeleteAllByAttributes(array('student_id' => $sid));
        
       }
        echo "success";exit;
    }

    public function actionDeletes() {
        
   
        $model = Students::model()->findByAttributes(array('id' => $_REQUEST['sid']));
        
        $model->saveAttributes(array('is_deleted' => '1'));
        if ($model->uid and $model->uid != NULL and $model->uid != 0) { // Deleting student user
            $user = User::model()->findByPk($model->uid);
            if ($user) {
                $profile = Profile::model()->findByPk($user->id);
                if ($profile)
                    $profile->delete();
                $user->delete();
            }
        }

        $guardian = Guardians::model()->findByAttributes(array('ward_id' => $_REQUEST['sid']));
        if ($guardian->uid and $guardian->uid != NULL and $guardian->uid != 0) { //Deleting parent user
            $parent_user = User::model()->findByPk($guardian->uid);
            if ($parent_user) {
                $profile = Profile::model()->findByPk($parent_user->id);
                if ($profile)
                    $profile->delete();
                $parent_user->delete();
            }
        }
        $examscores = ExamScores::model()->DeleteAllByAttributes(array('student_id' => $_REQUEST['sid']));
        
        
        $this->redirect(array('/students/students/manage'));
    }

   

	
	
	
	
	public function actionActive()
	{
		$model = Students::model()->findByAttributes(array('id'=>$_REQUEST['sid']));
		$model->saveAttributes(array('is_active'=>'1'));
		if($model->uid and $model->uid!=NULL and $model->uid!=0)
		{
			$user = User::model()->findByPk($model->uid); // Making student user active
			$user->saveAttributes(array('status'=>'1'));
		}
		
		$guardian = Guardians::model()->findByAttributes(array('ward_id'=>$_REQUEST['sid']));
		if($guardian->uid and $guardian->uid!=NULL and $guardian->uid!=0)
		{
			$parent_user = User::model()->findByPk($guardian->uid); // Making parent user active
			$parent_user->saveAttributes(array('status'=>'1'));
		}
		$this->redirect(array('/courses/batches/batchstudents','id'=>$_REQUEST['id']));
	}
	
         public function actionDeleteAll()
	{
            
		
		
			// we only allow deletion via POST request
               
                
			$this->loadModel()->deleteAll();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('manage'));
		
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
        public function actioncreate_1()
        {
           $model = new Students;
      
        }
       public function actionAjax_delete(){
                 $id=$_POST['sid'];
                 $deleted=$this->loadModel($id);
                if ($deleted->saveAttributes(array('is_deleted' => '1')) ){
               echo json_encode (array('success'=>true));
               exit;
                }else{
                  echo json_encode (array('success'=>false));
                  exit;
                           }
      }
      
      public function actionCourses()
      {
          $this->render('courses', array(
            'model' => $model,
        )); 
      }
      
       public function actionDocument()
      {
           
		$model = new StudentDocument;
                 $criteria = new CDbCriteria;
//                $criteria->compare('is_deleted',0);
                 $criteria->addCondition('student_id = :sid');
                 $criteria->addCondition('is_deleted = :del'); 
                 $criteria->params = array(':sid' => $_REQUEST['id'],':del'=>0);
		if(isset($_POST['StudentDocument']))
		{
			$model->attributes=$_POST['StudentDocument'];
                        $list = $_POST['StudentDocument'];
                     $model->document_name = $list['document_name'];
				if($file=CUploadedFile::getInstance($model,'document_data'))
					 {
					$model->document_file_name=$file->name;
					$model->document_content_type=$file->type;
					$model->document_file_size=$file->size;
					$model->document_data=file_get_contents($file->tempName);
					 
                                        if(!is_dir('uploadedfiles/')){
				mkdir('uploadedfiles/');
			}
			if(!is_dir('uploadedfiles/employee_documents/')){
				mkdir('uploadedfiles/employee_documents/');
			}
			move_uploaded_file($file->tempName,'uploadedfiles/employee_documents/'.$file->name);
                                        
                                         }
				
				
                      
			if($model->save())
                        {
                               Yii::app()->user->setFlash('success','Document Created Successfully');
				$this->redirect(array('document','id'=>$_REQUEST['id']));
                        }
		}
             $criteria->order = 'id DESC';
		
		$total = StudentDocument::model()->count($criteria);
		$pages = new CPagination($total);
        $pages->setPageSize(Yii::app()->params['listPerPage']);
        $pages->applyLimit($criteria);  // the trick is here!
		$posts = StudentDocument::model()->findAll($criteria);
		$this->render('document',array(
			'model'=>$model,
                    'studdoc'=>$posts,
		'pages' => $pages,
		'item_count'=>$total,
		'page_size'=>Yii::app()->params['listPerPage'],
		));
//          $this->render('document', array(
//            'model' => $model,
//        )); 
      }
      
       public function actionAchievements() {
           
        $model = new StudentAchievements;
         $criteria = new CDbCriteria;
         //$criteria->compare('is_deleted',0);
          $criteria->addCondition('student_id = :sid');
          $criteria->addCondition('is_deleted = :del'); 
          $criteria->params = array(':sid' => $_REQUEST['id'],':del'=>0);
         if(isset($_POST['StudentAchievements']))
		{
			
                        
                        
                        $rnd = rand(0,9999);  // generate random number between 0-9999
                        $model->attributes=$_POST['StudentAchievements'];
                        $list = $_POST['StudentAchievements'];
                        $uploadedFile=CUploadedFile::getInstance($model,'document_file_name');
                        $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                        
                        
                        if($model->document_file_name == "")
            {
                if($uploadedFile == ""){
                $model->document_file_name = '';
                    if($model->save()){
                        
                        //$uploadedFile->saveAs(Yii::app()->basePath . '/../uploadedfiles/' . $fileName);  // image will uplode to rootDirectory/banner/
                        Yii::app()->user->setFlash('success','Achievement Created Successfully');
                         $this->redirect(array('achievements','id'=>$_REQUEST['id']));
                        }
            } 
                    else {
                         $model->document_file_name = $fileName;
                        if($model->save()){
                         $uploadedFile->saveAs(Yii::app()->basePath . '/../uploadedfiles/student_achievements/' . $fileName);  // image will uplode to rootDirectory/banner/
                       Yii::app()->user->setFlash('success','Achievement Created Successfully');
                         $this->redirect(array('achievements','id'=>$_REQUEST['id']));
                    }}
                    
                    
            }
            else
            {
                $model->document_file_name == $_POST['StudentAchievements']['document_file_name'];
                    if($model->save()){
                       Yii::app()->user->setFlash('success','Achievement Created Successfully');
                         $this->redirect(array('achievements','id'=>$_REQUEST['id']));
                    }
               
                
            }
		}
                 $criteria->order = 'id DESC';
		
		$total = StudentAchievements::model()->count($criteria);
		$pages = new CPagination($total);
        $pages->setPageSize(Yii::app()->params['listPerPage']);
        $pages->applyLimit($criteria);  // the trick is here!
		$posts = StudentAchievements::model()->findAll($criteria);
		$this->render('achievements',array(
			'model'=>$model,
                    'achievement'=>$posts,
		'pages' => $pages,
		'item_count'=>$total,
		'page_size'=>Yii::app()->params['listPerPage'],
		));
    }

    
     public function actionLog()
	{
		$model = new StudentLogs;
		if(isset($_POST['StudentLogs']))
		{
			$model->attributes=$_POST['StudentLogs'];
                        
			if($model->save())
                        {
                            Yii::app()->user->setFlash('success','Log Created Successfully');
				$this->redirect(array('log','id'=>$_REQUEST['id']));
                        }
		}

		$this->render('log',array(
			'model'=>$model,
		));
	}     
}
