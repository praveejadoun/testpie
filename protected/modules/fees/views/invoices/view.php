<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top" width="75%">
        <div class="cont_right formWrapper">
            <h1>Invoice-</h1>
            
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
                            <td style="padding: 8px 5px;"><?php echo "-";?></td>
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
                   <?php $particular = FinanceFeeParticulars::model()->findAll("finance_fee_category_id=:x",array(':x'=>$feecategory->id));
                    foreach ($particular as $particular_1){
                   ?>
                    <tr>
                        <td></td>
                        <td><?php echo $particular_1->name;?></td>
                        <td><?php echo $particular_1->description;?></td>
                       
                        <?php 
                            $access = FinanceFeeParticularAccess::model()->findAll("finance_fee_particular_id=:x",array(':x'=>2));
                            
                       ?>
              
                        <td><?php foreach($access as $access_1){ echo $access_1->amount;}?></td>
                       
                         <td><?php echo $particular_1->amount;?></td>
                         <?php $tax = Taxes::model()->findByAttributes(array('id'=>$particular_1->tax_id));?>
                        
                        <td><?php echo $tax->value;?></td>
                        <td></td>
                        
                    </tr>
                    <?php } ?>
                </tbody>
                 </table>
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                   
                <tbody>
                    <tr>
                         <td  align="right" width="572px" style="padding-right:10px;"><strong>Sub total</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                         <td  align="right" width="572px" style="padding-right:10px;"><strong>Discount</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                         <td  align="right" width="572px" style="padding-right:10px;"><strong>Tax</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                         <td  align="right" width="572px" style="padding-right:10px;"><strong>Total</strong></td>
                        <td></td>
                    </tr>
                </tbody>
                </table>   
                <br/>
                <br/>
            <h1>Transactions</h1>
            
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
                         <td align="center"><?php if($transaction_1->is_deleted == '1')echo '<strike>'.$transaction_1->date.'</strike>';else echo $transaction_1->date;?></td>
                         <?php $types = PaymentTypes::model()->findByAttributes(array('id'=>$transaction_1->payment_type_id));?>
                         <td align="center"><?php if($transaction_1->is_deleted == '1')echo '<strike>'.$types->type.'</strike>';else echo $types->type;?></td>  
                         <td align="center"><?php if($transaction_1->is_deleted == '1')echo '<strike>'.$transaction_1->transaction_id.'</strike>';else echo $transaction_1->transaction_id;?></td>
                         <td align="center"><?php if($transaction_1->is_deleted == '1')echo '<strike>'.$transaction_1->description.'</strike>';else echo $transaction_1->description;?></td>
                         <td align="center"><?php if($transaction_1->is_deleted == '1')echo '<strike>'.$transaction_1->amount.'</strike>';else echo $transaction_1->amount;?></td>
                         <td align="center">-</td>
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