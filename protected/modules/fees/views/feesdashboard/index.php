<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<?php if($list!=NULL)
{?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top" width="75%">
<div class="cont_right formWrapper">
<h1><?php echo Yii::t('feesdashboard','Fees Dashboard');?></h1>


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


<div class="overview" >
    
    <div class="overviewbox ovbox1" style="width: 193px;">
    	<h1><?php echo Yii::t('feesdashboard','<strong>Total Fee Categories</strong>');?></h1>
        <?php //  $tot =   Students::model()->countByAttributes(array('is_active'=> 1,'is_deleted'=>0)); ?>
        <div class="ovrBtm"><?php echo $total ?></div>
    </div>
    <div class="clear"></div>
    
     <div class="overviewbox ovbox2" style="width: 215px;">
    	<h1><?php echo Yii::t('feesdashboard','<strong>Invoices Generated For</strong>');?></h1>
        <?php   $tot =   FinanceFeeCategories::model()->countByAttributes(array('is_invoice'=> 1,'is_deleted'=>0)); ?>
        <div class="ovrBtm"><?php echo $tot; ?></div>
    </div>
    <div class="clear"></div>

</div>

    <div class="pdtab_Con" style="width:97%">
        <div style="font-size:13px; padding:5px 0px"><?php echo Yii::t('feesdashboard','<strong>Fee Categories</strong>');?></div>

            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tbody>
                    <tr class="pdtab-h">
                    <td align="center" height="18"><?php echo Yii::t('feesdashboard','Category Name');?></td>
                    <td align="center"><?php echo Yii::t('feesdashboard','Date Created');?></td>
                    <td align="center"><?php echo Yii::t('feesdashboard','Created By');?></td>
                    <td align="center"><?php echo Yii::t('feesdashboard','Invoice Generated');?></td>
                    <td align="center"><?php echo Yii::t('feesdashboard','Actions');?></td>
                    </tr>
                </tbody>
                
                <?php foreach($list as $list_1) { ?>
                <tbody>
                    <tr>
                        <td align="center"><?php echo CHtml::link($list_1->name,array('view','id'=>$list_1->id),array('style'=>'color:#FF6600')); ?></td>
                        <td align="center"><?php echo $fee = date("M d.Y", strtotime($list_1->created_at)); ?></td>
                        <td align="center">Me</td>
                        <td align="center"><?php if($list_1->is_invoice=='0'){ echo "No";}else{echo "Yes";} ?></td>
                        <?php
                        $subscription = FinanceFeeSubscription::model()->findAll("fee_category_id=:x",array(':x'=>$list_1->id));
                        $invoice = FinanceFeeInvoices::model()->findAll("finance_fee_category_id=:x",array(':x'=>$list_1->id));
                        ?>
                        <td align="center">
                            <?php 
                                if($invoice!=null)
                                    {
                                    echo CHtml::link('View Invoice',array('invoices/manage','id'=>$list_1->id),array('style'=>'color:#FF6600'));
                                    }elseif ($subscription!=null) {
                                       echo CHtml::link('Generate Invoice',array('invoices/generate','id'=>$list_1->id),array('style'=>'color:#FF6600','confirm'=>"Are you sure you want to Generate Invoice"));?>
                                        <span> | </span>
                                    <?php 
                                    echo CHtml::link('Remove',array('remove','id'=>$list_1->id),array('style'=>'color:#FF6600','confirm'=>"Are you sure You Want To Remove this FeeCategory?\n\n Note : It will Remove Particulars,Access")); 
                                    }
                                    else
                                    {
                                        echo CHtml::link('Create subscription',array('subscription/','id'=>$list_1->id),array('style'=>'color:#FF6600','confirm'=>"Are you sure you want to Create Subscription"));
                                    ?>
                                    <span> | </span>
                                    <?php
                                        echo CHtml::link('Remove',array('remove1','id'=>$list_1->id),array('style'=>'color:#FF6600','confirm'=>"Are you sure You Want To Remove this FeeCategory?\n\n Note : It will Remove Particulars,Access"));
                                    }
                                    ?>
                        </td>                
                                   
                    </tr>
                  <?php //  echo CHtml::link(Yii::t(
//  'Logcategory','Delete'), array('delete', 'id' =>$logcategory_1->id,'class'=>'grdel'),array('confirm'=>"Are you sure You Want To Delete this LogCategory?")); ?>
                </tbody>
                
                <?php } ?>

            </table>
             <div class="list_contner" style="margin: 0px 0px 0px 0px;">
              <div class="pagecon">
                                    <?php
                                    $this->widget('CLinkPager', array(
                                        'currentPage' => $pages->getCurrentPage(),
                                        'itemCount' => $item_count,
                                        'pageSize' => $page_size,
                                        'maxButtonCount' => 5,
                                        //'nextPageLabel'=>'My text >',
                                        'header' => '',
                                        'htmlOptions' => array('class' => 'pages'),
                                    ));
                                    ?>
                                </div>
                 <div class="clear"></div>
             </div>
            
    </div>

</div>
    </td>
   </tr>
</table>
<?php } else { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div style="padding:20px 20px">
<div class="yellow_bx" style="background-image:none;width:680px;padding-bottom:45px;">
                
                	<div class="y_bx_head" style="width:650px;">
                    	It appears that this is the first time that you are using this Open-School Setup. For any new installation we recommend that you configure the following:
                    </div>
                    <div class="y_bx_list" style="width:650px;">
                    	<h1><?php echo CHtml::link(Yii::t('students','Create New Students'),array('create')) ?></h1>
                        <p>Before Creating Students, make sure you created <?php echo CHtml::link(Yii::t('students','Student Categories'),array('/students/studentCategory')) ?> and the <?php echo CHtml::link('Courses &amp; Batches',array('/courses/courses/create')) ?> for enrolling Students.</p>
                    </div>
                    
                </div>

                </div>
    
    
    </td>
  </tr>
</table>

<?php } ?>