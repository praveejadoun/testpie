<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    <h1><?php echo Yii::t('students','Student Leave Types');?></h1>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="formCon">
<div class="formConInner">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-leave-types-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>

	

	<?php /*?><?php echo $form->errorSummary($model); ?><?php */?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('students','name'),array('style'=>'float:left')); ?></td>
    <td><?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></td>
  
    <td><?php echo $form->labelEx($model,Yii::t('students','code'),array('style'=>'float:left')); ?></td>
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
      <td><?php echo $form->labelEx($model,Yii::t('students','label'),array('style'=>'float:left')); ?></td>
      <td><?php echo $form->textField($model,'label',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'label'); ?></td>
      
      <td><?php echo $form->labelEx($model,Yii::t('students','colorcode'),array('style'=>'float:left')); ?></td>
    <td><?php echo $form->textField($model,'colorcode',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'colorcode'); ?></td>
    
    <!--<td><?php // echo $form->labelEx($model,Yii::t('students','max_leave_count'),array('style'=>'float:left')); ?></td>
    <td><?php // echo $form->textField($model,'max_leave_count',array('size'=>30,'maxlength'=>255)); ?>
		<?php // echo $form->error($model,'max_leave_count'); ?></td>-->
 
    <!--<-->
    
  </tr>
   <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
  	<td><?php echo $form->labelEx($model,Yii::t('students','status'),array('style'=>'float:left')); ?>
    </td>
     <td colspan="2" class="cr_align"><?php echo $form->radioButtonList($model,'status',array('1'=>'Active','2'=>'Inactive'),array('separator'=>' ')); ?>
     <?php echo $form->error($model,'status'); ?></td>
   </tr>
   <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
     <td colspan="2" class="cr_align">
                <?php echo $form->labelEx($model,'exclude_attentance'); ?>
		<?php echo $form->checkBox($model,Yii::t('students','exclude_attentance')); ?>
		<?php echo $form->error($model,'exclude_attentance'); ?>
        
        </td>
  </tr>
</table>

	<div class="clear"></div>
<br />
	<div class="row buttons">
           
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formbut','id' => 'btn', 'name' => 'bbtn', 'title' => 'Save')); ?>
	</div>
        <div class="row">
                <?php echo $form->hiddenField($model,'created_at',array('value'=>date('Y-m-d')));
		echo $form->error($model,'created_at'); ?> 
            </div>
        <div class="row">
             <?php echo $form->hiddenField($model,'updated_at',array('value'=>date('Y-m-d')));
		echo $form->error($model,'updated_at'); ?>
        </div>
<?php $this->endWidget(); ?>
</div><!-- form -->
</div>
</div>
<h3><?php echo Yii::t('students','Active Leave types');?></h3>
<div class="tableinnerlist">
<table width="100%" cellpadding="0" cellspacing="0">
<tr class="pdtab-h">
	<td style="text-align:left;">Leave Type</td>
        <td>Code</td>
        <td>Label</td>
        <td>Color Code</td>
         <td>Is Excluded</td>
    <td>Edit</td>
    <td>Delete</td>
</tr>


<?php
$active= Studentleavetype::model()->findAll("status=:x", array(':x'=>1));
if($active!=NULL){
foreach($active as $active_1)
{
   echo '<tr><td style="padding-left:10px; text-align:left;">'.$active_1->name.'</td>';
   echo '<td style="padding-left:10px; text-align:left;">'.$active_1->code.'</td>';
   echo '<td style="padding-left:10px; text-align:left;">'.$active_1->label.'</td>';
   echo '<td style="padding-left:10px; text-align:left;">'.$active_1->colorcode.'</td>';
   
   if($active_1->exclude_attentance=='1'){
   echo '<td style="padding-left:10px;text-align:center;">'.Yes.'</td>';
   
   }elseif($active_1->exclude_attentance=='0'){
     echo '<td style="padding-left:10px;text-align:center;">'.No.'</td>';  
   }
   echo '<td>'.CHtml::link(Yii::t('students','Edit'), array('update', 'id'=>$active_1->id)).'</td>';
    echo '<td>'.CHtml::link(Yii::t('students','Delete'), array('delete', 'id'=>$active_1->id),array('confirm'=>Yii::t('students','Are you Sure?'))).'</td></tr>';
}}else{
?>
<tr><td colspan="7">No Results !</td></tr>
<?php } ?>
</table>
</div>
<br />
<h3><?php echo Yii::t('students','Inactive Leave types');?></h3>
<div class="tableinnerlist">
<table width="100%" cellpadding="0" cellspacing="0">
<tr class="pdtab-h">
	<td style="text-align:left;">Leave Type</td>
         <td>Code</td>
        <td>Label</td>
        <td>Color Code</td>
         <td>Is Excluded</td>
    <td>Edit</td>
    <td>Delete</td>
</tr>

<?php
$inactive= Studentleavetype::model()->findAll("status=:x", array(':x'=>2));
if($inactive!=NULL){
foreach($inactive as $inactive_1)
{
   echo '<tr><td style="padding-left:10px; text-align:left;">'.$inactive_1->name.'</td>';
   echo '<td style="padding-left:10px; text-align:left;">'.$inactive_1->code.'</td>';
   echo '<td style="padding-left:10px; text-align:left;">'.$inactive_1->label.'</td>';
   echo '<td style="padding-left:10px; text-align:left;">'.$inactive_1->colorcode.'</td>';
   
   if($inactive_1->exclude_attentance=='1'){
   echo '<td style="padding-left:10px;text-align:center;">'.Yes.'</td>';
   
   }elseif($inactive_1->exclude_attentance=='0'){
     echo '<td style="padding-left:10px;text-align:center;">'.No.'</td>';  
   }
   echo '<td>'.CHtml::link(Yii::t('students','Edit'), array('update', 'id'=>$inactive_1->id)).'</td>';
    echo '<td>'.CHtml::link(Yii::t('students','Delete'), array('delete', 'id'=>$inactive_1->id),array('confirm'=>Yii::t('students','Are you Sure?'))).'</td></tr>';
}}else{
?>
<tr><td colspan="7">No Results !</td></tr>
<?php } ?>
</table>
</div>

</div>
    </td>
  </tr>
</table>

<script>
    $(document).ready(function(){
        $("#student-leave-types-form").submit(function(){
            $("#btn").attr('disabled','true');
        });
    });''
    </script>