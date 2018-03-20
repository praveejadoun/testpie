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
                'actions' => array('index', 'type'),
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {

        $model = new FinanceFeeSubscription;

        if (isset($_POST['FinanceFeeSubscription'])) {

            //if($ay!=$_POST['AcademicYears']->name){
            $list = $_POST['FinanceFeeSubscription'];
            if($list['subscription_type'] == 1){
                $model = new FinanceFeeSubscription;
                 $model->start_date = date('Y-m-d', strtotime($list['start_date']));
               $model->end_date = date('Y-m-d', strtotime($list['end_date']));
               $model->is_divide_fee_by_nos = $list['is_divide_fee_by_nos'];
               $model->subscription_type = $list['subscription_type'];
               $model->recurring_interval = "";
               $model->due_date = date('Y-m-d', strtotime($list['one_time_due_date']));
               $model->fee_category_id = $_REQUEST['id'];
               $model->is_deleted = $list['is_deleted'];
               $model->created_at = $list['created_at'];
               $model->updated_at = $list['updated_at'];
               $model->save();
            }elseif($list['subscription_type'] == 2){
                
             if($list['recurring_interval'] == 3){
                 
                 $half_yearly_due_date = $list['half_yearly_due_date'];
                 
                 foreach($half_yearly_due_date as $key=>$half_yearly_due_date_1){
                     $model = new FinanceFeeSubscription;
                     $model->start_date = date('Y-m-d', strtotime($list['start_date']));
                     $model->end_date = date('Y-m-d', strtotime($list['end_date']));
                     $model->is_divide_fee_by_nos = $list['is_divide_fee_by_nos'];
                     $model->subscription_type = $list['subscription_type'];
                     $model->recurring_interval = $list['recurring_interval'];
                     $model->due_date = date('Y-m-d', strtotime($half_yearly_due_date_1));
                     $model->fee_category_id = $_REQUEST['id'];
                     $model->is_deleted = $list['is_deleted'];
                     $model->created_at = $list['created_at'];
                     $model->updated_at = $list['updated_at'];
                     $model->save();
                    
                 }
                 
                 
             }elseif ($list['recurring_interval'] == 4) {
                 
                    $quaterly_due_date = $list['quaterly_due_date'];
                 
                 foreach($quaterly_due_date as $key=>$quaterly_due_date_1){
                     $model = new FinanceFeeSubscription;
                     $model->start_date = date('Y-m-d', strtotime($list['start_date']));
                     $model->end_date = date('Y-m-d', strtotime($list['end_date']));
                     $model->is_divide_fee_by_nos = $list['is_divide_fee_by_nos'];
                     $model->subscription_type = $list['subscription_type'];
                     $model->recurring_interval = $list['recurring_interval'];
                     $model->due_date = date('Y-m-d', strtotime($quaterly_due_date_1));
                     $model->fee_category_id = $_REQUEST['id'];
                     $model->is_deleted = $list['is_deleted'];
                     $model->created_at = $list['created_at'];
                     $model->updated_at = $list['updated_at'];
                    $model->save();
                 }
                }
              
            }
                
//            echo"<pre>";
//            print_r($_POST['FinanceFeeSubscription']);
//            print_r($list['start_date']);
//            exit;
          
//            $model->attributes = $_POST['FinanceFeeSubscription'];
//            if ($model->start_date)
//                $model->start_date = date('Y-m-d', strtotime($model->start_date));
//            if ($model->end_date)
//                $model->end_date = date('Y-m-d', strtotime($model->end_date));
//            if ($model->due_date)
//                $model->due_date = date('Y-m-d', strtotime($model->due_date));
//            $model->fee_category_id = $_REQUEST['id'];
//            $model->created_at = date('Y-m-d H:i:s');
//            $model->updated_at = date('Y-m-d H:i:s');

            //if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Subscription Created Successfully !');
                $this->redirect(array('/fees/feesdashboard'));
//                  echo "<pre/>";
//                    print_r($model->save());exit;
           // }
        }

        $this->render('index', array('model' => $model));
    }

    public function actionType() {
      $id = $_REQUEST['id'];
        if($id == '2'){
            echo "sunil";
            
        } else {
            echo "vanam";
        }
    }

}
