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
<div class="overview" >
    
    <div class="overviewbox ovbox1" style="width: 193px;">
    	<h1><?php echo Yii::t('feesdashboard','<strong>Total Fee Categories</strong>');?></h1>
        <?php //  $tot =   Students::model()->countByAttributes(array('is_active'=> 1,'is_deleted'=>0)); ?>
        <div class="ovrBtm"><?php echo $total ?></div>
    </div>
    <div class="clear"></div>
    
     <div class="overviewbox ovbox2" style="width: 215px;">
    	<h1><?php echo Yii::t('feesdashboard','<strong>Invoices Generated For</strong>');?></h1>
        <?php //  $tot =   Students::model()->countByAttributes(array('is_active'=> 1,'is_deleted'=>0)); ?>
        <div class="ovrBtm"><?php echo $total ?></div>
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
                        <td align="center"><?php echo CHtml::link($list_1->name,array('view','id'=>$list_1->id)); ?></td>
                        <td align="center"><?php echo $fee = date("M d.Y", strtotime($list_1->created_at)); ?></td>
                        <td align="center">Me</td>
                        <td align="center">-</td>
                        <?php $subscription = FinanceFeeSubscription::model()->findAll("fee_category_id=:x",array(':x'=>$list_1->id));?>
                        <td align="center"><?php if($subscription!=null){ echo CHtml::link('Generate Invoice',array('view','id'=>$list_1->id));?><span> | </span><?php echo CHtml::link('Remove',array('remove','id'=>$list_1->id),array('confirm'=>"Are you sure You Want To Remove this FeeCategory?")); ?><?php }else { echo CHtml::link('Create subscription',array('subscription/','id'=>$list_1->id));?> <span> | </span><?php echo CHtml::link('Remove',array('remove1','id'=>$list_1->id),array('confirm'=>"Are you sure You Want To Remove this FeeCategory?")); } ?></td>
                    </tr>
                  <?php //  echo CHtml::link(Yii::t(
//  'Logcategory','Delete'), array('delete', 'id' =>$logcategory_1->id,'class'=>'grdel'),array('confirm'=>"Are you sure You Want To Delete this LogCategory?")); ?>
                </tbody>
                
                <?php } ?>

            </table>
            <div class="clear"></div>
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