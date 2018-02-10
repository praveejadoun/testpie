<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top" width="75%">
        <div class="cont_right formWrapper">
            <?php $finance_invoices = FinanceFeeInvoices::model()->findByAttributes(array('id'=>$_REQUEST['id']));?>
            <h1>Invoice&nbsp;-&nbsp;#<?= $finance_invoices->invoice_id;?></h1>
              <div style="margin-top:20px; position:relative;">
                        <div class="clear"></div>
                        <div style="display: inline-block;margin-bottom: 14px;margin-top:0px; width: 100%;">
                            <div style="float:left;">
<!--                                <div class="box-one">
                                <div class="bttns_addstudent-n">   
                                    <ul>
                                        <li><?php // echo CHtml::link(Yii::t('employees', 'Add Student'), array('create'), array('class' => 'formbut-n')); ?></li>

                                        <li><a class="formbut-n" href="javascript:void(0)" id="delete_student">Delete Student</a></li>



                                    </ul>
                                </div>
                            </div>-->
                                <div class="ea_pdf" style="top:0px; right:6px;">
                                    <?php echo CHtml::link('<img src="images/pdf-but.png">', array('invoices/invoicepdf','id'=>$_REQUEST['id']), array('target' => '_blank')); ?>
                                </div>
                            </div> 

                        </div>
                    </div>
             <?php
                Yii::app()->clientScript->registerScript(
                        'myHideEffect', '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
                );
                ?>
                    <?php if(Yii::app()->user->hasFlash('error')):?>
                    <div class="flash-success" style="color:white; padding:8px; font-size:14px;border: 1px #999999 solid;background:rgb(255,0,0);border-radius: 4px;">

                    <!--<div class="flash-success" style="color:#F00; padding-left:150px; font-size:15px">-->
                        <?php echo Yii::app()->user->getFlash('error'); ?>
                    </div>
                    <?php endif; ?>
            
             <?php
                Yii::app()->clientScript->registerScript(
                        'myHideEffect', '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
                );
                ?>
                    <?php if(Yii::app()->user->hasFlash('success')):?>
                    <div class="flash-success" style="color:white; padding:8px; font-size:14px;border: 1px #999999 solid;background:rgb(35, 161, 16);border-radius: 4px;">

                    <!--<div class="flash-success" style="color:#F00; padding-left:150px; font-size:15px">-->
                        <?php echo Yii::app()->user->getFlash('success'); ?>
                    </div>
                    <?php endif; ?>
            
            <div class="pdtab_Con" style="width:100%">
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tbody>
                        <tr>
                            <td width="25%" style="padding: 8px 5px;"><strong> Invoice ID</strong></td>
                            <?php 
                            $invoice = FinanceFeeInvoices::model()->findAll("id=:x",array(':x'=>$_REQUEST['id']));
                            foreach($invoice as $invoice_1){?>
                            <td style="padding: 8px 5px;"><?php echo $invoice_1->invoice_id;?></td>
                        </tr> 
                        <tr>
                             <td width="25%" style="padding: 8px 5px;"><strong> Recipient</strong></td>
                               <?php $student = Students::model()->findByAttributes(array('id'=>$invoice_1->student_id));?>
                            <td style="padding: 8px 5px;"><?php echo CHtml::link($student->first_name . '  ' . $student->middle_name . '  ' . $student->last_name, array('/students/students/view', 'id' => $student->id),array('style'=>'color:#FF6600;'));?></td>
                        </tr>
                        <tr>
                            <td width="25%" style="padding: 8px 5px;"><strong>Fee Category</strong></td>
                            <?php $feecategory = FinanceFeeCategories::model()->findByAttributes(array('id'=>$invoice_1->finance_fee_category_id));?>
                            <td style="padding: 8px 5px;"><?php echo $feecategory->name;?></td>
                        </tr>
                        <tr>
                            <td width="25%" style="padding: 8px 5px;"><strong>Invoice Date</strong></td>
                            <td style="padding: 8px 5px;"><?php echo $date = date("d M Y", strtotime($invoice_1->created_at));?></td>
                        </tr>
                        <tr>
                            <td width="25%" style="padding: 8px 5px;"><strong>Invoice Amount</strong></td>
                            <td style="padding: 8px 5px;"><?php echo $invoice_1->amount;?></td>
                        </tr>
                        <tr>
                            <td width="25%" style="padding: 8px 5px;"><strong>Payment Details</strong></td>
                            <td style="padding: 8px 5px;"><?php
                                                            $pd = ($invoice_1->amount) - ($invoice_1->amount_payable);
                                                            echo $pd;
                                                            ?></td>
                        </tr>
                         <tr>
                            <td width="25%" style="padding: 8px 5px;"><strong>Amount Payable</strong></td>
                            <td style="padding: 8px 5px;"><?php echo $invoice_1->amount_payable;?></td>
                        </tr>
                        <tr>
                            <td width="25%" style="padding: 8px 5px;"><strong>Due Date</strong></td>
                            <td style="padding: 8px 5px;"><?php echo $date = date("d M Y", strtotime($invoice_1->due_date));?></td>
                        </tr>
                        <tr>
                            <td width="25%" style="padding: 8px 5px;"><strong>Last Payment Date</strong></td>
                            <td style="padding: 8px 5px;"><?php echo $date = date("d M Y", strtotime($invoice_1->last_payment_date));?></td>
                        </tr>
                        <tr>
                            <td width="25%" style="padding: 8px 5px;"><strong>Status</strong></td>
                            
                               <?php $status = $invoice_1->status;
                                if($status==0){
                                    echo '<td style="padding: 8px 5px;color:red;font-size:18px;"><strong>'.Unpaid.'</strong></td>';
                                }
                                elseif ($status==1) {
                                    echo '<td style="padding: 8px 5px;color:green;font-size:18px;"><strong>'.Paid.'</strong></td>';
                                   
                            }
                            else {
                                echo '<td style="padding: 8px 5px;color:blue;font-size:18px;"><strong>'.Cancelled.'</strong></td>';
                               
                            }
                            ?>
                           
                        </tr>
                        
                            <?php } ?>
                    </tbody>
                </table>    
            
            <br/>
            <br/>
            
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tbody>
                    <tr class="pdtab-h">
                        <td align="center" height="18">#</td>
                        <td align="center">Particular</td>
                        <td align="center">Description</td>
                        <td align="center">Unit Price</td>
                        <td align="center">Discount</td>
                        <td align="center">Tax</td>
                        <td align="center">Amount</td>
                    </tr>
                </tbody> 
                
                <tbody>
                   <?php
                   
                   $invoices = FinanceFeeInvoices::model()->findByAttributes(array('id'=>$_REQUEST['id']));
                   
                   $particular = FinanceFeeParticulars::model()->findByAttributes(array('id'=>$invoices->finance_fee_particular_id));
                   $subtotal = array();
                   $particulartotal = array();
                   $disc = array();
                   $ta[] = array();
                   $i=1;
//                   foreach ($particular as $particular_1){
                   ?>
                    <tr>
                        <td align="center"><?php echo $i;?></td>
                        <td align="center"><?php echo $particular->name;?></td>
                        <td align="center"><?php echo $particular->description;?></td>
                       
                        <?php 
                            
                        $access = FinanceFeeParticularAccess::model()->findAll("finance_fee_particular_id=:x",array(':x'=>$particular->id));
                            
                       ?>
             
                        <td align="center">
                            <?php 
//                            $total =array();
//                            foreach($access as $access_1){ ?>
                             <?php
//                             $total[]=$access_1->amount;
                            // echo "<p>".$access_1->amount."</p>"; ?>
                           <?php //  }
                           echo $invoices->actual_amount;
//                            echo $data = array_sum($total);
                           ?>
                        </td>
                       
                       
                         <td align="center">
                            <?php   
                                    echo $discount = $particular->amount;
                                        
                                   
                            ?>
                         </td>
                         <?php $taxes = Taxes::model()->findByAttributes(array('id'=>$particular->tax_id));?>
                        
                        <td align="center"><?php if($taxes!=NULL)echo $tax = $taxes->value;else echo "-";?></td>
                        <td align="center">
                            <?php 
//                                if($particular_1->discount_type == 1)
//                                {
//                                     $totaldiscount = ($discount/100)*$data;
//                                }
//                                else
//                                {
//                                    $totaldiscount = $discount;
//                                }
//                                $totaltax = ($tax/100)*$data;
//                                $totaldiscount = ($discount/100)*$data;
                                $discont_calc = $discount/100;
                                $discount_value = ($discont_calc)*($invoices->actual_amount);
                                $tax_calc = $tax/100;
                                $tax_value = ($tax_calc)*($invoices->actual_amount);
                                $disc[] = $totaldiscount;
                                $ta[] = $totaltax;
                                $sum =  $data - $totaldiscount +  $totaltax;
                                $total = $sum;
                                $subtotal[] = $total;
//                                echo $total;
                                echo $invoices->amount;
                                
                            ?>
                        </td>
                        
                    </tr>
                    <?php $particulartotal[]=$data;$i++;
//                            } ?>
                </tbody>
                 </table>
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                   
                <tbody>
                    <tr>
                         <td  align="right" width="572px" style="padding-right:42px;"><strong>Sub total</strong></td>
                        <td align="center"> 
                            <?php 
//                            echo  array_sum($particulartotal);
                              echo $invoices->actual_amount;
                            ?></td>
                    </tr>
                    <tr>
                         <td  align="right" width="572px" style="padding-right:42px;"><strong>Discount</strong></td>
                        <td align="center"><?php echo $discount_value;?></td>
                    </tr>
                    <tr>
                         <td  align="right" width="572px" style="padding-right:42px;"><strong>Tax</strong></td>
                        <td align="center"><?php echo $tax_value;?></td>
                    </tr>
                    <tr>
                         <td  align="right" width="572px" style="padding-right:42px;"><strong>Total</strong></td>
                        <td align="center"><?php echo  $total = ($invoices->actual_amount)-($discount_value)+($tax_value); ?></td>
                    </tr>
                </tbody>
                </table>   
             
                <br/>
                <br/>
            <h1>Transactions</h1>
            <?php 
             $transaction = FinanceFeeTransactions::model()->findAll("invoice_id=:x",array(':x'=>$invoice_1->invoice_id));
            if(!empty($transaction)){
            ?>
                          <div style="margin-top:20px; position:relative;">
                        <div class="clear"></div>
                        <div style="display: inline-block;margin-bottom: 14px;margin-top:30px; width: 100%;">
                            <div style="float:left;">

                                <div class="ea_pdf" style="top:0px; right:6px;">
                                    <?php echo CHtml::link('<img src="images/pdf-but.png">', array('invoices/transactionpdf','id'=>$_REQUEST['id']), array('target' => '_blank')); ?>
                                </div>
                            </div> 

                        </div>
                    </div>
            <?php } ?>
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                 <tbody>
                     <tr class="pdtab-h">
                        <td align="center" height="18">#</td>
                        <td align="center">Date</td>
                        <td align="center">Type</td>
                        <td align="center">Transaction ID</td>
                        <td align="center">Description</td>
                        <td align="center">Amount</td>
                        <td align="center">Proof</td>
                        <td align="center">Status</td>
                        <td align="center">Actions</td>
                     </tr>
                 </tbody>
                 <tbody>
                       <?php 
                            if(isset($_REQUEST['page']))
                            {
                                $i=($pages->pageSize*$_REQUEST['page'])-9;
                            }
                            else
                            {
                                    $i=1;
                            }

                            $cls="even";
                       ?>
                     <?php 
                            $transaction = FinanceFeeTransactions::model()->findAll("invoice_id=:x",array(':x'=>$invoice_1->invoice_id));
                            if(!empty($transaction)){
                            foreach($transaction as $transaction_1){
                     ?>
                     <tr>
                         <td align="center" style="width: 20px;"><?php if($transaction_1->is_deleted == '1')echo '<strike>'.$i.'</strike>';else echo $i;?></td>
                         <td align="center"><?php if($transaction_1->is_deleted == '1')echo '<strike>'.$date = date("d M Y", strtotime($transaction_1->date)).'</strike>';else echo $date = date("d M Y", strtotime($transaction_1->date));?></td>
                         <?php $types = PaymentTypes::model()->findByAttributes(array('id'=>$transaction_1->payment_type_id));?>
                         <td align="center"><?php if($transaction_1->is_deleted == '1')echo '<strike>'.$types->type.'</strike>';else echo $types->type;?></td>  
                         <td align="center"><?php if($transaction_1->is_deleted == '1')echo '<strike>'.$transaction_1->transaction_id.'</strike>';else echo $transaction_1->transaction_id;?></td>
                         <td align="center"><?php if($transaction_1->is_deleted == '1')echo '<strike>'.$transaction_1->description.'</strike>';else echo $transaction_1->description;?></td>
                         <td align="center"><?php if($transaction_1->is_deleted == '1')echo '<strike>'.$transaction_1->amount.'</strike>';else echo $transaction_1->amount;?></td>
                         <td align="center"><?php if($transaction_1->is_deleted == '1')echo '<strike>'.proof.'</strike>';else echo CHtml::link('Proof',array('downloadimage','id'=>$transaction_1->id),array('style'=>'color:#FF6600'));?></td>
                         <td align="center">
                             <?php 
                                    if($transaction_1->is_deleted == '1'){
                                    if($transaction_1->status == 1)
                                        echo '<strike>'.Completed.'</strike>';
                                    }
                                    else
                                    {
                                        echo "Completed";
                                    }
                             ?>
                         </td>
                         <td align="center">
                             <?php 
                                if($transaction_1->is_deleted == '1')
                                    echo "-";
                                else
                                   echo CHtml::link('Remove',array('remove','id'=>$transaction_1->id),array('style'=>'color:#FF6600'));  
                               ?>
                         </td>
                         
                     </tr>
                            <?php $i++;} ?>
                            <?php } else { ?>
                     <tr>
                         <td colspan="9" align="center">For This Invoice Transactions Are Not Available Yet !</td>
                     </tr>
                            <?php } ?>
                 </tbody>
             </table>    
            </div>
          
            <?php
            if($invoice_1->status == 0){ 
                echo $this->renderPartial('_form', array('model'=>$model));
             }   
             ?>
            
        </div>
    </td>   
  </tr>  
</table>  