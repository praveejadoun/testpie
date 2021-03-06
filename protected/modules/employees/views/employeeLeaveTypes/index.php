<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/employees/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    <h1><?php echo Yii::t('employees','Employee Leave Types');?></h1>
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
    <td><?php echo $form->labelEx($model,Yii::t('employees','name'),array('style'=>'float:left')); ?></td>
    <td><?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></td>
  
    <td><?php echo $form->labelEx($model,Yii::t('employees','code'),array('style'=>'float:left')); ?></td>
    <td><?php echo $form->textField($model,'code',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'code'); ?></td>
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formbut','id' => 'btn', 'name' => 'bbtn', 'title' => 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>
<h3><?php echo Yii::t('employees','Active Leave types');?></h3>
<div class="tableinnerlist">
<table width="100%" cellpadding="0" cellspacing="0">
<tr class="pdtab-h">
	<td style="text-align:left;">Leave Type</td>
        <td>Max.Leave Count</td>
        <td>Status</td>
        <td>Carry Forward</td>
    <td>Edit</td>
    <td>Delete</td>
</tr>


<?php
$active=EmployeeLeaveTypes::model()->findAll("status=:x", array(':x'=>1));
if($active!=null){
foreach($active as $active_1)
{
   echo '<tr><td style="padding-left:10px; text-align:left;">'.$active_1->name.'</td>';
   echo '<td style="padding-left:10px; text-align:center;">'.$active_1->max_leave_count.'</td>';
   if($active_1->status=='1'){
   echo '<td style="padding-left:10px;text-align:center;">'.Active.'</td>';}
   if($active_1->carry_forward=='1'){
   echo '<td style="padding-left:10px;text-align:center;">'.Yes.'</td>';
   
   }elseif($active_1->carry_forward=='0'){
     echo '<td style="padding-left:10px;text-align:center;">'.No.'</td>';  
   }
   echo '<td>'.CHtml::link(Yii::t('employees','Edit'), array('update', 'id'=>$active_1->id)).'</td>';
    echo '<td>'.CHtml::link(Yii::t('employees','Delete'), array('delete', 'id'=>$active_1->id),array('confirm'=>Yii::t('employees','Are you Sure?'))).'</td></tr>';
}}
 else { ?>
    <tr><td colspan="6">Active Leave types are not available Yet !</td></tr>
<?php } ?>
</table>
</div>
<br />
<h3><?php echo Yii::t('employees','Inactive Leave types');?></h3>
<div class="tableinnerlist">
<table width="100%" cellpadding="0" cellspacing="0">
<tr class="pdtab-h">
	<td style="text-align:left;">Leave Type</td>
        <td>Max.Leave Count</td>
        <td>Status</td>
        <td>Carry Forward</td>
    <td>Edit</td>
    <td>Delete</td>
</tr>

<?php
$inactive=EmployeeLeaveTypes::model()->findAll("status=:x", array(':x'=>2));
if($inactive!=null)
{
foreach($inactive as $inactive_1)
{
   echo '<tr><td style="padding-left:8px; text-align:left;">'.$inactive_1->name.'</td>';
   echo '<td style="padding-left:10px; text-align:center;">'.$inactive_1->max_leave_count.'</td>';
   
   if($inactive_1->status=='2'){
   echo '<td style="padding-left:10px;text-align:center;">'.InActive.'</td>';}
   if($inactive_1->carry_forward=='1'){
   echo '<td style="padding-left:10px;text-align:center;">'.Yes.'</td>';
   
   }elseif($inactive_1->carry_forward=='0'){
     echo '<td style="padding-left:10px;text-align:center;">'.No.'</td>';  
   }
   echo '<td>'.CHtml::link(Yii::t('employees','Edit'), array('update', 'id'=>$inactive_1->id)).'</td>';
    echo '<td>'.CHtml::link(Yii::t('employees','Delete'), array('delete', 'id'=>$inactive_1->id),array('confirm'=>Yii::t('employees','Are you Sure?'))).'</td></tr>';
}
}
 else { ?>
<tr><td colspan="6">InActive Leave types are not available Yet !</td></tr>  
<?php } ?>
</table>
</div>

</div>
    </td>
  </tr>
</table>
<script>
    $(document).ready(function(){
        $("#employee-leave-types-form").submit(function(){
            $("#btn").attr('disabled','true');
        });
    });''
    </script>
	