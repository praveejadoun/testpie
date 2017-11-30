<style>
.listbxtop_hdng
{
	font-size:15px;	
	/*color:#1a7701;*/
	/*text-shadow: 0.1em 0.1em #FFFFFF;*/
	/*font-weight:bold;*/
	text-align:left;
	
}
.table_listbx tr td, tr th {
border-left:1px solid #ccc;
border-top:1px solid #ccc;
border-right:1px solid #ccc;

}
td.listbx_subhdng
{
	color:#333333;
	font-size:13px;	
	font-weight:bold;
	width:0px;
		
}

.odd
{
	background:#DFDFDF;
}
td.subhdng_nrmal
{
	color:#333333;
	font-size:14px;
	width:450px;	
}
.table_listbx
{
	margin:0px;
	padding:0px;
	/*width:1061px;*/
	
}
.table_listbx td
{
	padding:10px 0px 10px 10px;
	margin:0px;
	
	
}
.table_listbxlast td
{
	border-bottom:none;
	
}


td.subhdng_nrmal
{
	color:#333333;
	font-size:12px;	
}
.last
{
	border-bottom:1px solid #ccc;
}
.first
{
	border:none;
}
</style>
<div class="atnd_Con" style="padding-left:20px; padding-top:30px;">
<!-- Header -->
	<div style="border-bottom:#666 1px; width:700px; padding-bottom:20px;">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td class="first">
                           <?php $logo=Logo::model()->findAll();?>
                            <?php
                            if($logo!=NULL)
                            {
                                //Yii::app()->runController('Configurations/displayLogoImage/id/'.$logo[0]->primaryKey);
                                echo '<img src="uploadedfiles/school_logo/'.$logo[0]->photo_file_name.'" alt="'.$logo[0]->photo_file_name.'" class="imgbrder" width="100%" />';
                            }
                            ?>
                </td>
                <td align="center" valign="middle" class="first" style="width:300px;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="listbxtop_hdng first" style="text-align:left; font-size:22px; width:300px;  padding-left:10px;">
                                <?php $college=Configurations::model()->findAll(); ?>
                                <?php echo $college[0]->config_value; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="listbxtop_hdng first" style="text-align:left; font-size:14px; padding-left:10px;">
                                <?php echo $college[1]->config_value; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="listbxtop_hdng first" style="text-align:left; font-size:14px; padding-left:10px;">
                                <?php echo 'Phone: '.$college[2]->config_value; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <!-- End Header -->
    <span align="center"><h5>TRANSACTIONS DETAILS</h5></span><br/>
   
  <table style="border-collapse:collapse;width:1000px;">
                    <tbody>
                        <tr style="height:100px;">
                            <td style="border-bottom: 1px solid #dddddd;padding: 5px;width:330px;text-align: left;">Invoice ID</td>
                            <?php 
                            $invoice = FinanceFeeInvoices::model()->findAll("id=:x",array(':x'=>$_REQUEST['id']));
                            foreach($invoice as $invoice_1){?>
                            <td style="border-bottom: 1px solid #dddddd;padding: 5px;width:330px;text-align: left"><?php echo $invoice_1->invoice_id;?></td>
                        </tr> 
                        <tr>
                             <td style="border-bottom: 1px solid #dddddd;padding: 5px;width:330px;text-align: left">Recipient</td>
                               <?php $student = Students::model()->findByAttributes(array('id'=>$invoice_1->student_id));?>
                            <td style="border-bottom: 1px solid #dddddd;padding: 5px;width:330px;text-align: left"><?php echo $student->first_name . '  ' . $student->middle_name . '  ' . $student->last_name;?></td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid #dddddd;padding: 5px;width:330px;text-align: left">Fee Category</td>
                            <?php $feecategory = FinanceFeeCategories::model()->findByAttributes(array('id'=>$invoice_1->finance_fee_category_id));?>
                            <td style="border-bottom: 1px solid #dddddd;padding: 5px;width:330px;text-align: left"><?php echo $feecategory->name;?></td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid #dddddd;padding: 5px;width:330px;text-align: left">Invoice Date</td>
                            <td style="border-bottom: 1px solid #dddddd;padding: 5px;width:330px;text-align: left"><?php echo $date = date("d M Y", strtotime($invoice_1->created_at));?></td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid #dddddd;padding: 5px;width:330px;text-align: left">Invoice Amount</td>
                            <td style="border-bottom: 1px solid #dddddd;padding: 5px;width:330px;text-align: left"><?php echo $invoice_1->amount;?></td>
                        </tr>
                        
                         <tr>
                            <td style="border-bottom: 1px solid #dddddd;padding: 5px;width:330px;text-align: left">Amount Payable</td>
                            <td style="border-bottom: 1px solid #dddddd;padding: 5px;width:330px;text-align: left"><?php echo $invoice_1->amount_payable;?></td>
                        </tr>
                       
                      
                        
                            <?php } ?>
                    </tbody>
                </table>    
    <br/>
      <br/>
   
    <table cellspacing="0" cellpadding="0" border="0" width="1000px">
                 <tbody>
                     <tr class="pdtab-h">
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;">S.No</td>
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;">Date</td>
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;">Type</td>
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;">Transaction ID</td>
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;">Description</td>
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;">Amount</td>
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;">Proof</td>
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;">Status</td>
                        
                     </tr>
                 </tbody>
                  <tbody>
                       <?php 
                           
                                    $i=1;
                          

                           
                       ?>
                     <?php 
                            $transaction = FinanceFeeTransactions::model()->findAll("invoice_id=:x",array(':x'=>$invoice_1->invoice_id));
                            if(!empty($transaction)){
                            foreach($transaction as $transaction_1){
                     ?>
                     <tr>
                         
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;"><?php echo $i; ?></td>
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;"><?php echo $date = date("d M Y", strtotime($transaction_1->date)); ?></td>
                            <?php $types = PaymentTypes::model()->findByAttributes(array('id'=>$transaction_1->payment_type_id));?>
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;"><?php echo $types->type; ?></td> 
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;"><?php echo $transaction_1->transaction_id; ?></td>
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;"><?php echo $transaction_1->description; ?></td>
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;"><?php echo $transaction_1->amount; ?></td>
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;">
                            <?php if($transaction_1->file_data!=NULL){ echo "Yes";}else{ echo "No";} ?>
                        </td>
                        <td style="border: 1px solid #dddddd;padding: 2px;width:75px;text-align: center;">
                            <?php if($transaction_1->is_deleted==0){echo "Completed";}else{echo "Cancelled";} ?>
                        </td>
                       
                      
                     </tr>
                            <?php $i++;} ?>
                            <?php } else { ?>
                     <tr>
                         <td colspan="8"style="border: 1px solid #dddddd;padding: 0px;text-align: center;">For This Invoice Transactions Are Not Available Yet !</td>
                     </tr>
                            <?php } ?>
                 </tbody>
    </table>
</div>