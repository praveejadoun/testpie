<?php

class EmployeeAchievementsController extends RController {

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
                'actions' => array('create', 'update', 'batch', 'add', 'Download'),
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

        $model = new EmployeeAchievements;
        $model->attributes = $_POST['EmployeeAchievements'];
        $model = $model->findByAttributes(array('id' => $_REQUEST['id']));
        if (isset($_POST['EmployeeAchievements'])) {
            if ($model->save()) {
                $form_data = $_POST['EmployeeAchievements'];

                $model->achievement_title = $form_data['achievement_title'];
                $model->achievement_document_name = $form_data['achievement_document_name'];
                $model->achievement_description = $form_data['achievement_description'];

                // $contact->ID=$id;
                //$model->name= $form_data['name'];
                $model->save();
            }
            $this->redirect('employees/employees/view', array(
                'model' => $this->loadModel($_REQUEST['id']),
            ));
        }
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
//		 $rnd = rand(0,9999);  // generate random number between 0-9999
//                        $model->attributes=$_POST['EmployeeAchievements'];
//                        $list = $_POST['EmployeeAchievements'];
//                        $uploadedFile=CUploadedFile::getInstance($model,'achievdoc_file_name');
//                        $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
//                        $model->achievdoc_file_name = $fileName;
//
//                        if($model->save())
//                        {
//                            $uploadedFile->saveAs(Yii::app()->basePath.'/../uploadedfiles/'.$fileName);  // image will uplode to rootDirectory/banner/
//                            $this->redirect(array('achievements','id'=>$_REQUEST['id']));
//                        }
        if (isset($_POST['EmployeeAchievements'])) {
            $rnd = rand(0, 9999);  // generate random number between 0-9999
            $model->attributes = $_POST['EmployeeAchievements'];
           
            $uploadedFile = CUploadedFile::getInstance($model, 'achievdoc_file_name');
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
//            echo "<pre/>";
//            echo $uploadedFile;
//           print_r($_POST['EmployeeAchievements']);
//           exit;
            if($model->achievdoc_file_name == "")
            {
                if($uploadedFile == ""){
                $model->achievdoc_file_name = '';
                    if($model->save()){
                        
                        //$uploadedFile->saveAs(Yii::app()->basePath . '/../uploadedfiles/' . $fileName);  // image will uplode to rootDirectory/banner/
                        Yii::app()->user->setFlash('success', 'Achievement Updated Successfully');
                        $this->redirect(array('employees/achievements', 'id' => $_REQUEST['employee_id']));
                        }
            } 
                    else {
                         $model->achievdoc_file_name = $fileName;
                        if($model->save()){
                         $uploadedFile->saveAs(Yii::app()->basePath . '/../uploadedfiles/employee_achievements/' . $fileName);  // image will uplode to rootDirectory/banner/
                        Yii::app()->user->setFlash('success', 'Achievement Updated Successfully');
                        $this->redirect(array('employees/achievements', 'id' => $_REQUEST['employee_id']));
                    }}
                    
                    
            }
            else
            {
                $model->achievdoc_file_name == $_POST['EmployeeAchievements']['achievdoc_file_name'];
                    if($model->save()){
                        Yii::app()->user->setFlash('success', 'Achievement Updated Successfully');
                        $this->redirect(array('employees/achievements', 'id' => $_REQUEST['employee_id']));
                    }
               
                
            }
        }
           
//                        echo $fileName;
//                        exit;
//			$model->attributes=$_POST['EmployeeAchievements'];
//                        if($file=CUploadedFile::getInstance($model,'achievdoc_data'))
//					 {
//					$model->achievdoc_file_name=$file->name;
//					$model->achievdoc_content_type=$file->type;
//					$model->achievdoc_file_size=$file->size;
//					$model->achievdoc_data=file_get_contents($file->tempName);
//					 
//                                         if(!is_dir('uploadedfiles/')){
//				mkdir('uploadedfiles/');
//			}
//			if(!is_dir('uploadedfiles/employee_achievements/')){
//				mkdir('uploadedfiles/employee_achievements/');
//                        }            
//                          move_uploaded_file($file->tempName,'uploadedfiles/employee_achievements/'.$file->name);
//                                        
//                                        
//                                        
//                                        
//                                         }
//            if ($model->save())
//                $uploadedFile->saveAs(Yii::app()->basePath . '/../uploadedfiles/' . $fileName);  // image will uplode to rootDirectory/banner/
//
//            Yii::app()->user->setFlash('success', 'Achievement Updated Successfully');
//            $this->redirect(array('employees/achievements', 'id' => $_REQUEST['employee_id']));
//        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionRemove() {
        $model = EmployeeAchievements::model()->findByAttributes(array('id' => $_REQUEST['id']));
        unlink(Yii::app()->basePath . "/../uploadedfiles/employee_achievements/" . $model->achievdoc_file_name);

        $model->saveAttributes(array('achievdoc_file_name' => '', 'achievdoc_data' => ''));
        $this->redirect(array('update', 'id' => $_REQUEST['id'], 'employee_id' => $_REQUEST['employee_id']));
    }

    public function loadModel($id) {
        $model = EmployeeAchievements::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionDownloadImage() {

        $model = $this->loadModel($_GET['id']);
        $id = $_GET['id'];
        $link = mysql_connect("localhost", "root", "");
        if (!$link) {
            die("could not connect:" . mysql_error());
        }
        mysql_select_db("sms", $link);
        $que = "select achievdoc_data from employee_achievments where id LIKE $id";
        $ret = mysql_query($que)or die("Invalid query: " . mysql_error());
        $data = mysql_result($ret, 0);
        header("Content-type: image/jpeg");
        header('Content-Disposition: attachment; filename="image.jpg"');
        header('Content-Length: ' . strlen($data));

        echo $data;
        mysql_close($link);
//             $model=$this->loadModel($_GET['id']); 
//             $fileDir=Yii::app()->request->baseUrl.'/image/';
//                Yii::app()->request->sendFile(
//             $model->achievdoc_file_name,
//             file_get_contents($fileDir . $model->achievdoc_file_name),
//             $model->achievdoc_data
//                        ); 
    }

    public function actionDisplaySavedImage() {

        $model = $this->loadModel($_GET['id']);
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');
        header('Content-length: ' . $model->achievdoc_file_size);
        header('Content-Type: ' . $model->achievdoc_content_type);
        header('Content-Disposition: attachment; filename=' . $model->achievdoc_file_name);
        ob_clean();
        echo $model->achievdoc_data;
    }

    public function actionDelete() {
        $model = EmployeeAchievements::model()->findByAttributes(array('id' => $_REQUEST['id']));
        $model->delete();
        Yii::app()->user->setFlash('success', 'Achievement Deleted Successfully');
        $this->redirect(array('employees/achievements', 'id' => $_REQUEST['employee_id']));
    }

public function actionDownload(){
    $model = $this->loadModel($_GET['id']);
  $path = Yii::getPathOfAlias('webroot')."/uploadedfiles/employee_achievements/";
  $file_name = $model->achievdoc_file_name;
  $this->downloadFile($path,$file_name);
}
 public function downloadFile($fullpath,$file_name){
  if(!empty($fullpath)){
       
     $file = $fullpath.''.$file_name;
      
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$file_name);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
  }
}

}
?>

