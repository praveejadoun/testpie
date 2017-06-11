<?php

class StudentleavetypeController extends RController
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
				'actions'=>array('index','view','manage','Website','savesearch','events','attentance','Assesments','DisplaySavedImage','Fees','Payfees','Pdf','Pdflist','Printpdf','Printpdflist','Remove','Search','inactive','active','deletes'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'/*,'update','batch','add'*/),
				'users'=>array('@'),
			),
			/*array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			/*array('deny',  // deny all users
				'users'=>array('*'),
			),*/
		);
	}

	/* public function actionCreate()
	{
		$model = new Studentleavetype;
                
               $criteria = new CDbCriteria;
               
		// Uncomment the following line if AJAX validation is needed
		 //$this->performAjaxValidation($model);

		if(isset($_POST['Studentleavetype']))
		{
                    $model->attributes=$_POST['Studentleavetype'];
                     $model->validate();
                     
                     if($model->validate())
			{
			if($model->save())
			{
                        
				       $form_data = $_POST['Studentleavetype'];
                                       $status = $_POST['StudentLeaveTypes'];
                                     
                                              $model->name = $form_data['name'];
                                              $model->code = $form_data['code'];
                                              $model->label = $form_data['label'];
                                              $model->colorcode = $form_data['colorcode'];
                                              $model->status = $status['status'];
                                             // $contact->ID=$id;
                                            //$model->name= $form_data['name'];
                                        $model->save();
						
			$this->redirect(array('manage','id'=>$model->id));
                         }
                        }               
                }
               
                   
                 if(isset($_REQUEST['Studentleavetype']['name']) and $_REQUEST['Studentleavetype']['name']!=NULL)
		{
			$model->name = $_REQUEST['Studentleavetype']['name'];
			$criteria->condition=$criteria->condition.' and '.'name = :name';
		    $criteria->params[':name'] = $_REQUEST['Studentleavetype']['name'];
		}
		
		if(isset($_REQUEST['Studentleavetype']['code']) and $_REQUEST['Studentleavetype']['code']!=NULL)
		{
			$model->code = $_REQUEST['Studentleavetype']['code'];
			$criteria->condition=$criteria->condition.' and '.'code = :code';
		    $criteria->params[':code'] = $_REQUEST['Studentleavetype']['code'];
		}
		
		if(isset($_REQUEST['Studentleavetype']['label']) and $_REQUEST['Studentleavetype']['label']!=NULL)
		{
			$model->label = $_REQUEST['Studentleavetype']['label'];
			$criteria->condition=$criteria->condition.' and '.'label = :label';
		    $criteria->params[':label'] = $_REQUEST['Studentleavetype']['label'];
		}
		
		if(isset($_REQUEST['Studentleavetype']['colorcode']) and $_REQUEST['Studentleavetype']['colorcode']!=NULL)
		{
			$model->colorcode = $_REQUEST['Studentleavetype']['colorcode'];
			$criteria->condition=$criteria->condition.' and '.'colorcode = :colorcode';
		    $criteria->params[':colorcode'] = $_REQUEST['Studentleavetype']['colorcode'];
		}		
		
		if(isset($_REQUEST['Studentleavetype']['status']) and $_REQUEST['Studentleavetype']['status']!=NULL)
		{
			$model->status = $_REQUEST['Studentleavetype']['status'];
			$criteria->condition=$criteria->condition.' and '.'is_active = :status';
		    $criteria->params[':status'] = $_REQUEST['Studentleavetype']['status'];
		}
                
		
                
                $criteria->order = 'name ASC';
		
		$total = Studentleavetype::model()->count($criteria);
		$pages = new CPagination($total);
        $pages->setPageSize(Yii::app()->params['listPerPage']);
        $pages->applyLimit($criteria);  // the trick is here!
		$posts = Studentleavetype::model()->findAll($criteria);
		
		 
		$this->render('create',array('model'=>$model,
		'list'=>$posts,
		'pages' => $pages,
		'item_count'=>$total,
		'page_size'=>Yii::app()->params['listPerPage'],)) ;
                
						  
				
			
            
		
                
	}*/
        
        protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='studentleavetype-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
       public function actionManage()
	 {
		 
	      $model=new Studentleavetype;
              
	       if(isset($_POST['Studentleavetype']))
		{
                    $model->attributes=$_POST['Studentleavetype'];
                     $model->validate();
                     
                     if($model->validate())
                     {
			if($model->save())
			{
                        
				       $form_data = $_POST['Studentleavetype'];
                                       $status = $_POST['StudentLeaveTypes'];
                                     
                                              $model->name = $form_data['name'];
                                              $model->code = $form_data['code'];
                                              $model->label = $form_data['label'];
                                              $model->colorcode = $form_data['colorcode'];
                                              $model->status = $status['status'];
                                             // $contact->ID=$id;
                                            //$model->name= $form_data['name'];
                                        $model->save();
						
			$this->redirect(array('manage'));
                         }
                        }               
                }
                 else
                {
                $criteria = new CDbCriteria;
		//$criteria->compare('is_deleted',0);  // normal DB field
		//$criteria->condition='is_deleted=:is_del';
		//$criteria->params = array(':is_del'=>0);
		
		
		if(isset($_REQUEST['Studentleavetype']['name']) and $_REQUEST['Studentleavetype']['name']!=NULL)
		{
			$model->name = $_REQUEST['Studentleavetype']['name'];
			$criteria->condition=$criteria->condition.' and '.'name = :name';
		    $criteria->params[':name'] = $_REQUEST['Studentleavetype']['name'];
		}
		
		if(isset($_REQUEST['Studentleavetype']['code']) and $_REQUEST['Studentleavetype']['code']!=NULL)
		{
			$model->code = $_REQUEST['Studentleavetype']['code'];
			$criteria->condition=$criteria->condition.' and '.'code = :code';
		    $criteria->params[':code'] = $_REQUEST['Studentleavetype']['code'];
		}
		
		if(isset($_REQUEST['Studentleavetype']['label']) and $_REQUEST['Studentleavetype']['label']!=NULL)
		{
			$model->label = $_REQUEST['Studentleavetype']['label'];
			$criteria->condition=$criteria->condition.' and '.'label = :label';
		    $criteria->params[':label'] = $_REQUEST['Studentleavetype']['label'];
		}
		
		if(isset($_REQUEST['Studentleavetype']['colorcode']) and $_REQUEST['Studentleavetype']['colorcode']!=NULL)
		{
			$model->colorcode = $_REQUEST['Studentleavetype']['colorcode'];
			$criteria->condition=$criteria->condition.' and '.'colorcode = :colorcode';
		    $criteria->params[':colorcode'] = $_REQUEST['Studentleavetype']['colorcode'];
		}		
		
		if(isset($_REQUEST['Studentleavetype']['status']) and $_REQUEST['Studentleavetype']['status']!=NULL)
		{
			$model->status = $_REQUEST['Studentleavetype']['status'];
			$criteria->condition=$criteria->condition.' and '.'is_active = :status';
		    $criteria->params[':status'] = $_REQUEST['Studentleavetype']['status'];
		}
                
		
                $criteria->order = 'name ASC';
	        $total = Studentleavetype::model()->count($criteria);
		$pages = new CPagination($total);
        $pages->setPageSize(Yii::app()->params['listPerPage']);
        $pages->applyLimit($criteria);  // the trick is here!
		$posts = Studentleavetype::model()->findAll($criteria);
                
		$this->render('manage',array('model'=>$model,
		'list'=>$posts,
		'pages' => $pages,
		'item_count'=>$total,
                 'page_size'=>Yii::app()->params['listPerPage'],)) ;
                
                 }
	 }

       public function actionUpdate($id)
	{
            
		$model=$this->loadModel($id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Studentleavetype']))
		{
			$model->attributes=$_POST['Studentleavetype'];
			if($model->save())
				$this->redirect(array('manage','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        
        public function loadModel($id)
	{
		$model=Studentleavetype::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function actionDelete($id)
	{
            
		if($id)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('manage'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
         

}       
