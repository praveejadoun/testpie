<?php

class ArchiveController extends RController
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
				'actions'=>array('index','view','Students','manage'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('guardians','update','update_1'),
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
	public function actionGuardians()
	{
		 
		$model=new Guardians;
		$criteria = new CDbCriteria;
		$criteria->compare('is_deleted',0);  // normal DB field
		$criteria->condition='is_deleted=:is_del';
		$criteria->params = array(':is_del'=>0);
               
		if(isset($_REQUEST['val']))
		{
                    
		 $criteria->condition=$criteria->condition.' and '.'(first_name LIKE :match or last_name LIKE :match)';
		 //$criteria->params = array(':match' => $_REQUEST['val'].'%');
		  $criteria->params[':match'] = $_REQUEST['val'].'%';
		}
		
		if(isset($_REQUEST['name']) and $_REQUEST['name']!=NULL)
		{
		if((substr_count( $_REQUEST['name'],' '))==0)
		 { 	
		 $criteria->condition=$criteria->condition.' and '.'(first_name LIKE :name or last_name LIKE :name)';
		 $criteria->params[':name'] = $_REQUEST['name'].'%';
		}
		else if((substr_count( $_REQUEST['name'],' '))>=1)
		{
		 $name=explode(" ",$_REQUEST['name']);
		 $criteria->condition=$criteria->condition.' and '.'(first_name LIKE :name or last_name LIKE :name)';
		 $criteria->params[':name'] = $name[0].'%';
		 $criteria->condition=$criteria->condition.' and '.'(first_name LIKE :name1 or last_name LIKE :name1)';
		 $criteria->params[':name1'] = $name[1].'%';
		 	
		}
		}
				
                if(isset($_REQUEST['email']) and $_REQUEST['email']!=NULL)
		{
		 $criteria->condition=$criteria->condition.' and '.'email LIKE :email';
		 $criteria->params[':email'] = $_REQUEST['email'].'%';
		}
                
                if(isset($_REQUEST['mobile_phone']) and $_REQUEST['mobile_phone']!=NULL)
		{
		 $criteria->condition=$criteria->condition.' and '.'mobile_phone LIKE :phone';
		 $criteria->params[':mobile_phone'] = $_REQUEST['mobile_phone'].'%';
		}
                				                
                $criteria->order = 'first_name ASC';
		
		$total = Guardians::model()->count($criteria);
		$pages = new CPagination($total);
        $pages->setPageSize(Yii::app()->params['listPerPage']);
        $pages->applyLimit($criteria);  // the trick is here!
		$posts = Guardians::model()->findAll($criteria);
		
		 
		$this->render('guardians',array('model'=>$model,
		'list'=>$posts,
		'pages' => $pages,
		'item_count'=>$total,
		'page_size'=>Yii::app()->params['listPerPage'],)) ;
	 }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate_1($id)
	{
		
		$model=$this->loadModel_1($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Guardians']))
		{
			
			$model->attributes=$_POST['Guardians'];
			if($model->save())
			{
				if($_REQUEST['std']!=NULL)
				{
					$student = Students::model()->findByAttributes(array('id'=>$_REQUEST['sid']));
					$student->saveAttributes(array('parent_id'=>$_REQUEST['id']));
					//echo $_REQUEST['id'].'/'.$student->first_name; exit;
					$this->redirect(array('students','id'=>$_REQUEST['sid'],'gid'=>$_REQUEST['id']));
				}
				{
					$this->redirect(array('students/view','id'=>$_REQUEST['std']));
				}
			}
		}

		$this->render('update_1',array(
			'model'=>$model,
		));
	}
	public function actionStudents()
	{
		 
		$model=new Students;
		$criteria = new CDbCriteria;
		$criteria->compare('is_deleted',0);  // normal DB field
		$criteria->condition='is_deleted=:is_del';
		$criteria->params = array(':is_del'=>0);
               
		if(isset($_REQUEST['val']))
		{
                    
		 $criteria->condition=$criteria->condition.' and '.'(first_name LIKE :match or last_name LIKE :match or middle_name LIKE :match)';
		 //$criteria->params = array(':match' => $_REQUEST['val'].'%');
		  $criteria->params[':match'] = $_REQUEST['val'].'%';
		}
		
		if(isset($_REQUEST['name']) and $_REQUEST['name']!=NULL)
		{
		if((substr_count( $_REQUEST['name'],' '))==0)
		 { 	
		 $criteria->condition=$criteria->condition.' and '.'(first_name LIKE :name or last_name LIKE :name or middle_name LIKE :name)';
		 $criteria->params[':name'] = $_REQUEST['name'].'%';
		}
		else if((substr_count( $_REQUEST['name'],' '))>=1)
		{
		 $name=explode(" ",$_REQUEST['name']);
		 $criteria->condition=$criteria->condition.' and '.'(first_name LIKE :name or last_name LIKE :name or middle_name LIKE :name)';
		 $criteria->params[':name'] = $name[0].'%';
		 $criteria->condition=$criteria->condition.' and '.'(first_name LIKE :name1 or last_name LIKE :name1 or middle_name LIKE :name1)';
		 $criteria->params[':name1'] = $name[1].'%';
		 	
		}
		}
		
		if(isset($_REQUEST['admissionnumber']) and $_REQUEST['admissionnumber']!=NULL)
		{
		 $criteria->condition=$criteria->condition.' and '.'admission_no LIKE :admissionnumber';
		 $criteria->params[':admissionnumber'] = $_REQUEST['admissionnumber'].'%';
		}
		
                if(isset($_REQUEST['email']) and $_REQUEST['email']!=NULL)
		{
		 $criteria->condition=$criteria->condition.' and '.'email LIKE :email';
		 $criteria->params[':email'] = $_REQUEST['email'].'%';
		}
                
                if(isset($_REQUEST['phone1']) and $_REQUEST['phone1']!=NULL)
		{
		 $criteria->condition=$criteria->condition.' and '.'phone1 LIKE :phone1';
		 $criteria->params[':phone1'] = $_REQUEST['phone1'].'%';
		}
                				                
                $criteria->order = 'first_name ASC';
		
		$total = Students::model()->count($criteria);
		$pages = new CPagination($total);
        $pages->setPageSize(Yii::app()->params['listPerPage']);
        $pages->applyLimit($criteria);  // the trick is here!
		$posts = Students::model()->findAll($criteria);
		
		 
		$this->render('students',array('model'=>$model,
		'list'=>$posts,
		'pages' => $pages,
		'item_count'=>$total,
		'page_size'=>Yii::app()->params['listPerPage'],)) ;
	 }
	

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
            
		if($id)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('students'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Guardians');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Guardians('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Guardians']))
			$model->attributes=$_GET['Guardians'];

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
		$model=students::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='guardians-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
       
        
        public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
			if($settings!=NULL)
				{	
					$date1=date($settings->displaydate,strtotime($model->admission_date));
					$date2=date($settings->displaydate,strtotime($model->date_of_birth));
					
		
				}
				$model->admission_date=$date1;
				$model->date_of_birth=$date2;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Students']))
		{
			$model->attributes=$_POST['Students'];
			if($model->admission_date)
			$model->admission_date=date('Y-m-d',strtotime($model->admission_date));
			if($model->date_of_birth)
			$model->date_of_birth=date('Y-m-d',strtotime($model->date_of_birth));
			if($file=CUploadedFile::getInstance($model,'photo_data'))
       		 {
            $model->photo_file_name=$file->name;
            $model->photo_content_type=$file->type;
            $model->photo_file_size=$file->size;
            $model->photo_data=file_get_contents($file->tempName);
      		  }
			if($model->save())
				$this->redirect(array('students','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        
        public function loadModel_1($id)
	{
		$model=Guardians::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
      
	public function actionDeletes($id)
	{
            
		if($id)
		{
			// we only allow deletion via POST request
			$this->loadModel_1($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('guardians'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}	
        
         public function actionDeleteAll()
	{
            
		
		print_r($_REQUEST);exit;
			// we only allow deletion via POST request
			$this->loadModel()->deleteAll();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('manage'));
		
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
        
         public function actionDeletesAll()
	{
            
		
		print_r($_REQUEST);exit;
			// we only allow deletion via POST request
			$this->loadModel_1()->deleteAll();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('manage'));
		
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
}
