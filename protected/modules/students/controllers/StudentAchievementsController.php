<?php

class StudentAchievementsController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','Create2','update2','Manage','savesearch','DisplaySavedImage','pdf','Address','Contact','Addinfo','Remove'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','batch','add','DownloadImage'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
//	public function actionCreate()
//	{
//		 
//	      $model=new StudentAchievements;
//              $model->attributes=$_POST['StudentAchievements'];
//              $model =$model->findByAttributes(array('id'=>$_REQUEST['id']));
//	       if(isset($_POST['StudentAchievements']))
//                   
//		{
//               if($model->save())
//               {
//                   $form_data = $_POST['StudentAchievements'];
//                                      
//                                              $model->achievement_title = $form_data['achievement_title'];
//                                              $model->achievement_document_name = $form_data['achievement_document_name'];
//                                              $model->achievement_description = $form_data['achievement_description'];
//                                              
//                                             // $contact->ID=$id;
//                                            //$model->name= $form_data['name'];
//                                        $model->save();
//               }
//		$this->redirect('students/students/view',array(
//			'model'=>$this->loadModel($_REQUEST['id']),
//		));				
//			
//                }
//	}
//        
        
         public function actionCreate() {
        $model = new StudentAchievements;

        // Uncomment the fol
        // lowing line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['StudentAchievements'])) {

            $model->attributes = $_POST['StudentAchievements'];
            $list = $_POST['StudentAchievements'];

            /*
             * Checking whether date of birth is null
             */

            $model->document_name = $list['document_name'];
            if ($file = CUploadedFile::getInstance($model, 'file_data')) {
                $model->file_name = $file->name;
                $model->file_type=$file->name;
                $model->file_size = $file->size;
                $model->file_data = file_get_contents($file->tempName);
            }


            if ($model->save()) {

                $this->redirect(array('students/students/view', 'id' => $_REQUEST['id']));
            }
            //}
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }
        
        
        
        
        	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['StudentAchievements']))
		{
			$model->attributes=$_POST['StudentAchievements'];
                        if($file=CUploadedFile::getInstance($model,'file_data'))
					 {
					$model->file_name=$file->name;
					$model->file_type=$file->type;
					$model->file_size=$file->size;
					$model->file_data=file_get_contents($file->tempName);
					 
                                         if(!is_dir('uploadedfiles/')){
				mkdir('uploadedfiles/');
			}
			if(!is_dir('uploadedfiles/student_achievements/')){
				mkdir('uploadedfiles/student_achievements/');
                        }            
                          move_uploaded_file($file->tempName,'uploadedfiles/student_achievements/'.$file->name);
                                        
                                        
                                        
                                        
                                         }
			if($model->save())
                              Yii::app()->user->setFlash('success','Achievement Updated Successfully');
				$this->redirect(array('students/achievements','id'=>$_REQUEST['student_id']));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	 public function actionRemove()
	{
		$model = StudentAchievements::model()->findByAttributes(array('id'=>$_REQUEST['id']));
		$model->saveAttributes(array('file_name'=>'','file_data'=>''));
		$this->redirect(array('update','id'=>$_REQUEST['id'],'student_id'=>$_REQUEST['student_id']));
	}
        
        public function loadModel($id)
	{
		$model= StudentAchievements::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
       public function actionDisplaySavedImage() {
        $model = $this->loadModel($_GET['id']);
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');
        header('Content-length: ' . $model->document_file_size);
        header('Content-Type: ' . $model->document_content_type);
        header('Content-Disposition: attachment; filename=' . $model->document_file_name);
        echo $model->document_data;
    }   
//    public function actionDisplaySavedImage()
//		{
//                        
//			$model=$this->loadModel($_GET['id']);
//			header('Pragma: public');
//			header('Expires: 0');
//			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//			header('Content-Transfer-Encoding: binary');
//			header('Content-length: '.$model->achievdoc_file_size);
//			header('Content-Type: '.$model->achievdoc_content_type);
//			header('Content-Disposition: attachment; filename='.$model->achievdoc_file_name);
//                        ob_clean();
//			echo $model->achievdoc_data;	
//		}
       public function actionDelete()
	{
		$model = StudentAchievements::model()->findByAttributes(array('id'=>$_REQUEST['id']));
		$model->delete();
                Yii::app()->user->setFlash('success','Achievement Deleted Successfully');
		$this->redirect(array('students/achievements','id'=>$_REQUEST['student_id']));
        }
         public function actionDownloadImage() {
        
        $model=$this->loadModel($_GET['id']);
        $id = $_GET['id'];
        $link=mysql_connect("localhost","root","");
        if(!$link)
           {
              die("could not connect:".mysql_error());
           }
           mysql_select_db("sms",$link);
           $que="select document_data from student_achievement where id LIKE $id";
           $ret=mysql_query($que)or die("Invalid query: " . mysql_error());
           $data = mysql_result($ret, 0);
           header("Content-type: image/jpeg");
           header('Content-Disposition: attachment; filename="image.jpg"');
           header('Content-Length: '.strlen($data));

           echo $data;
           mysql_close($link);

    }
       
}
?>

