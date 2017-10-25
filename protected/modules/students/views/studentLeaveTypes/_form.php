<div class="formCon">

<div class="formConInner">

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-leave-types-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('students','name')); ?></td>
    <td><?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></td>
  
    <td><?php echo $form->labelEx($model,Yii::t('students','code')); ?></td>
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
    <td><?php echo $form->labelEx($model,Yii::t('students','label')); ?></td>
    <td><?php echo $form->textField($model,'label',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'label'); ?></td>
    
    <td><?php echo $form->labelEx($model,Yii::t('students','colorcode'),array('style'=>'float:left')); ?></td>
    <td><?php echo $form->textField($model,'colorcode',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'colorcode'); ?></td>
 
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
        <div class="row">
                <?php echo $form->hiddenField($model,'created_at',array('value'=>date('Y-m-d')));
		echo $form->error($model,'created_at'); ?> 
            </div>
        
        <div class="row">
             <?php echo $form->hiddenField($model,'updated_at',array('value'=>date('Y-m-d')));
		echo $form->error($model,'updated_at'); ?>
        </div>
        
	<div class="clear"></div>

	<div style="padding:20px 0 0 0px;">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formbut')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>