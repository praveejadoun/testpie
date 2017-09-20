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
				'actions'=>array('index'),
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}
}