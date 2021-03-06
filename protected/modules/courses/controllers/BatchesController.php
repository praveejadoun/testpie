<?php

class BatchesController extends RController
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
				'actions'=>array('index','view','manage','Batchstudents','Addnew','settings','Addupdate','remove','promote','deactivate','activate','loadconstituencies','assign','approve'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
		$model=new Batches;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Batches']))
		{
			
			$model->attributes=$_POST['Batches'];
			$list = $_POST['Batches'];
					if(!$list['start_date']){
						$s_d="";
					}
					else{
						$s_d=date('Y-m-d',strtotime($list['start_date']));
					}
					if(!$list['end_date']){
						$e_d="";
					}
					else{
						$e_d=date('Y-m-d',strtotime($list['end_date']));
					}
			$model->start_date=$s_d;
			$model->end_date=$e_d;
			if($model->save())
                                 Yii::app()->user->setFlash('success','Batch Created Successfully');
				$this->redirect(array('courses/managecourse'));
		}

		$this->render('create',array(
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
		
		$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
			if($settings!=NULL)
				{	
					$date1=date($settings->displaydate,strtotime($model->start_date));
					$date2=date($settings->displaydate,strtotime($model->end_date));
					
		
				}
				$model->start_date=$date1;
				$model->end_date=$date2;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
//                                echo "<pre/>";
//                                print_r($_POST['Batches']);
//                                exit;
		if(isset($_POST['Batches']))
		{
			$model->attributes=$_POST['Batches'];
			$model->start_date=date('Y-m-d', strtotime($model->start_date)); 
			$model->end_date=date('Y-m-d', strtotime($model->end_date)); 
			if($model->save())
                                 Yii::app()->user->setFlash('success','Batch Updated Successfully');
				$this->redirect(array('courses/managecourse'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        public function actionElectives() 
	{                                    
		 $model=new Electives();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Electives']))
		{
			$model->attributes=$_POST['Electives'];
			if($model->save())
			$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('electives',array(
			'model'=>$model,
		));
		  
	}
        public function actionAssign()
	{
            if(($_REQUEST['sub'] and $_REQUEST['eg'])!=NULL){
        $check = StudentSubjects::model()->findAllByAttributes(array('student_id'=>$_REQUEST['sid'],'subject_id'=>$_REQUEST['sub']));
        $count=count($check);
        if($count == 1)
        {   
//            echo "sunil";exit;
            Yii::app()->user->setFlash('notification','Elective  is already assigned');
            
                               
             
        }
        else
        {
        
	$model = new StudentSubjects;
        $data_1=Electives::model()->findByAttributes(array('elective_group_id'=>$_REQUEST['eg']));
	$model->student_id = $_REQUEST['sid'];
	$model->subject_id = $_REQUEST['sub'];
        $model->batch_id = $data_1->batch_id;
	$model->save();
         Yii::app()->user->setFlash('notification','Elective  is Successfully assigned');
        }
//         Yii::app()->request->urlReferrer;
        
	
	}
 else {
              Yii::app()->user->setFlash('notification','Please select elective group and subject');

 }
 $this->redirect(array('electives','id'=>$_REQUEST['id']));
        }
	public function actionManage() 
	{                                    
		 
		 $this->render('manage'); 
	}
	public function actionBatchstudents() 
	{      
            $this->render('batchstudents'); 
	}
        public function actionWaitinglist() 
	{      
            $this->render('Waitinglist'); 
	}
	public function actionPromote_popup() 
	{ 
	     $this->render('promote_popup'); 
	}
        public function actionStudentelectives() 
	{      
            $this->render('studentelectives'); 
	}
	public function actionSettings() 
	{                                    
		 
		 $this->render('settings'); 
	}
	
	public function actionDeactivate() 
	{  
	
	     $model=Batches::model()->findByPk($_REQUEST['id']);   
		 $model->saveAttributes(array('is_active'=>'0'));                               
		 
		 $this->redirect(array('courses/deactivatedbatches'));
	}
	public function actionActivate() 
	{  
	
	     $model=Batches::model()->findByPk($_REQUEST['id']);  
          
		 $model->saveAttributes(array('is_active'=>'1'));                               
		 
		 $this->redirect(array('courses/deactivatedbatches'));
	}
	public function actionAddnew() {
        //$model=$this->loadModel(3);
			$model=new Batches;
        // Ajax Validation enabled
        $this->performAjaxValidation($model);
        // Flag to know if we will render the form or try to add 
        // new jon.
		$flag=true;
	   	if(isset($_POST['Submit']))
        {       $flag=false;

            $model->attributes=$_POST['Batches'];
			$model->start_date=date('Y-m-d', strtotime($model->start_date)); 
			$model->end_date=date('Y-m-d', strtotime($model->end_date)); 
            $model->save();
              
		}
		if($flag) {
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$this->renderPartial('create',array('model'=>$model,'val1'=>$_GET['val1']),false,true);
		}
   }
		public function actionAddupdate() {
        //$model=$this->loadModel(3);

		
        // Ajax Validation enabled
        //$this->performAjaxValidation($model);
        // Flag to know if we will render the form or try to add 
        // new jon.
		
		$flag=true;
	   	if(isset($_POST['Batches']))
        {   
			$flag=false;
			$model=Batches::model()->findByPk($_GET['val1']);
			$model->attributes=$_POST['Batches'];
			$model->start_date=date('Y-m-d', strtotime($model->start_date)); 
			$model->end_date=date('Y-m-d', strtotime($model->end_date)); 
			$model->save();
                        exit;
		}
		if($flag) {
			$model=Batches::model()->findByPk($_GET['val1']);
			$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
			if($settings!=NULL)
			{	
                            
				$date1=date($settings->displaydate,strtotime($model->start_date));
				$date2=date($settings->displaydate,strtotime($model->end_date));
			

			}
                        
		$model->start_date=$date1;
		$model->end_date=$date2;
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$this->renderPartial('update',array('model'=>$model,'val1'=>$_GET['val1'],'course_id'=>$_GET['course_id']),false,true);
		}
	}
		public function actionRemove()
		{
			$val = $_GET['val1'];
			$model=Batches::model()->findByPk($val);
			$model->is_active = 0;
			$model->is_deleted = 1;
			$model->employee_id = ' ';
			if($model->save()){
				// Student Deletion
					$students = Students::model()->findAllByAttributes(array('batch_id'=>$model->id));
					
					foreach($students as $student){
						
						//Making student user inactive
						if($student->uid!=NULL and $student->uid!=0){
							$student_user = User::model()->findByAttributes(array('id'=>$student->uid));
							if($student_user!=NULL){

								$student_user->saveAttributes(array('status'=>'0'));
							}
						}
						
						//Making parent user inactive
						$parent = Guardians::model()->findByAttributes(array('ward_id'=>$student->id));
						if($parent->uid!=NULL and $parent->uid!=0){
							$parent_user = User::model()->findByAttributes(array('id'=>$parent->uid));
							if($parent_user!=NULL){

								$parent_user->saveAttributes(array('status'=>'0'));
							}
						}

						$student->saveAttributes(array('is_active'=>'0','is_deleted'=>'1')); // Student Deleted
						
						
					}
					
					// Subject Association Deletion
					$subjects = Subjects::model()->findAllByAttributes(array('batch_id'=>$model->id));
					foreach($subjects as $subject){
						EmployeesSubjects::model()->DeleteAllByAttributes(array('subject_id'=>$subject->id));
						 $subject->delete();
					}
					
					
					
					// Exam Group Deletion
					
					$examgroups = ExamGroups::model()->findAllByAttributes(array('batch_id'=>$model->id));
					
					foreach($examgroups as $examgroup){
						
						// Exams Deletion
						$exams = Exams::model()->findAllByAttributes(array('exam_group_id'=>$examgroup->id));
						foreach($exams as $exam){
							
							//Exam Score Deletion
							$examscores = ExamScores::model()->DeleteAllByAttributes(array('exam_id'=>$exam->id));
							$exam->delete(); //Exam Deleted
							
						}
						
						$examgroup->delete(); //Exam Group Deleted
						
					}
					
					//Fee Collection Deletion
					
					$collections = FinanceFeeCollections::model()->findAllByAttributes(array('batch_id'=>$model->id));
					foreach($collections as $collection){
						
						// Finance Fees Deletion
						$student_fees = FinanceFees::model()->DeleteAllByAttributes(array('fee_collection_id'=>$collection->id)); 
								
						$collection->delete(); // Fee Collection Deleted
						
					}
					
					//Fee Category Deletion
					
					$categories = FinanceFeeCategories::model()->findAllByAttributes(array('batch_id'=>$model->id));
					
					foreach($categories as $category){
						
						// Fee Particular Deletion	
						$particulars = FinanceFeeParticulars::model()->DeleteAllByAttributes(array('finance_fee_category_id'=>$category->id)); 
						
						
						$category->delete(); // Fee Category Deleted
					
					}
					
					//Timetable Entry Deletion
					$periods = TimetableEntries::model()->DeleteAllByAttributes(array('batch_id'=>$model->id)); 
					
					//Class Timings Deletion
					$class_timings = ClassTimings::model()->DeleteAllByAttributes(array('batch_id'=>$model->id)); 
					
					//Delete Weekdays
					$weekdays = Weekdays::model()->DeleteAllByAttributes(array('batch_id'=>$model->id));
				
			}
			
			echo $val;
			
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
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('courses/deactivatedbatches'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Batches');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Batches('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Batches']))
			$model->attributes=$_GET['Batches'];

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
		$model=Batches::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='batches-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
       public function actionDynamiccities()
		{
		//please enter current controller name because yii send multi dim array 
			$data=EmployeesSubjects::model()->findAll('subject_id=:sub_id',array(':sub_id'=>(int) $_POST['TimetableEntries']['subject_id']));
			
		 	echo CHtml::tag('option', array('value' => ''), CHtml::encode('Select Employee'), true);
			
			$data=CHtml::listData($data,'id','employee_id');
			foreach($data as $value=>$name)
			{
				$emp_name = Employees::model()->findByAttributes(array('id'=>$name));
				echo CHtml::tag('option',array('value'=>$emp_name->id),$emp_name->first_name.' '.$emp_name->last_name,true);
			}
		}

	

public function actiongetstreets()
    {
        $data = Electives::model()->findAll('id=:id', array(':elective_group_id'=>(int)$_POST['testtbl[city]']));
        $data = CHtml::listData($data, 'id', 'name');
        foreach($data AS $value=>$name)
        {
            echo CHtml::tag('option',
                   array('value'=>$value), CHtml::encode($name),true);
        }
    }
    public function actionLoadconstituencies()
        { 
        $model = new Studentsubjects();
            $countyid = $_POST['id'];
            $data= Electives::model()->findAll('id=:id',array(':id'=> $countyid));

            $data=CHtml::listData($data,'id','name');
            
            foreach($data as $value=>$name)  
            {
                echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
            }
        }
        
        public function actionCreate1()
	{
		$model=new StudentSubjects();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StudentSubjects']))
		{
			$model->attributes=$_POST['StudentSubjects'];
			if($model->save())
			$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create1',array(
			'model'=>$model,
		));
	}
        public function actionLoadcities()
{
   $data=Electives::model()->findAll('elective_group_id=:region_id', 
   array(':region_id'=>(int) $_POST['id']));
 
   $data=CHtml::listData($data,'id','name');
 
   echo "<option value=''>Select City</option>";
   foreach($data as $value=>$name)
   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
}

        public function actionDistricts()
        {

             $electives = Electives::model()->findAll('elective_group_id=:id', array(':id' => (int) $_POST['Batches']['id']));
          
             $return = CHtml::listData($electives, 'elective_group_id', 'name');
             echo "<option value=''>Select City</option>";
            foreach ($return as $districtId => $name) {
            echo CHtml::tag('option', array('value' => $districtId), CHtml::encode($name), true);
            }
        }
         public function actionDeleterowelective()
	{

		$postRecord = StudentSubjects::model()->findByPk($_GET['sid']);
               
		$postRecord->delete();
//		 Yii::app()->user->setFlash('notification','Data Saved Successfully');
		$this->redirect(array('studentelectives','id'=>$_REQUEST['id']));
		
	}
        
         public function actionApprove() {
         //Add Security
        if(!empty($_GET['aid'])){
        $model = Applicants::model()->findByAttributes(array('id' => $_GET['aid']));
//        $change_status = $_GET['sid'];
        $model->saveAttributes(array('status' => 2));
        //$ap=Applicants::model()->findByAttributes(array('id'=>$_GET['aid'],'status'=>2));
        if($model->status==2)
        {
           $this->redirect(array('/students/students/create','aid'=>$_GET['aid'])); 
        }
        $this->redirect(array('/students/applicants/manage'));
        }else{
            //Message here
        $this->redirect(array('/students/applicants/manage'));
        }
    }

}
