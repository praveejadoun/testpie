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
				'actions'=>array('index'),
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
}

