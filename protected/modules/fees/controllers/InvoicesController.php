<?php

class InvoicesController extends RController {

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
                'actions' => array('index', 'view', 'generate', 'manage', 'edit','managepdf','indexpdf','remove'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionGenerate() {
        
   
        // $this->render('generate');
        $feesCategoryId = $_GET['id'];

        $feeparticulars = FinanceFeeParticulars::model()->findAll("finance_fee_category_id=:x", array(':x' => $feesCategoryId));
        echo "<pre>";
        //print_r($feeparticulars);exit;
        $dataArray = array();
        foreach ($feeparticulars as $particular) {
            $particularId = $particular->id;
            $feeaccess = FinanceFeeParticularAccess::model()->findAll("finance_fee_particular_id=:x", array(':x' => $particularId));
            foreach ($feeaccess as $feeaccess_1) {
                $accessType = $feeaccess_1->access_type;
                $courseId = $feeaccess_1->course_id;
                $batchId = $feeaccess_1->batch_id;
                $studentCategoryId = $feeaccess_1->student_category_id;
                $invoiceAmount = $feeaccess_1->amount;
                $payableAmount = $feeaccess_1->amount;

                //Using these 4 data fetch students list for whom invoice need to be generate

                if ($studentCategoryId != "" && $batchId != "") {
                   // $students = Students::model()->findAll("batch_id=:x,student_category_id=:y", array(':x'=>$batchId,':y' => $studentCategoryId));
                     $students = Students::model()->findAll("student_category_id=:x", array(':x' => $studentCategoryId));

                    foreach ($students as $student) {
                        
                        $row = array("batch_id" => $batchId,"fee_particular_id" => $particularId, "fee_access_id" => $feeaccess_1->id, "student_category_id" => $feeaccess_1->student_category_id, "student_batch_id" => $batchId, "student_id" => $student->id, "student_course_id" => $courseId, "invoice_amount" => $invoiceAmount, "amount_payable" => $payableAmount, "finance_fee_category_id" => $_REQUEST['id']);
                    $invoice = new FinanceFeeInvoices;
                    $invoice->invoice_id = 85;
                    $invoice->finance_fee_category_id = $row['finance_fee_category_id'];
                    $invoice->amount = $row['invoice_amount'];
                    $invoice->amount_payable = $row['amount_payable'];
                    $invoice->student_id = $row['student_id'];
                    $invoice->status = 0;
                    $subscription = FinanceFeeSubscription::model()->findAll("fee_category_id=:x",array(':x'=> $_REQUEST['id']));  
                    foreach($subscription as $subscription_1){
                        $invoice->due_date = $subscription_1->due_date;
                    }
                    
                    $invoice->is_deleted = 0;
                    $invoice->created_at = date('Y-m-d H:i:s');
                    $invoice->updated_at = date('Y-m-d H:i:s');


                    $invoice->save();
                   
                        
                    }
                    $this->redirect(array('/fees/invoices/manage', 'id' =>$_REQUEST['id']));
                    
                } else {
                    $row = array("batch_id" =>0,"fee_particular_id" => $particularId, "fee_access_id" => $feeaccess_1->id, "student_category_id" => $feeaccess_1->student_category_id, "student_batch_id" => $batchId, "student_id" => 0, "student_course_id" => $courseId, "invoice_amount" => $invoiceAmount);
                }
                //Inser row data into invoice table;
                
                
                $dataArray[] = $row;
                //echo $feeaccess->id;
                //get student ids from student category id , if all get all students by checking batch and course
                //Later we have to check for addmission number also
                //Access data w.r.t particulaty
                //Generate invoice id
                //save into invoice table
                //redirect to manage invoice page
            }
        }
        print_r($dataArray);
        exit;
        //Get particulars 
    }

    public function actionManage()
    {
         $criteria = new CDbCriteria;
                $criteria->compare('is_deleted', 0);
                 $criteria->compare('finance_fee_category_id', $_REQUEST['id']);
                $total = FinanceFeeInvoices::model()->count($criteria);
                $criteria->order = 'id DESC';
                $criteria->limit = '10';
                $pages = new CPagination($total);
                $pages->setPageSize(Yii::app()->params['listPerPage']);
                $pages->applyLimit($criteria);  // the trick is here!
                $posts = FinanceFeeInvoices::model()->findAll($criteria);


                $this->render('manage', array(
                    'total' => $total, 'list' => $posts,

                    'pages' => $pages,
                    'item_count' => $total,
                    'page_size' => Yii::app()->params['listPerPage'],
                ));
        
       
    }
    
    public function actionIndex()
    {
        $criteria = new CDbCriteria;
                $criteria->compare('is_deleted', 0);
                $total = FinanceFeeInvoices::model()->count($criteria);
                $criteria->order = 'id DESC';
                $criteria->limit = '10';
                $pages = new CPagination($total);
                $pages->setPageSize(Yii::app()->params['listPerPage']);
                $pages->applyLimit($criteria);  // the trick is here!
                $posts = FinanceFeeInvoices::model()->findAll($criteria);


                $this->render('index', array(
                    'total' => $total, 'list' => $posts,

                    'pages' => $pages,
                    'item_count' => $total,
                    'page_size' => Yii::app()->params['listPerPage'],
                ));
    }
    public function actionView()
    {
        $model = new FinanceFeeTransactions;
        if(!empty($_POST['FinanceFeeTransactions'])){
                $model->attributes = $_POST['FinanceFeeTransactions'];
                $transaction = $_POST['FinanceFeeTransactions'];
                 if ($model->date)
                $model->date = date('Y-m-d', strtotime($model->date));
                
                 $invoice = FinanceFeeInvoices::model()->findByAttributes(array('id'=>$_REQUEST['id']));
                 $model->invoice_id = $invoice->invoice_id;
                 $model->transaction_id = $transaction['transaction_id'];
                 $model->status = 1;
                 if($model->amount <= $invoice->amount_payable)
                    $model->amount = $transaction['amount'];
                 else{
                    Yii::app()->user->setFlash('error','Amount should be less than amount payable');
                     $this->redirect(array('view', 'id' => $_REQUEST['id']));
                 
                 }
                 if($model->save()){
                     $txamount = $model->amount;
                     $txaction = $invoice->amount_payable;
                     $amt = $txaction - $txamount;
                     $invoice->saveAttributes(array('amount_payable'=>$amt));
                      Yii::app()->user->setFlash('success','Successfully Completed Transaction !');
                      if($invoice->amount_payable == 0.00){
                      $invoice->saveAttributes(array('status'=>1));
                      } 
                     $this->redirect(array('view', 'id' => $_REQUEST['id']));
                     
                 }
                    
            }
      
            
            $this->render('view', array(
            'model' => $model));
    }
    
    public function actionEdit()
    {
        $this->render('edit');
    }
       
    public function actionManagepdf()
    {
        
	 $invoice = FinanceFeeInvoices::model()->findAll();
		 $invoice = 'invoice list.pdf';	
        $html2pdf = Yii::app()->ePdf->HTML2PDF();
		$html2pdf->WriteHTML($this->renderPartial('print',array(),true));
                ob_end_clean();
        $html2pdf->Output( $invoice);
    }
    
     public function actionIndexpdf()
    {
        
	 $invoice = FinanceFeeInvoices::model()->findAll();
		 $invoice = 'invoice list.pdf';	
        $html2pdf = Yii::app()->ePdf->HTML2PDF();
		$html2pdf->WriteHTML($this->renderPartial('print_1',array(),true));
                ob_end_clean();
        $html2pdf->Output( $invoice);
    }
    
    public function actionRemove()
    {
        $model = FinanceFeeTransactions::model()->findByAttributes(array('id' => $_REQUEST['id']));
        
        $invoic = FinanceFeeInvoices::model()->findByAttributes(array('invoice_id'=>$model->invoice_id));
        $amt = ($invoic->amount_payable)+($model->amount);
        $invoic->saveAttributes(array('amount_payable'=>$amt));
            if($invoic->amount_payable == 0.00)
            {
                $invoic->saveAttributes(array('status'=>1));
            } 
            else
            {
                $invoic->saveAttributes(array('status'=>'0'));
            }
        $model->saveAttributes(array('is_deleted' => '1'));
        $this->redirect(array('view', 'id' => $invoic->id));
        $this->render('remove');
    }
}


