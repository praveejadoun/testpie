<?php
$this->breadcrumbs=array(
    'attendances'=>array('/attendance'),
	'Employee Leave Types',
);
?>
 <div style="background:#fff; min-height:800px;">    
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">
    <div class="cont_right formWrapper" style="width:955px;">
    <h1><?php echo Yii::t('employees','Employee Leave Types');?></h1>
    <div class="c_batch_tbar" style="padding:0px; margin:0px 0px 0px 0px;border:none;border-radius:0px;">
        
    <?php if((Yii::app()->controller->id=='batches' and (Yii::app()->controller->action->id=='batchstudents' or Yii::app()->controller->action->id=='settings')) or (Yii::app()->controller->id=='subject' and Yii::app()->controller->action->id=='index') or (Yii::app()->controller->id=='weekdays' and (Yii::app()->controller->action->id=='timetable' or Yii::app()->controller->action->id=='index')) or (Yii::app()->controller->id=='classTiming' and Yii::app()->controller->action->id=='index') or (Yii::app()->controller->id=='studentAttentance' and Yii::app()->controller->action->id=='index') or (Yii::app()->controller->id=='gradingLevels' and Yii::app()->controller->action->id=='index') or (Yii::app()->controller->id=='exam' and Yii::app()->controller->action->id=='index') )
			{
				?>
            
            <?php
			
			$rurl = explode('index.php?r=',Yii::app()->request->getUrl());
                       
			$rurl = explode('&id=',$rurl[1]); 
			echo CHtml::ajaxLink('Change Batch',array('/site/explorer','widget'=>'2','rurl'=>$rurl[0]),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'sb_but','style'=>'top:-40px; right:40px;')); 
                        echo CHtml::link('Teacher Attendance',array('/attendance/teachersubjectattendance'),array('class'=>'sb_but','style'=>'top:-40px; right:170px;'));?>
<?php 
			}else
			{
				echo CHtml::link('Teacher Attendance',array('/attendance/teachersubjectattendance/create'),array('class'=>'sb_but','style'=>'top:-40px; right:40px;'));

                                                
                                                $rurl = explode('index.php?r=',Yii::app()->request->getUrl());
                       
			$rurl = explode('&id=',$rurl[1]); 
			echo CHtml::ajaxLink('Student Attendance',array('/site/explorer2','widget'=>'2','rurl'=>$rurl[0]),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'sb_but','style'=>'top:-40px; right:170px;')); 
                        
				//echo CHtml::link('Teacher Attendance',array(''),array('class'=>'sb_but','style'=>'top:-40px; right:40px;'));
			}?>
            
            <?php echo CHtml::link('<span>close</span>',array('/attendance'),array('class'=>'sb_but_close','style'=>'top:-40px; right:0px;'));?>
        </div>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="formCon">
<div class="formConInner">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-leave-types-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>

	

	<?php /*?><?php echo $form->errorSummary($model); ?><?php */?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
       <td><?php echo $form->labelEx($model,Yii::t('employees','code'),array('style'=>'float:left')); ?></td>
    <td><?php echo $form->textField($model,'code',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'code'); ?></td>
      
    <td><?php echo $form->labelEx($model,Yii::t('employees','name'),array('style'=>'float:left')); ?></td>
    <td><?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></td>
  
   
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('employees','max_leave_count'),array('style'=>'float:left')); ?></td>
    <td><?php echo $form->textField($model,'max_leave_count',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'max_leave_count'); ?></td>
 
    <td colspan="2" class="cr_align">
		<?php echo $form->checkBox($model,Yii::t('employees','carry_forward')); ?>
		<?php echo $form->error($model,'carry_forward'); ?>
        <?php echo $form->labelEx($model,'carry_forward'); ?>
        </td>
    
  </tr>
   <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
  	<td><?php echo $form->labelEx($model,Yii::t('employees','status'),array('style'=>'float:left')); ?>
    </td>
     <td colspan="3" class="cr_align"><?php echo $form->radioButtonList($model,'status',array('1'=>'Active','2'=>'Inactive'),array('separator'=>' ')); ?>
     <?php echo $form->error($model,'status'); ?></td>
  </tr>
</table>

	<div class="clear"></div>
<br />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formbut')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>
<h3><?php echo Yii::t('employees','Active Leave types');?></h3>
<div class="tableinnerlist">
<table width="100%" cellpadding="0" cellspacing="0">
<tr class="pdtab-h">
	<td style="text-align:center;">Leave Type</td>
     <td>Max Leave Count</td>
      <td>Status</td>
         <td>Carry Forward</td>
    <td>Edit</td>
    <td>Delete</td>
</tr>


<?php
$active=EmployeeLeaveTypes::model()->findAll("status=:x", array(':x'=>1));
foreach($active as $active_1)
{
   echo '<tr><td style="padding-left:10px; text-align:center;">'.$active_1->name.'</td>';	
   echo '<td style="padding-left:10px; text-align:center;">'.$active_1->max_leave_count.'</td>';?>
   <td style="padding-left:10px; text-align:center;"><?php if($active_1->status==1){echo 'Active';}else{echo 'InActive';}?></td>	
  <td style="padding-left:10px; text-align:center;"><?php if($active_1->carry_forward==0){echo 'No';}else{echo 'Yes';}?></td>	
  <?php echo '<td>'.CHtml::link(Yii::t('employees','Edit'), array('update', 'id'=>$active_1->id)).'</td>';
    echo '<td>'.CHtml::link(Yii::t('employees','Delete'), array('delete', 'id'=>$active_1->id),array('confirm'=>Yii::t('employees','Are you Sure?'))).'</td></tr>';
}
?>
</table>
</div>
<br />
<h3><?php echo Yii::t('employees','Inactive Leave types');?></h3>
<div class="tableinnerlist">
<table width="100%" cellpadding="0" cellspacing="0">
<tr class="pdtab-h">
	<td style="text-align:center;">Leave Type</td>
     <td>Max Leave Count</td>
      <td>Status</td>
         <td>Carry Forward</td>   
    <td>Edit</td>
    <td>Delete</td>
</tr>

<?php
$inactive=EmployeeLeaveTypes::model()->findAll("status=:x", array(':x'=>2));
foreach($inactive as $inactive_1)
{
      echo '<tr><td style="padding-left:10px; text-align:center;">'.$inactive_1->name.'</td>';	
   echo '<td style="padding-left:10px; text-align:center;">'.$inactive_1->max_leave_count.'</td>';?>
   <td style="padding-left:10px; text-align:center;"><?php if($inactive_1->status==1){echo 'Active';}else{echo 'InActive';}?></td>	
  <td style="padding-left:10px; text-align:center;"><?php if($inactive_1->carry_forward==0){echo 'No';}else{echo 'Yes';}?></td>	
<?php   echo '<td>'.CHtml::link(Yii::t('employees','Edit'), array('update', 'id'=>$inactive_1->id)).'</td>';
    echo '<td>'.CHtml::link(Yii::t('employees','Delete'), array('delete', 'id'=>$inactive_1->id),array('confirm'=>Yii::t('employees','Are you Sure?'))).'</td></tr>';
}
?>
</table>
</div>

</div>
    </td>
  </tr>
</table>
 </div>