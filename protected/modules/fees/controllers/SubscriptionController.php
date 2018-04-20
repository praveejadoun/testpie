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
                'actions' => array('index', 'type', ' performAjaxValidation'),
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {

        $model = new FinanceFeeSubscription;
//         $this->performAjaxValidation($model);
        // echo"<pre>";
//           $list = $_POST['FinanceFeeSubscription'];
//            print_r($_POST['FinanceFeeSubscription']);
        //   print_r($_POST);
        // exit;
        if (isset($_POST['FinanceFeeSubscription'])) {

            //if($ay!=$_POST['AcademicYears']->name){
            $list = $_POST['FinanceFeeSubscription'];
            if ($list['start_date'] == "" && $list['end_date'] == "") {
                Yii::app()->user->setFlash('error', 'Please enter start date and end date !');
                $this->redirect(array('subscription/', 'id' => $_GET['id']));
            } elseif ($list['start_date'] == "") {
                Yii::app()->user->setFlash('error', 'Please enter start date!');
                $this->redirect(array('subscription/', 'id' => $_GET['id']));
            } elseif ($list['end_date'] == "") {
                Yii::app()->user->setFlash('error', 'Please enter end date !');
                $this->redirect(array('subscription/', 'id' => $_GET['id']));
            } elseif (date($list['end_date']) < date($list['start_date'])) {
                Yii::app()->user->setFlash('error', 'end date should be greater than start date !');
                $this->redirect(array('subscription/', 'id' => $_GET['id']));
            }
            $ay = AcademicYears::model()->findByAttributes(array('status' => '0'));
            $start_date = date($ay->start_date);
            $end_date = date($ay->end_date);
            $selected_start_date = date($list['start_date']);
            $selected_end_date = date($list['end_date']);
            if ($selected_start_date < $start_date && $selected_end_date < $end_date) {
                Yii::app()->user->setFlash('error', 'start date should be in between current academic year !');
                $this->redirect(array('subscription/', 'id' => $_GET['id']));
            }
            if ($list['subscription_type'] == 1) {
                $model = new FinanceFeeSubscription;
                // $model->attributes =$list;
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
            } elseif ($list['subscription_type'] == 2) {

                if ($list['recurring_interval'] == 3) {

                    $half_yearly_due_date = $list['half_yearly_due_date'];

                    foreach ($half_yearly_due_date as $key => $half_yearly_due_date_1) {
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
                } elseif ($list['recurring_interval'] == 4) {

                    $quaterly_due_date = $list['quaterly_due_date'];

                    foreach ($quaterly_due_date as $key => $quaterly_due_date_1) {
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
                } elseif ($list['recurring_interval'] == 5) {
//                    echo"<pre/>";
//                    print_r($_POST);
//                    // echo "vanam";
//                    exit;
                    $input_date = $_POST['inputDate'];
                    foreach ($input_date as $key => $input_date_1) {
                        // for($i=1;$i<4;$i++){
                        //echo    $_POST["inputDate$i"].'<br/>';
                        $model = new FinanceFeeSubscription;
                        $model->start_date = date('Y-m-d', strtotime($list['start_date']));
                        $model->end_date = date('Y-m-d', strtotime($list['end_date']));
                        $model->is_divide_fee_by_nos = $list['is_divide_fee_by_nos'];
                        $model->subscription_type = $list['subscription_type'];
                        $model->recurring_interval = $list['recurring_interval'];
                        $model->due_date = date('Y-m-d', strtotime($input_date_1));
                        $model->fee_category_id = $_REQUEST['id'];
                        $model->is_deleted = $list['is_deleted'];
                        $model->created_at = $list['created_at'];
                        $model->updated_at = $list['updated_at'];
                        if ($input_date_1 != "")
                            $model->save();
                    }
                }
                //echo $_POST['inputDate'];
            }




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
        if ($id == '2') {
            echo "sunil";
        } else {
            echo "vanam";
        }
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'subscription-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
