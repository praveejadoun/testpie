<?php

class StudentAttentanceController extends RController
{
    
    
    public $layout='//layouts/column2';
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}
	
        public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','monthlyattendance','pdf'),
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
        public function actionMonthlyattendance()
	{
		$this->render('monthlyattendance');
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
        
        
       public function actionAddnew()
        {
                $model=new StudentAttentance;
        // Ajax Validation enabled
        $this->performAjaxValidation($model);
        // Flag to know if we will render the form or try to add 
        // new jon.
                $flag=true;
        if(isset($_POST['StudentAttentance']))
        {       $flag=false;
            $model->attributes=$_POST['StudentAttentance'];
 
            if($model->save()) {
                //Return an <option> and select it
                           // echo CHtml::tag('option',array ( 'value'=>$model->jid,'selected'=>true),CHtml::encode($model->jdescr),true);
						   //echo CHtml::tag('button', array('type'=>'submit'), '<div><div>Button</div></div>');
						   //echo CHtml::tag('td',array ('id'=>'jobDialog123'.$_GET['day'].$_GET['emp_id']),CHtml::encode('Yes'),true);
						  // echo "sssssssssssss";
						//  exit;
  								
                        }
                }
                if($flag) {
                    Yii::app()->clientScript->scriptMap['jquery.js'] = false;
                    $this->renderPartial('create',array('model'=>$model,'day'=>$_GET['day'],'month'=>$_GET['month'],'year'=>$_GET['year'],'emp_id'=>$_GET['emp_id']),false,true);
                }
        }
        
        		
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
}

