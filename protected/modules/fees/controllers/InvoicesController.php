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
                'actions' => array('index', 'view', 'generate', 'manage', 'edit','managepdf','indexpdf','remove','Invoicepdf','Transactionpdf'),
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
        
                    $len=10;
                    $string = "";
                    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                    for($i=0;$i<$len;$i++)
                    $string.=substr($chars,rand(0,strlen($chars)),1);
                    
//                    $a=rand(00000000, 99999999);
//                    echo  $string;
//                    echo  $a;
//                    exit;
        // $this->render('generate');
        $feesCategoryId = $_GET['id'];
        $feesCategory = FinanceFeeCategories::model()->findByAttributes(array('id'=>$feesCategoryId));
       
        $feeparticulars = FinanceFeeParticulars::model()->findAll("finance_fee_category_id=:x", array(':x' => $feesCategoryId));
        //echo "<pre>";
        //print_r($feeparticulars);exit;
        $dataArray = array();
        $pd = array();
        $parttax = array();
          $studentCategoryId = array();
           $invoiceAmount =array();
           $courseId = array();
           $batchId = array();
           $accessType = array();
           $admission = array();
           $finance_fee_particular_id = array();
        foreach ($feeparticulars as $particular) {
            $particularId = $particular->id;
            $pd[] = $particular->amount;
            $tax = $particular->tax_id;
            $taxes = Taxes::model()->findByAttributes(array("id"=>$tax));
            $parttax[] = $taxes->value;
            $feeaccess = FinanceFeeParticularAccess::model()->findAll("finance_fee_particular_id=:x", array(':x' => $particularId));
            
          
            foreach ($feeaccess as $feeaccess_1) {
                $accessType[] = $feeaccess_1->access_type;
                $courseId[] = $feeaccess_1->course_id;
                $batchId[] = $feeaccess_1->batch_id;
                $studentCategoryId[] = $feeaccess_1->student_category_id;
                $invoiceAmount[]=$feeaccess_1->amount;
                $admission[] = $feeaccess_1->admission_numbers;
                $finance_fee_particular_id[] =  $feeaccess_1->finance_fee_particular_id;
//                $invoiceAmount = $feeaccess_1->amount;
//                $payableAmount = $feeaccess_1->amount;
        } 
        
//            
//        $subtotal = array_sum($invoiceAmount);
        
        
//        echo "<pre/>";
//            print_r($subtotal);
           
        
//            echo $pd;
        
        $dataArray[]= $invoiceAmount;
       
        }  
//        $dataArray[]= $invoiceAmount;
//        $admission = '96,97,98';
//        $classes=explode(",",$admission);
//         echo "<pre/>";
//            print_r($particularId);
//            print_r($dataArray);
//            
//            print_r($finance_fee_particular_id);
////            print_r($classes);
//         
//                
//                   
//                 
////            echo sizeof($accessType);
//            exit;  
//         echo "<pre/>";
//          print_r ($pd);
//       exit; 
//         echo "<pre/>";
//          print_r ($parttax);
          
         foreach($pd as $key=>$val){
            
            
            
            $pd[$key] = ($val /100);
        }
        
        foreach($parttax as $key=>$val){
            
            
            
            $parttax[$key] = ($val /100);
        }
        $mixed_array = array();
        
//                        foreach($dataArray as $key => $price){
//                    $mixed_array[] = array(
//                        'value' => $price,
//                        'discount' => $pd[$key]*$price,
//                        'tax' => $parttax[$key]*$price,
//                        'total' => ($price)-($pd[$key]*$price)+($parttax[$key]*$price)
//                    );
//
//                }
//
//            echo "<pre/>";
//                       print_r($mixed_array);
//                       exit;
                      
//                        $taxsum = array_column($mixed_array, 'tax');
//                       $sum = array_column($mixed_array, 'total');
//                        $total = array_sum($sum);
//           print_r($taxsum);
//               print_r($sum);          
//            print_r($total);
//             exit;
//         foreach($dataArray as $keys=>$value){
//          
//             $dataArray[$keys] = $value;
//           
//            
////            $pd[$key] = ($val /100)*($value);
//        }  
//         echo "<pre/>";
//            print_r($dataArray);
//        foreach($pd as $key=>$val){
//            
//            echo "<pre/>";
//            print_r($val);
//            
//            $pd[$key] = ($val /100)*($value);
//        }
//        
//            echo "<pre/>";
//            print_r($pd);
//            exit;
//            
//            $a= $pd[0]/100;
//            $b= $subtotal;
//            $d = $a*$b;
//            echo $a ;
            
//            $total = array_sum($dataArray);
//             echo "<pre/>";
//            print_r($subtotal);
//            echo "<pre/>";
//            print_r($total);
//          
//            
//            exit;
                //Using these 4 data fetch students list for whom invoice need to be generate
                        
//                foreach($accessType as $key=>$val){
//                   
//                    echo $val.'<br/>';
//                }
//            print_r($invoiceAmount);exit;
            foreach($studentCategoryId as $key=>$value)
            {
                $studentCategoryId[$key] = $value;
//                echo $studentCategoryId[$key];
            }
            
//                foreach($invoiceAmount as $key=>$value)
//                {
//                    $invoiceAmount[$key] = $value;
//                echo  $invoiceAmount[$key];
//            }
//            $a = array_column($value);
//            print_r($a);
          for($i = 0;$i < sizeof($accessType); $i++){
             
               
                 
          
         
              if($accessType[$i] == 1)
              {
//                    echo '<option value="">' . $accessType[$i] . '</option>';
//                    echo '<option value="">' . $studentCategoryId[$i] . '</option>';
//                    echo '<option value="">' . $batchId[$i] . '</option>';
//                    echo '<option value="">' . $courseId[$i] . '</option>';
         
//            exit;       
//            for($i = 0;$i < sizeof($studentCategoryId); $i++ ){
//                echo '<option value="">' . $studentCategoryId[$i].$invoiceAmount[$i] . '</option>';
//            }
//            exit;
                if ($studentCategoryId[$i] != NULL && $batchId[$i] != NULL && $courseId[$i] != NULL) {
                   // $students = Students::model()->findAll("batch_id=:x,student_category_id=:y", array(':x'=>$batchId,':y' => $studentCategoryId));
                     $students = Students::model()->findAll("student_category_id=:x AND course_id=:y AND batch_id=:z", array(':x' => $studentCategoryId[$i],':y' => $courseId[$i],':z' => $batchId[$i]));
//                     echo count($students);exit;
                    foreach ($students as $student) {
                        
                        $row = array("batch_id" => $batchId[$i],"fee_particular_id" => $finance_fee_particular_id[$i], "fee_access_id" => $feeaccess_1->id, "student_category_id" => $studentCategoryId[$i], "student_batch_id" => $batchId[$i], "student_id" => $student->id, "student_course_id" => $courseId[$i], "invoice_amount" => $invoiceAmount[$i], "amount_payable" => $total, "finance_fee_category_id" => $_REQUEST['id']);
                    $invoice = new FinanceFeeInvoices;
                     $a=rand(00000000, 99999999);
                    $invoice->invoice_id = $a;
                    $invoice->finance_fee_category_id = $row['finance_fee_category_id'];
                    $fee_particulars = FinanceFeeParticulars::model()->findByAttributes(array('id'=>$row['fee_particular_id'])); 
                    $tax_particular = Taxes::model()->findByAttributes(array('id'=>$fee_particulars->tax_id));
                    $tax = $tax_particular->value;
                    $discount = $fee_particulars->amount;
                    $discont_calc = $discount/100;
                    $tax_calc = $tax/100;
                    $discount_value = ($discont_calc)*($row['invoice_amount']);
                    $tax_value = ($tax_calc)*($row['invoice_amount']);
                    $total = ($row['invoice_amount'])-(($discount_value)+($tax_value));
                    $invoice->amount = $total;
                    $invoice->amount_payable = $total;
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
//                    $feesCategory->saveAttributes(array("is_invoice"=>1));
//                    Yii::app()->user->setFlash('success','Invoice Generated Successfully !');
//                    $this->redirect(array('/fees/invoices/manage', 'id' =>$_REQUEST['id']));
                    
                }
                elseif ($courseId[$i] != NULL && $batchId[$i] != NULL && $studentCategoryId[$i] == NULL) {
//                $b = Students::model()->findAllByAttributes(array('course_id'=>$courseId,'batch_id'=>$batchId));
                      $students = Students::model()->findAll("course_id=:y AND batch_id=:z", array(':y' => $courseId[$i],':z' => $batchId[$i]));
//                     $a = count($students);
//                      echo $studentCategoryId;
//                      echo $batchId;
//                      echo $a; exit;
                    foreach ($students as $student) {
                        
                        $row = array("batch_id" => $batchId[$i],"fee_particular_id" => $finance_fee_particular_id[$i], "fee_access_id" => $feeaccess_1->id, "student_category_id" => $studentCategoryId[$i], "student_batch_id" => $batchId[$i], "student_id" => $student->id, "student_course_id" => $courseId[$i], "invoice_amount" => $invoiceAmount[$i], "amount_payable" => $total, "finance_fee_category_id" => $_REQUEST['id']);
                    $invoice = new FinanceFeeInvoices;
                     $a=rand(00000000, 99999999);
                    $invoice->invoice_id = $a;
                    $invoice->finance_fee_category_id = $row['finance_fee_category_id'];
                     $fee_particulars = FinanceFeeParticulars::model()->findByAttributes(array('id'=>$row['fee_particular_id'])); 
                    $tax_particular = Taxes::model()->findByAttributes(array('id'=>$fee_particulars->tax_id));
                    $tax = $tax_particular->value;
                    $discount = $fee_particulars->amount;
                    $discont_calc = $discount/100;
                    $tax_calc = $tax/100;
                    $discount_value = ($discont_calc)*($row['invoice_amount']);
                    $tax_value = ($tax_calc)*($row['invoice_amount']);
                    $total = ($row['invoice_amount'])-(($discount_value)+($tax_value));
                    $invoice->amount = $total;
                    $invoice->amount_payable = $total;
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
                  
//                    $feesCategory->saveAttributes(array("is_invoice"=>1));
//                    Yii::app()->user->setFlash('success','Invoice Generated Successfully !');
//                    $this->redirect(array('/fees/invoices/manage', 'id' =>$_REQUEST['id']));
                }
                elseif ($courseId[$i] != NULL && $batchId[$i] == NULL && $studentCategoryId[$i] == NULL) {
//                $b = Students::model()->findAllByAttributes(array('course_id'=>$courseId,'batch_id'=>$batchId));
                      $students = Students::model()->findAll("course_id=:y ", array(':y' => $courseId[$i]));
//                     $a = count($students);
//                      echo $studentCategoryId;
//                      echo $batchId;
//                      echo $a; exit;
                    foreach ($students as $student) {
                        
                        $row = array("batch_id" => $batchId[$i],"fee_particular_id" => $finance_fee_particular_id[$i], "fee_access_id" => $feeaccess_1->id, "student_category_id" => $studentCategoryId[$i], "student_batch_id" => $batchId[$i], "student_id" => $student->id, "student_course_id" => $courseId[$i], "invoice_amount" => $invoiceAmount[$i], "amount_payable" => $total, "finance_fee_category_id" => $_REQUEST['id']);
                    $invoice = new FinanceFeeInvoices;
                     $a=rand(00000000, 99999999);
                    $invoice->invoice_id = $a;
                    $invoice->finance_fee_category_id = $row['finance_fee_category_id'];
                      $fee_particulars = FinanceFeeParticulars::model()->findByAttributes(array('id'=>$row['fee_particular_id'])); 
                    $tax_particular = Taxes::model()->findByAttributes(array('id'=>$fee_particulars->tax_id));
                    $tax = $tax_particular->value;
                    $discount = $fee_particulars->amount;
                    $discont_calc = $discount/100;
                    $tax_calc = $tax/100;
                    $discount_value = ($discont_calc)*($row['invoice_amount']);
                    $tax_value = ($tax_calc)*($row['invoice_amount']);
                    $total = ($row['invoice_amount'])-(($discount_value)+($tax_value));
                    $invoice->amount = $total;
                    $invoice->amount_payable = $total;
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
//                    $feesCategory->saveAttributes(array("is_invoice"=>1));
//                    Yii::app()->user->setFlash('success','Invoice Generated Successfully !');
//                    $this->redirect(array('/fees/invoices/manage', 'id' =>$_REQUEST['id']));
                }
                
                 elseif ($courseId[$i] == NULL && $batchId[$i] == NULL && $studentCategoryId[$i] != NULL) {
//                $b = Students::model()->findAllByAttributes(array('course_id'=>$courseId,'batch_id'=>$batchId));
                      $students = Students::model()->findAll("student_category_id=:y ", array(':y' => $studentCategoryId[$i]));
//                     $a = count($students);
//                      echo $studentCategoryId;
//                      echo $batchId;
//                      echo $a; exit;
                    foreach ($students as $student) {
                        
                        $row = array("batch_id" => $batchId[$i],"fee_particular_id" => $finance_fee_particular_id[$i], "fee_access_id" => $feeaccess_1->id, "student_category_id" => $studentCategoryId[$i], "student_batch_id" => $batchId[$i], "student_id" => $student->id, "student_course_id" => $courseId[$i], "invoice_amount" => $invoiceAmount[$i], "amount_payable" => $total, "finance_fee_category_id" => $_REQUEST['id']);
                    $invoice = new FinanceFeeInvoices;
                     $a=rand(00000000, 99999999);
                    $invoice->invoice_id = $a;
                    $invoice->finance_fee_category_id = $row['finance_fee_category_id'];
                    $fee_particulars = FinanceFeeParticulars::model()->findByAttributes(array('id'=>$row['fee_particular_id'])); 
                    $tax_particular = Taxes::model()->findByAttributes(array('id'=>$fee_particulars->tax_id));
                    $tax = $tax_particular->value;
                    $discount = $fee_particulars->amount;
                    $discont_calc = $discount/100;
                    $tax_calc = $tax/100;
                    $discount_value = ($discont_calc)*($row['invoice_amount']);
                    $tax_value = ($tax_calc)*($row['invoice_amount']);
                    $total = ($row['invoice_amount'])-(($discount_value)+($tax_value));
                    $invoice->amount = $total;
                    $invoice->amount_payable = $total;
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
//                    $feesCategory->saveAttributes(array("is_invoice"=>1));
//                    Yii::app()->user->setFlash('success','Invoice Generated Successfully !');
//                    $this->redirect(array('/fees/invoices/manage', 'id' =>$_REQUEST['id']));
                }
                
                  elseif ($courseId[$i] != NULL && $batchId[$i] == NULL && $studentCategoryId[$i] != NULL) {
//                $b = Students::model()->findAllByAttributes(array('course_id'=>$courseId,'batch_id'=>$batchId));
                      $students = Students::model()->findAll("student_category_id=:y AND course_id=:z ", array(':y' => $studentCategoryId[$i],':z' => $courseId[$i]));
//                     $a = count($students);
//                      echo $studentCategoryId;
//                      echo $batchId;
//                      echo $a; exit;
                    foreach ($students as $student) {
                        
                        $row = array("batch_id" => $batchId[$i],"fee_particular_id" => $finance_fee_particular_id[$i], "fee_access_id" => $feeaccess_1->id, "student_category_id" => $studentCategoryId[$i], "student_batch_id" => $batchId[$i], "student_id" => $student->id, "student_course_id" => $courseId[$i], "invoice_amount" => $invoiceAmount[$i], "amount_payable" => $total, "finance_fee_category_id" => $_REQUEST['id']);
                    $invoice = new FinanceFeeInvoices;
                     $a=rand(00000000, 99999999);
                    $invoice->invoice_id = $a;
                    $invoice->finance_fee_category_id = $row['finance_fee_category_id'];
                     $fee_particulars = FinanceFeeParticulars::model()->findByAttributes(array('id'=>$row['fee_particular_id'])); 
                    $tax_particular = Taxes::model()->findByAttributes(array('id'=>$fee_particulars->tax_id));
                    $tax = $tax_particular->value;
                    $discount = $fee_particulars->amount;
                    $discont_calc = $discount/100;
                    $tax_calc = $tax/100;
                    $discount_value = ($discont_calc)*($row['invoice_amount']);
                    $tax_value = ($tax_calc)*($row['invoice_amount']);
                    $total = ($row['invoice_amount'])-(($discount_value)+($tax_value));
                    $invoice->amount = $total;
                    $invoice->amount_payable = $total;
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
//                    $feesCategory->saveAttributes(array("is_invoice"=>1));
//                    Yii::app()->user->setFlash('success','Invoice Generated Successfully !');
//                    $this->redirect(array('/fees/invoices/manage', 'id' =>$_REQUEST['id']));
                }
                
                
                 elseif ($courseId[$i] == NULL && $batchId[$i] == NULL && $studentCategoryId[$i] == NULL) {
//                $b = Students::model()->findAllByAttributes(array('course_id'=>$courseId,'batch_id'=>$batchId));
                      $students = Students::model()->findAll("is_active=:y AND is_deleted=:z ", array(':y' => 1,':z' => 0));
//                     $a = count($students);
//                      echo $studentCategoryId;
//                      echo $batchId;
//                      echo $a; exit;
                    foreach ($students as $student) {
                        
                        $row = array("batch_id" => $batchId[$i],"fee_particular_id" => $finance_fee_particular_id[$i], "fee_access_id" => $feeaccess_1->id, "student_category_id" => $studentCategoryId[$i], "student_batch_id" => $batchId[$i], "student_id" => $student->id, "student_course_id" => $courseId[$i], "invoice_amount" => $invoiceAmount[$i], "amount_payable" => $total, "finance_fee_category_id" => $_REQUEST['id']);
                    $invoice = new FinanceFeeInvoices;
                     $a=rand(00000000, 99999999);
                    $invoice->invoice_id = $a;
                    $invoice->finance_fee_category_id = $row['finance_fee_category_id'];
                     $fee_particulars = FinanceFeeParticulars::model()->findByAttributes(array('id'=>$row['fee_particular_id'])); 
                    $tax_particular = Taxes::model()->findByAttributes(array('id'=>$fee_particulars->tax_id));
                    $tax = $tax_particular->value;
                    $discount = $fee_particulars->amount;
                    $discont_calc = $discount/100;
                    $tax_calc = $tax/100;
                    $discount_value = ($discont_calc)*($row['invoice_amount']);
                    $tax_value = ($tax_calc)*($row['invoice_amount']);
                    $total = ($row['invoice_amount'])-(($discount_value)+($tax_value));
                    $invoice->amount = $total;
                    $invoice->amount_payable = $total;
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
//                    $feesCategory->saveAttributes(array("is_invoice"=>1));
//                    Yii::app()->user->setFlash('success','Invoice Generated Successfully !');
//                    $this->redirect(array('/fees/invoices/manage', 'id' =>$_REQUEST['id']));
                }
                
                
                else {
                    $row = array("batch_id" =>0,"fee_particular_id" => $particularId, "fee_access_id" => $feeaccess_1->id, "student_category_id" => $feeaccess_1->student_category_id, "student_batch_id" => $batchId, "student_id" => 0, "student_course_id" => $courseId, "invoice_amount" => $invoiceAmount);
            }
             // }
              }
              elseif($accessType[$i] == 2){
                 
               
//                  foreach($admission as $key=>$values ){ 
                    
//                    echo  $admission[$key] = $values;
                    $adm=explode(",",$admission[$i]); 
                    
                    for($j = 0; $j < sizeof($adm); $j++){
                     
                           
                           
                    if ($adm[$j] != NULL) {
                    
                    $students = Students::model()->findAll("is_active=:y AND is_deleted=:z AND admission_no=:x", array(':y' => 1,':z' => 0, ':x'=>$adm[$j]));
                    
                    foreach ($students as $student) {
                      
                    $row = array("student_id" => $student->id, "invoice_amount" => $invoiceAmount[$i],"fee_particular_id" => $finance_fee_particular_id[$i], "amount_payable" => $total, "finance_fee_category_id" => $_REQUEST['id']);
                    $invoice = new FinanceFeeInvoices;
                    $a=rand(00000000, 99999999);
                    $invoice->invoice_id = $a;
                    $invoice->finance_fee_category_id = $row['finance_fee_category_id'];
                    $fee_particulars = FinanceFeeParticulars::model()->findByAttributes(array('id'=>$row['fee_particular_id'])); 
                    $tax_particular = Taxes::model()->findByAttributes(array('id'=>$fee_particulars->tax_id));
                    $tax = $tax_particular->value;
                    $discount = $fee_particulars->amount;
                    $discont_calc = $discount/100;
                    $tax_calc = $tax/100;
                    $discount_value = ($discont_calc)*($row['invoice_amount']);
                    $tax_value = ($tax_calc)*($row['invoice_amount']);
                    $total = ($row['invoice_amount'])-(($discount_value)+($tax_value));
                    $invoice->amount = $total;
                    $invoice->amount_payable = $total;
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
                  }
                           
                    }
//                  echo sizeof($adm);
                      
//                  }
                  
                    
                
              }
          }
          
//              exit;
//                }}
                //Inser row data into invoice table;
                
                
                $dataArray[] = $row;
                //echo $feeaccess->id;
                //get student ids from student category id , if all get all students by checking batch and course
                //Later we have to check for addmission number also
                //Access data w.r.t particulaty
                //Generate invoice id
                //save into invoice table
                //redirect to manage invoice page
            
            
//        print_r($dataArray);
//        exit;
        //Get particulars 
       
         $this->redirect(array('/fees/invoices/manage', 'id' =>$_REQUEST['id']));
        $this->render('generate');
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
                $model->description = $transaction['description'];
                 $invoice = FinanceFeeInvoices::model()->findByAttributes(array('id'=>$_REQUEST['id']));
                 $model->invoice_id = $invoice->invoice_id;
                  $b=rand(0000000, 9999999);
                 $model->transaction_id = $b;
                
				if($file=CUploadedFile::getInstance($model,'file_data'))
					 {
					$model->file_name=$file->name;
                                        $model->file_content_type=$file->type;
					$model->file_size=$file->size;
					$model->file_data=file_get_contents($file->tempName);
					  }
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
                     $invoice->saveAttributes(array('last_payment_date'=>$model->date));
                      if($invoice->amount_payable == 0.00){
                      $invoice->saveAttributes(array('status'=>1));
                      } 
                     Yii::app()->user->setFlash('success','Successfully Completed Transaction !');
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
    
    public function actionInvoicepdf()
    {
        
	 $invoice = FinanceFeeInvoices::model()->findAll("id=:x",array(':x'=>$_REQUEST['id']));
		 $invoice = 'invoice.pdf';	
        $html2pdf = Yii::app()->ePdf->HTML2PDF();
		$html2pdf->WriteHTML($this->renderPartial('print_2',array(),true));
                ob_end_clean();
        $html2pdf->Output( $invoice);
    }
    
     public function actionTransactionpdf()
    {
        
	 $invoice = FinanceFeeInvoices::model()->findAll("id=:x",array(':x'=>$_REQUEST['id']));
		 $invoice = 'transaction.pdf';	
        $html2pdf = Yii::app()->ePdf->HTML2PDF();
		$html2pdf->WriteHTML($this->renderPartial('print_3',array(),true));
                ob_end_clean();
        $html2pdf->Output( $invoice);
    }
}


