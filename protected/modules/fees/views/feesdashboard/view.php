<?php
$this->breadcrumbs=array(
	'Fees'=>array('index'),
	'Create',
);


?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
     <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
        <h1><?php echo Yii::t('feesdashboard','Fees');?></h1>
        <div class="formCon">
        <div class="formConInner">
            <?php
            $feecategory = FinanceFeeCategories::model()->findByAttributes(array("id"=>$_REQUEST['id']));
            $subscription = FinanceFeeSubscription::model()->findByAttributes(array("fee_category_id"=>$_REQUEST['id']));
            ?>
           <div><strong>Fee Category :</strong> <?php echo $feecategory->name; ?></div>
                                    <br />
           <div><strong>Date Created :</strong> <?php echo $fee = date("d M Y", strtotime($feecategory->created_at)); ?> </div>
                                    <br />
           <div><strong>Description :</strong> <?php echo $feecategory->description; ?> </div>
                                     <br />
                                     
            <?php 
                if($subscription!=NULL){
                ?>                         
            <div><strong>Start Date :</strong> <?php echo $sd = date("d M Y", strtotime($subscription->start_date)); ?> </div>
                                     <br />
            <div><strong>End Date :</strong> <?php echo $ed = date("d M Y", strtotime($subscription->end_date)); ?> </div>
                                     <br />
            <div><strong>Due Date :</strong> <?php echo $ed = date("d M Y", strtotime($subscription->due_date)); ?> </div>
            <?php  }?>
        </div>
        </div>
        <div class="pdtab_Con" style="width:97%">
        <div style="font-size:13px; padding:5px 0px"><?php echo Yii::t('feesdashboard','<strong>Fee Categories</strong>');?></div>

            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tbody>
                    <tr class="pdtab-h">
                    <td align="center" height="18"><?php echo Yii::t('feesdashboard','#');?></td>
                    <td align="center"><?php echo Yii::t('feesdashboard','Particular');?></td>
                    <td align="center"><?php echo Yii::t('feesdashboard','Description');?></td>
                    <td align="center"><?php echo Yii::t('feesdashboard','Tax');?></td>
                    <td align="center"><?php echo Yii::t('feesdashboard','Discount');?></td>
                    <td align="center"><?php echo Yii::t('feesdashboard','Group');?></td>
                    <td align="center"><?php echo Yii::t('feesdashboard','Amount');?></td>
                    </tr>
                </tbody>
                <?php
                    $i = 1;
                    $feeParticular = FinanceFeeParticulars::model()->findAll("finance_fee_category_id=:x",array(':x'=> $_REQUEST['id']));
                    foreach($feeParticular as $feeParticular_1) { ?>
                <tbody>
                    <tr>
                        <td align="center" style="padding: 8px 3px;"><?php echo $i; ?></td>
                        <td align="center"><?php echo $feeParticular_1->name; ?></td>
                        <td align="center"><?php echo $feeParticular_1->description; ?></td>
                        <td align="center">
                            <?php 
                                $tax = Taxes::model()->findByAttributes(array("id"=>$feeParticular_1->tax_id));
                                if($tax!=NULL){
                                echo $tax->value.' '.'%';
                                }
                                else {
                                    echo "-";
                                }
                            ?>
                        </td>
                        <td align="center">
                            <?php
                                if($feeParticular_1->amount==0.00)
                                    echo "-";
                                else
                                    echo $feeParticular_1->amount.' '.'%';
                                ?>
                        </td>
                        <td align="center">
                               <?php
                        $particularaccess = FinanceFeeParticularAccess::model()->findAll("finance_fee_particular_id=:x",array(':x'=>$feeParticular_1->id));
                        foreach($particularaccess as $particularaccess_1){
                        ?>
                             
                              <p style="border-bottom: 1px solid #E8ECF1;">
                              <div>course:<?php echo $particularaccess_1->course_id;?></div>
                              <div>Batch:<?php echo $particularaccess_1->batch_id;?></div>
                              <div>Student Category:<?php echo $particularaccess_1->student_category_id;?></div>
                              </p>
                             
                          <?php } ?>
                          </td>
                        <td align="center">
                            <?php  foreach($particularaccess as $particularaccess_1){ ?>
                       
                          <p style="border-bottom: 1px solid #E8ECF1;">
                              <?php echo $particularaccess_1->amount;?>
                            
                          </p>
                          <?php } ?>
                          
                        </td>
                    </tr>   
                </tbody>
                <?php $i++;} ?>
            </table>
            <div class="clear"></div>
    </div> 
    <?php // echo $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
    
    </td>
  </tr>
</table>