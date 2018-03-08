<?php

class TeacherSubjectAttendanceController extends RController
{
    
    
    public $layout='//layouts/column2';
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}
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
	
        public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','pdf','create','createswa','returnForm'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        
        
	public function actionIndex()
	{
		$this->render('index');
	}
      
        public function actionCreate()
	{
		$model=new EmployeesSubjects;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmployeesSubjects']))
		{
			$model->attributes=$_POST['EmployeesSubjects'];
			if($model->save())
			$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
        
         public function actionPdf()
        {
		
		$batch_name = Batches::model()->findByAttributes(array('id'=>$_REQUEST['id']));
		$batch_name = $batch_name->name.' Student Attendance.pdf';
        # HTML2PDF has very similar syntax
        $html2pdf = Yii::app()->ePdf->HTML2PDF();

        $html2pdf->WriteHTML($this->renderPartial('attentancepdf', array(), true));
         ob_end_clean();
        $html2pdf->Output($batch_name);
	}
        
//        
//       public function actionAddnew()
//        {
//                $model=new StudentAttentance;
//        // Ajax Validation enabled
//        $this->performAjaxValidation($model);
//        // Flag to know if we will render the form or try to add 
//        // new jon.
//                $flag=true;
//        if(isset($_POST['StudentAttentance']))
//        {       $flag=false;
//            $model->attributes=$_POST['StudentAttentance'];
// 
//            if($model->save()) {
//                //Return an <option> and select it
//                           // echo CHtml::tag('option',array ( 'value'=>$model->jid,'selected'=>true),CHtml::encode($model->jdescr),true);
//						   //echo CHtml::tag('button', array('type'=>'submit'), '<div><div>Button</div></div>');
//						   //echo CHtml::tag('td',array ('id'=>'jobDialog123'.$_GET['day'].$_GET['emp_id']),CHtml::encode('Yes'),true);
//						  // echo "sssssssssssss";
//						//  exit;
//  								
//                        }
//                }
//                if($flag) {
//                    Yii::app()->clientScript->scriptMap['jquery.js'] = false;
//                    $this->renderPartial('create',array('model'=>$model,'day'=>$_GET['day'],'month'=>$_GET['month'],'year'=>$_GET['year'],'emp_id'=>$_GET['emp_id']),false,true);
//                }
//        }
//        
        		
     public function actionEditLeave()
	 {
        $model=StudentAttentance::model()->findByAttributes(array('id'=>$_REQUEST['id']));
        // Ajax Validation enabled
        $this->performAjaxValidation($model);
        // Flag to know if we will render the form or try to add 
        // new jon.
        $flag=true;
        if(isset($_POST['StudentAttentance']))
        {      
	    	$flag=false;
            $model->attributes=$_POST['StudentAttentance'];
            if($model->save()) 
			{
            	echo CJSON::encode(array(
                        'status'=>'success',
                        ));
                 exit;    
            }
			else
			{
				echo CJSON::encode(array(
                        'status'=>'error',
                        ));
                 exit;    
			}
			
        }
	  // var_dump($model->geterrors());
		if($flag) {
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$this->renderPartial('update',array('model'=>$model,'day'=>$_GET['day'],'month'=>$_GET['month'],'year'=>$_GET['year'],'emp_id'=>$_GET['emp_id']),false,true);
		}
     }
        
     public function actionDeleteLeave()
	{
		 $flag=true;
		$model=StudentAttentance::model()->DeleteAllByAttributes(array('id'=>$_REQUEST['id']));
		
		 if($flag) {
                   
				    Yii::app()->clientScript->scriptMap['jquery.js'] = false;
					$this->renderPartial('update',array('model'=>$model,'day'=>$_GET['day'],'month'=>$_GET['month'],'year'=>$_GET['year'],'emp_id'=>$_GET['emp_id']),false,true);
					
	}			  
        }	 
     
     
     
        protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-attentance-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionAddnew() {
        $model=new EmployeeSubjectwiseAttendances;
        // Ajax Validation enabled
        $this->performAjaxValidation($model);
        // Flag to know if we will render the form or try to add 
        // new jon.
        $flag=true;
        if(isset($_POST['EmployeeSubjectwiseAttendances']))
        {       
			$flag=false;
            $model->attributes=$_POST['EmployeeSubjectwiseAttendances'];
//            print_r($_POST['EmployeeSubjectwiseAttendances']);
//            exit;
            $model->class_timing_id = $_REQUEST['c_t_id'];
//            echo $_POST['EmployeeSubjectwiseAttendances'];
//            exit;
            if($model->save()) 
			{
                echo CJSON::encode(array(
                        'status'=>'success',
                        ));
                 exit;    
  								
            }
			else
			{
				echo CJSON::encode(array(
                        'status'=>'error',
                        ));
                 exit;    
			}
         }
		if($flag) {
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$this->renderPartial('createswa',array('model'=>$model,'day'=>$_GET['day'],'month'=>$_GET['month'],'year'=>$_GET['year'],'emp_id'=>$_GET['emp_id']),false,true);
		}
    }
    
    public function actionCreateswa()
	{
		$model=new EmployeeSubjectwiseAttendances;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmployeeSubjectwiseAttendances']))
		{
			$model->attributes=$_POST['EmployeeSubjectwiseAttendances'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('createswa',array(
			'model'=>$model,
		));
	}
        
          public function actionReturnForm(){

              //Figure out if we are updating a Model or creating a new one.
             if(isset($_POST['update_id']))$model= $this->loadModel($_POST['update_id']);
			 else $model=new EmployeeSubjectwiseAttendances;
                        
            //  Comment out the following line if you want to perform ajax validation instead of client validation.
            //  You should also set  'enableAjaxValidation'=>true and
            //  comment  'enableClientValidation'=>true  in CActiveForm instantiation ( _ajax_form  file).


             //$this->performAjaxValidation($model);

               //don't reload these scripts or they will mess up the page
                //yiiactiveform.js still needs to be loaded that's why we don't use
                // Yii::app()->clientScript->scriptMap['*.js'] = false;
                $cs=Yii::app()->clientScript;
                $cs->scriptMap=array(
                                                 'jquery.min.js'=>false,
                                                 'jquery.js'=>false,
                                                 'jquery.fancybox-1.3.4.js'=>false,
                                                 'jquery.fancybox.js'=>false,
                                                 'jquery-ui-1.8.12.custom.min.js'=>false,
                                                 'json2.js'=>false,
                                                 'jquery.form.js'=>false,
                                                 'form_ajax_binding.js'=>false
        );

		if(isset($_POST['batch_id']) and $_POST['batch_id']==0)
		{
                    $this->renderPartial('_ajax_form', array('model'=>$model), false, true);
		}
		else
		{
        	$this->renderPartial('_ajax_form', array('model'=>$model), false, true);
                
		}
                
      }
      
       public function actionAjax_Create(){

               if(isset($_POST['EmployeeSubjectwiseAttendances']))
		{
                       $model=new EmployeeSubjectwiseAttendances;
					   
                      //set the submitted values
//                        $model->employee_id = $_POST['EmployeeSubjectwiseAttendances']['employee_id'];
                        $model->attributes=$_POST['EmployeeSubjectwiseAttendances'];
                      
                      
//                       $batch  = Batches::model()->findByAttributes(array('id'=>$model->batch_id));
//                       $model->course_id = $batch->course_id;
//                       $model->name = $_POST['Subjects']['name'];
//                       $model->code = $_POST['Subjects']['code'];
//                       $model->no_exams = $_POST['Subjects']['no_exams'];
//                       $model->max_weekly_classes = $_POST['Subjects']['max_weekly_classes'];
//                       $model->elective_group_id = $_POST['Subjects']['elective_group_id'];
//                       $model->is_deleted = $_POST['Subjects']['is_deleted'];
//                       $model->created_at = date('Y-m-d H:i:s');
//                       $model->updated_at = date('Y-m-d H:i:s');
//						
						/*$data=SubjectName::model()->findByAttributes(array('id'=>$model->name));
						if($data!=NULL)
						{
							$model->name=$data->name;
							$model->code=$data->code;
							
						}*/
                       //return the JSON result to provide feedback.
			            if($model->save(false)){
                                echo json_encode(array('success'=>true,'id'=>$model->primaryKey) );
                                exit;
                        } else
                        {
                            echo json_encode(array('success'=>false));
                            exit;
                        }
		}
  }
}

