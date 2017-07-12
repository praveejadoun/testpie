<?php

class AchievementsController extends RController
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
				'actions'=>array('index','view','Create2','update2','Manage','savesearch','DisplaySavedImage','pdf','Address','Contact','Addinfo','Remove'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','batch','add'),
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
		 
	      $model=new EmployeeAchievements;
              $model->attributes=$_POST['EmployeeAchievements'];
              $model =$model->findByAttributes(array('id'=>$_REQUEST['id']));
	       if(isset($_POST['EmployeeAchievements']))
                   
		{
               if($model->save())
               {
                   $form_data = $_POST['EmployeeAchievements'];
                                      
                                              $model->achievement_title = $form_data['achievement_title'];
                                              $model->achievement_document_name = $form_data['achievement_document_name'];
                                              $model->achievement_description = $form_data['achievement_description'];
                                              
                                             // $contact->ID=$id;
                                            //$model->name= $form_data['name'];
                                        $model->save();
               }
		$this->redirect('employees/employees/view',array(
			'model'=>$this->loadModel($_REQUEST['id']),
		));				
			
                }
	}
}
?>
