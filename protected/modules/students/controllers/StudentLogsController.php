<?php

class StudentLogsController extends RController
{

    public function actionDelete($id)
	{
		
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();
                        Yii::app()->user->setFlash('success','Log Deleted successfully');
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax'])){
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('students/log','id'=>$_REQUEST['student_id']));
		}
		else
		{	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
        }
        
    public function loadModel($id)
	{
		$model= StudentLogs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
    public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StudentLogs']))
		{
			$model->attributes=$_POST['StudentLogs'];
			if($model->save())
                            Yii::app()->user->setFlash('success','Log Updated Successfully');
				$this->redirect(array('students/log','id'=>$_REQUEST['student_id']));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

       
}
?>