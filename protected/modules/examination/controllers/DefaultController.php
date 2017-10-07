<?php

class DefaultController extends RController
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
				'actions'=>array('index','explorer_3'),
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
         public function actionExplorer_3()
	{
		if(Yii::app()->request->isAjaxRequest)
		 {
			 $this->renderPartial('explorer_3',array(),false,true);
		 }
	}
}