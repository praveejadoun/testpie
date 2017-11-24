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
  <?php 
  $list= FinanceFeeInvoices::model()->findAll("is_deleted=:x",array(':x'=>0));
  if($list)
	{?>
    <table style="border-collapse:collapse;width:1000px;">
      
         <tr >
            <td style="border: 1px solid #dddddd;padding: 8px;width:10%;text-align: center"><?php echo Yii::t('invoices','<strong>Sl.No</strong>');?></td>
             <td style="border: 1px solid #dddddd;padding: 8px;text-align: center;width:10%;"><?php echo Yii::t('invoices','<strong>Invoice ID</strong>');?></td>
             <td style="border: 1px solid #dddddd;padding: 8px;text-align: center;width:10%;"><?php echo Yii::t('invoices','<strong>Recipient</strong>');?></td>
             <td style="border: 1px solid #dddddd;padding: 8px;text-align: center;width:10%;"><?php echo Yii::t('invoices','<strong>Fee Category</strong>');?></td>
             <td style="border: 1px solid #dddddd;padding: 8px;text-align: center;width:10%;"><?php echo Yii::t('invoices','<strong>Amount</strong>');?></td>
             <td style="border: 1px solid #dddddd;padding: 8px;text-align: center;width:10%;"><?php echo Yii::t('invoices','<strong>Balance</strong>');?></td>
             <td style="border: 1px solid #dddddd;padding: 8px;text-align: center;width:10%;"><?php echo Yii::t('invoices','<strong>Status</strong>');?></td>

        </tr>
        <?php 
        
         if(isset($_REQUEST['page']))
          {
      $i=($pages->pageSize*$_REQUEST['page'])-9;
         }
        else
            {
	  $i=1;
            }
  
        
        
        ?>
        <?php foreach($list as $list_1)
	{ ?>
        <tr>
         
             <td style="border: 1px solid #dddddd;padding: 8px;width:10%;text-align: center"> 
                 <?php 
               echo $i;
                 ?>
             </td>
             <td style="border: 1px solid #dddddd;padding: 8px;width:10%;text-align: center"> <?php echo $list_1->invoice_id;?></td>	
              <?php $student = Students::model()->findByAttributes(array('id'=>$list_1->student_id));?>
	     <td style="border: 1px solid #dddddd;padding: 8px;width:10%;text-align: center"> <?php echo $student->first_name.' '.$student->last_name;?></td>		
              <?php $feecategory = FinanceFeeCategories::model()->findByAttributes(array('id'=>$list_1->finance_fee_category_id));?>
             <td style="border: 1px solid #dddddd;padding: 8px;width:10%;text-align: center"> <?php echo $feecategory->name; ?></td>
             <td style="border: 1px solid #dddddd;padding: 8px;width:10%;text-align: center"><?php echo $list_1->amount;?></td>
             <td style="border: 1px solid #dddddd;padding: 8px;width:10%;text-align: center">-</td>
             <td style="border: 1px solid #dddddd;padding: 8px;width:10%;text-align: center">
                  <?php $status = $list_1->status;
                                if($status==0){
                                    echo "Unpaid";
                                }
                                elseif ($status==1) {
                                    echo "paid";
                            }
                            else {
                                echo "Cancelled";
                            }
                            ?>
             </td>     
                 
        </tr>
                            <?php $i++; } ?>
    </table>
    
        <?php }?>  
</div>