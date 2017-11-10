<?php

class SubscriptionController extends RController {
    
 /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'rights', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index'),
                'users' => array('*'),
            ),
           );
    }


public function actionIndex() {
        
        $model = new FinanceFeeSubscription;
        
        if(isset($_POST['FinanceFeeSubscription']))
            {
            
                  //if($ay!=$_POST['AcademicYears']->name){
            //  echo"<pre>"; print_r($_POST);exit;
              $model->attributes=$_POST['FinanceFeeSubscription'];
              if ($model->start_date)
                $model->start_date = date('Y-m-d', strtotime($model->start_date));
              if ($model->end_date)
                $model->end_date = date('Y-m-d', strtotime($model->end_date));
                if ($model->due_date )
                $model->due_date = date('Y-m-d', strtotime($model->due_date));
                $model->fee_category_id = $_REQUEST['id'];
                 $model->created_at = date('Y-m-d H:i:s');
                 $model->updated_at = date('Y-m-d H:i:s');
                   
              if($model->save()){
                  $this->redirect(array('/fees/feesdashboard'));
//                  echo "<pre/>";
//                    print_r($model->save());exit;
              }
               
          }
        
        $this->render('index', array('model'=>$model));
    }
}