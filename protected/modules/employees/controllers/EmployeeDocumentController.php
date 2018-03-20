<?php

class EmployeeDocumentController extends RController
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
				'actions'=>array('create','update','batch','add'),
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
	public function actionCreate()
	{
      		$model=new EmployeeDocument;

		// Uncomment the fol
                // lowing line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['EmployeeDocument']))
		{
			
			$model->attributes=$_POST['EmployeeDocument'];
			$list = $_POST['EmployeeDocument'];
			
			/*
			* Checking whether date of birth is null
			*/
			
				$model->document_name = $list['document_name'];
				if($file=CUploadedFile::getInstance($model,'document_data'))
					 {
					$model->document_file_name=$file->name;
					//$model->document_file_type=$file->name;
					$model->document_file_size=$file->size;
					$model->document_data=file_get_contents($file->tempName);
					  }
				
				
				if($model->save())
				{
                               
				$this->redirect(array('employees/view','id'=>$_REQUEST['id']));
				}
			//}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionDisplaySavedImage()
		{
			$model=$this->loadModel($_GET['id']);
			header('Pragma: public');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Content-Transfer-Encoding: binary');
			header('Content-length: '.$model->document_file_size);
			header('Content-Type: '.$model->document_content_type);
			header('Content-Disposition: attachment; filename='.$model->document_file_name);
			echo $model->document_data;
		}
     public function actionDownloadImage()
        {
         
          $model=$this->loadModel($_GET['id']);
        $id = $_GET['id'];
        $link=mysql_connect("localhost","root","");
        if(!$link)
           {
              die("could not connect:".mysql_error());
           }
           mysql_select_db("sms",$link);
           $que="select document_data from employee_document where id LIKE $id";
           $ret=mysql_query($que)or die("Invalid query: " . mysql_error());
           $data = mysql_result($ret, 0);
           $file_name = $model->document_file_name;
           header("Content-type: image/jpeg");
           header('Content-Disposition: attachment; filename='.$file_name);
           header('Content-Length: '.strlen($data));

           echo $data;
           mysql_close($link);
         
//            $model=$this->loadModel($_GET['id']); 
//            $fileDir=Yii::app()->request->baseUrl.'/uploadedfiles/employee_documents/';
//            Yii::app()->request->sendFile(
//            $model->document_file_name,
//            file_get_contents($fileDir . $model->document_file_name),
//            $model->document_data
//                 );  
        }
        
           
         public function actionDownloadImage1()
        {
         $model = $this->loadModel($_GET['id']); 
             $fileDir = Yii::app()->basePath.'/uploadedfiles/school_logo/';

                 Yii::app()
                 ->request
                 ->sendFile(
                     $model->document_file_name,
                     file_get_contents($fileDir.$model->document_file_name),
                 $model->document_data
          );
        }    
     
 
        public function actionDownload()
        {
               $user = EmployeeDocument::model()->findByPk($id);
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=MY_FILE_NAME');
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . count($user->document_file_size));
                ob_clean();
                echo $user->document_file_size;
                
                }
	public function actionRemove()
	{
		$model = EmployeeDocument::model()->findByAttributes(array('id'=>$_REQUEST['id']));
		$model->saveAttributes(array('document_file_name'=>'','document_data'=>''));
                Yii::app()->user->setFlash('success','Document Attatchment Removed Successfully');
		$this->redirect(array('update','id'=>$_REQUEST['id'],'employee_id'=>$_REQUEST['employee_id']));
	}
	
	 public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmployeeDocument']))
		{
			$model->attributes=$_POST['EmployeeDocument'];
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
                             Yii::app()->user->setFlash('success','Document Updated Successfully');
				$this->redirect(array('employees/documents','id'=>$_REQUEST['employee_id']));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	
		

      

      
	public function actionIndex()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('is_deleted',0);
		$total = Employees::model()->count($criteria);
		$criteria->order = 'id DESC';
		$criteria->limit = '10';
		$posts = Employees::model()->findAll($criteria);
		
		
		$this->render('index',array(
			'total'=>$total,'list'=>$posts
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Employees('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Employees']))
			$model->attributes=$_GET['Employees'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model= EmployeeDocument::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='employees-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	 public function actionDisapprove()
	{
		
		$model = EmployeeDocument::model()->findByAttributes(array('id'=>$_REQUEST['id']));
		$model->saveAttributes(array('is_active'=>'0'));
                 Yii::app()->user->setFlash('success','Document Disapproved Successfully');
		$this->redirect(array('employees/documents','id'=>$_REQUEST['employee_id']));
		
	}
        public function actionDelete()
	{
		$model = EmployeeDocument::model()->findByAttributes(array('id'=>$_REQUEST['id']));
		$model->delete();
                 Yii::app()->user->setFlash('success','Document Deleted Successfully');
		$this->redirect(array('employees/documents','id'=>$_REQUEST['employee_id']));
        }	
}

