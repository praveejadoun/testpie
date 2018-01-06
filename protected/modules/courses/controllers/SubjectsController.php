<?php

class SubjectsController extends RController
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
				'actions'=>array('index','view','Addnew','Addnew1','GetCitiesByCountryId'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','subjects'),
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
	public function actionCreate1()
	{
		$model=new Subjects;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Subjects']))
		{ 
//			$model->attributes=$_POST['Subjects'];
                          $list = $_POST['Subjects'];
                          echo "<pre/>";
                          print_r($list);
                          exit;
                           $batch = $list['batch_id'];
                          
                $name = $list['name'];
                $code = $list['code'];
       
         $course = $list['course_id'];
         $mwc = $list['max_weekly_classes'];
         $eg = $list['elective_group_id'];
          $del = $list['is_deleted'];
          foreach ($batch as $particular_key=>$value) {
               $model->batch_id =  $batch;
              $model->name = $name[$particular_key];
              $model->code =  $code[$particular_key];
              
                $model->course_id =  $course[$particular_key];
                 $model->max_weekly_classes =  $mwc[$particular_key];
                 $model->elective_group_id = $eg[$particular_key];
                 $model->is_deleted = $del[$particular_key]; 
                 $model->created_at = date('Y-m-d H:i:s');
                 $model->updated_at = date('Y-m-d H:i:s');
                 $model->save();
                  echo $model->batch_id;
//          print_r($model);
//          exit;
          }
         
//			$data=SubjectName::model()->findByAttributes(array('id'=>$model->name));
//			if($data!=NULL)
//			{
//				$model->name=$data->name;
//				$model->code=$data->code;
//				
//			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create1',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
//                echo "<pre/>";
//                print_r($_POST['Subjects']);
//                exit;
		if(isset($_POST['Subjects']))
		{
			$model->attributes=$_POST['Subjects'];
                        
//			$data=SubjectName::model()->findByAttributes(array('id'=>$model->name));
//			if($data!=NULL)
//			{
//				$model->name=$data->name;
//				$model->code=$data->code;
//				
//			}
			if($model->save()){
                                  Yii::app()->user->setFlash('success','Subject Updated Successfully');
				$this->redirect(array('courses/managecourse'));
                }}

//		            Yii::app()->clientScript->scriptMap['jquery.js'] = false;
                $this->render('update',array('model'=>$model));
//                    $this->renderPartial('update',array('model'=>$model,'id'=>1,'batch_id'=>$_GET['val1']),false,true);
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Subjects');
		$model=new Subjects;
		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionAddnew() {
            
                $model=new Subjects;
        // Ajax Validation enabled
        //$this->performAjaxValidation($model);
        // Flag to know if we will render the form or try to add 
        // new jon.
                $flag=true;
	   	if(isset($_POST['Submit']))
        {       $flag=false;
                $list = $_POST['Subjects'];
                $batch = $list['batch_id'];
                $name = $list['name'];
                $code = $list['code'];
        
         $course = $list['course_id'];
         $mwc = $list['max_weekly_classes'];
         $eg = $list['elective_group_id'];
          $del = $list['is_deleted'];
          foreach ($batch as $particular_key=>$value) {
              $model->batch_id =  $batch;
              $model->name = $name[$particular_key];
              $model->code =  $code[$particular_key];
               
                $model->course_id =  $course[$particular_key];
                 $model->max_weekly_classes =  $mwc[$particular_key];
                 $model->elective_group_id = $eg[$particular_key];
                 $model->is_deleted = $del[$particular_key]; 
                 $model->created_at = date('Y-m-d H:i:s');
                 $model->updated_at = date('Y-m-d H:i:s');
                 $model->save();
          }
         
//        $model->attributes=$_POST['Subjects'];
         
//            $model->save();
              
                }
//                echo "<pre/>";
//                 print_r($model);exit;
                if($flag) {
                    Yii::app()->clientScript->scriptMap['jquery.js'] = false;
                    $this->renderPartial('create1',array('model'=>$model),false,true);
                }
                
        }
		public function actionAddnew1() {
                $model=new Subjects;
        // Ajax Validation enabled
        //$this->performAjaxValidation($model);
        // Flag to know if we will render the form or try to add 
        // new jon.
                $flag=true;
	   	if(isset($_POST['Submit']))
        {       $flag=false;
            $model->attributes=$_POST['Subjects'];
          
            $model->save();
              
                }
                if($flag) {
                    Yii::app()->clientScript->scriptMap['jquery.js'] = false;
                    $this->renderPartial('create1',array('model'=>$model,'id'=>2,'batch_id'=>$_GET['val1']),false,true);
                }
        }

        public function actionAddupdate() {
        //$model=$this->loadModel(3);

		
        // Ajax Validation enabled
        //$this->performAjaxValidation($model);
        // Flag to know if we will render the form or try to add 
        // new jon.
		
		$flag=true;
	   	if(isset($_POST['Subjects']))
        {   
			$flag=false;
			$model=Subjects::model()->findByPk($_REQUEST['id']);
			$model->attributes=$_POST['Subjects'];
			
			$model->save();
			exit;
		}
		if($flag) {
			$model=Subjects::model()->findByPk($_REQUEST['id']);
			$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
			if($settings!=NULL)
			{	
				

			}
		
			Yii::app()->clientScript->scriptMap['jquery.js'] = true;
			$this->renderPartial('update',array('model'=>$model),false,true);
		}
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Subjects('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Subjects']))
			$model->attributes=$_GET['Subjects'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionSubjects()
	{
		$model=new Subjects('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['id']))
			$model->batch_id=$_GET['id'];

		$this->render('subjects',array(
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
		$model=Subjects::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function actionActivate() 
	{  
	
	     $model=Batches::model()->findByPk($_REQUEST['id']);   
		 $model->saveAttributes(array('is_active'=>'1'));                               
		 
		 $this->redirect(array('batchstudents', 'id' =>$_REQUEST['id']));
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='subjects-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
      public function actionRemove()
		{
			$val = $_GET['val1'];
              
                      $examscores = Subjects::model()->DeleteAllByAttributes(array('id'=>$val));
							//$exam->delete(); //Exam Deleted
						
				
                      $examscores->delete(); //Exam Group Deleted
                      
			
		}
		
     public function actionCreate()
     {
         $model = new Subjects;
         //$subject->attributes = $_POST;
         if (isset($_POST['Subjects'])) {
         $list = $_POST['Subjects'];
        
         $batch = $list['batch_id'];
         $name = $list['name'];
//         $i=1;
        
         foreach ($batch as $batches)
         {
             $subject = new Subjects;
             $subject->batch_id = $batches;
            
             $subject->name = $name;
             $subject->code = NULL;
             $subject->elective_group_id = NULL;
             $subject->max_weekly_classes = $list['max_weekly_classes'];
             $subject->course_id = $list['course_id'];
             $subject->is_deleted = 0;
             $subject->is_active = 1;
             $subject->created_at = date('Y-m-d H:i:s');
             $subject->updated_at = date('Y-m-d H:i:s');
             $subject->save();
                  
//              echo $i++;
//             echo     $model->batch_id;
//             
//             echo '<br/>';
//          echo $model->name;
//           echo '<br/>';
//          exit;
           /* $model->batch_id = $batch;
            $model->name = $list['name'] ;*/
            
         }
           Yii::app()->user->setFlash('success','Subject Created Successfully');
          $this->redirect(array('/courses/'));
         }
         $this->render('create',array('model'=>$model));
     }
                
       public function actionGetCitiesByCountryId() {
        $data = Batches::model()->findAll('course_id=:course_id AND is_deleted=:x',
            array(':course_id'=>(int) $_POST['course_id'],':x'=>0));
 
        $data = CHtml::listData($data, 'id', 'name');
 
       
        foreach($data as $value => $key) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($key), true);
        }
    }          
}
