<?php
class DashboardController extends RController
{
     
    
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
				'actions'=>array('index'),
				'users'=>array('*'),
			),
		);
	}
        
	public function actionIndex()
	{
         
		$criteria = new CDbCriteria;
		//$criteria->compare('is_deleted',0);
		$total = ExamGroups::model()->count($criteria);
		$criteria->order = 'id DESC';
		$criteria->limit = '10';
		$posts = ExamGroups::model()->findAll($criteria);
		
		
		$this->render('index',array(
			'total'=>$total,'list'=>$posts
		));
	}
        
}
?>