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

		// Uncomment the following line if AJAX validation is needed
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
					$model->document_content_type=$file->type;
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
			header('Content-length: '.$model->photo_file_size);
			header('Content-Type: '.$model->photo_content_type);
			header('Content-Disposition: attachment; filename='.$model->photo_file_name);
			echo $model->photo_data;
		}
	public function actionRemove()
	{
		$model = Employees::model()->findByAttributes(array('id'=>$_REQUEST['id']));
		$model->saveAttributes(array('photo_file_name'=>'','photo_data'=>''));
		$this->redirect(array('update','id'=>$_REQUEST['id']));
	}
	
	 public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmployeeDocument']))
		{
			$model->attributes=$_POST['EmployeeDocument'];
			if($model->save())
				$this->redirect(array('employees/log','id'=>$_REQUEST['employee_id']));
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
		$this->redirect(array('employees/documents','id'=>$_REQUEST['employee_id']));
		
	}
        public function actionDelete()
	{
		$model = EmployeeDocument::model()->findByAttributes(array('id'=>$_REQUEST['id']));
		$model->delete();	
		$this->redirect(array('employees/documents','id'=>$_REQUEST['employee_id']));
        }	
}

