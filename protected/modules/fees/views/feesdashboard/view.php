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
            $feecategory = FinanceFeeCategories::model()->findAll("id=:x",array(':x' => $_REQUEST['id']));
            foreach( $feecategory as $feecategory_1){
            ?>
           <div><strong>Fee Category :</strong> <?php echo $feecategory_1->name; ?></div>
                                    <br />
           <div><strong>Date Created :</strong> <?php echo $fee = date("M d.Y", strtotime($feecategory_1->created_at)); ?> </div>
                                    <br />
           <div><strong>Description :</strong> <?php echo $feecategory_1->description; ?> </div>
            <?php } ?>
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
                <?php $feeParticular = FinanceFeeParticulars::model()->findAll("finance_fee_category_id=:x",array(':x'=> $_REQUEST['id']))?>
                <?php foreach($feeParticular as $feeParticular_1) { ?>
                <tbody>
                    <tr>
                        <td align="center">-</td>
                        <td align="center"><?php  echo $feeParticular_1->name; ?></td>
                        <td align="center"><?php echo $feeParticular_1->description; ?></td>
                        <td align="center"><?php echo $feeParticular_1->tax_id; ?></td>
                        <td align="center"><?php echo $feeParticular_1->amount; ?></td>
                        <?php
//                        $particularaccess = FinanceFeeParticularAccess::model()->findAll("finance_fee_particular_id=:x",array(':x'=>$feeParticular_1->id));
//                        foreach($particularaccess as $particularaccess_1){
                        ?>
                       <td align="center">-</td> 
                    
<!--                        <td> 
                    <tr>
                          <td align="center">
                              <div>course:<?php echo $particularaccess_1->course_id;?></div>
                              <div>Batch:<?php echo $particularaccess_1->batch_id;?></div>
                              <div>Student Category:<?php echo $particularaccess_1->student_category_id;?></div>
                          </td>
                    </tr>    
                    
                    </td>-->
                       <?php // } ?>
                        <td align="center">-</td>
                       
                    </tr>
                    
                </tbody>
                
                <?php } ?>

            </table>
            <div class="clear"></div>
    </div> 
    <?php // echo $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
    
    </td>
  </tr>
</table>