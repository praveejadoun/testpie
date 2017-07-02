<?php //if(!Yii::app()->controller->action->id=='update_1') { ?>


<?php// } ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guardians-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php //echo $form->errorSummary($model) ?>
   
<p class="note">Fields with <span class="required">*</span> are required.

</p>


<div class="formCon" >

<div class="formConInner">
<h3>Parent - Contact Details</h3>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('students','email')); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $form->labelEx($model,Yii::t('students','mobile_phone')); ?></td>
    
  </tr>
  <tr>
    <td><?php echo $form->textField($model,'email',array('size'=>35,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $form->textField($model,'mobile_phone',array('size'=>21,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'mobile_phone'); ?></td>
    
  </tr>
   <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  
 
</table>

<div style="padding:5px 0 0 0px; text-align:left">
    	<?php echo CHtml::submitButton($model->isNewRecord ? 'Parent Details »' : 'Save',array('class'=>'formbut')); ?>
    </div>	  

	<div class="row">
		<?php //echo $form->labelEx($model,'created_at'); ?>
         <?php  if(Yii::app()->controller->action->id == 'create')
		{
		 echo $form->hiddenField($model,'created_at',array('value'=>date('Y-m-d')));
		}
		else
		{
		  echo $form->hiddenField($model,'created_at');
		}
		?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->hiddenField($model,'updated_at',array('value'=>date('Y-m-d'))); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>

	
</div>
</div><!-- form -->
<div class="clear"></div>
<?php
if($guardian_id)
{
	$display_existing = 'display:block;';
	$display_new = 'display:none;';
}
else
{
	$display_existing = 'display:none;';
	$display_new = 'display:block;';
}
?>

<div id="new_guardian" style="padding:0px 0 0 0px; text-align:left; <?php echo $display_new; ?>">
		<?php 
		
			//echo 'hi';
			//echo CHtml::submitButton($model->isNewRecord ? 'Emergency Contact »' : 'Save',array('class'=>'formbut')); 
		
		?>
</div>
<div id="existing_guardian" style="padding:0px 0 0 0px; text-align:left; <?php echo $display_existing; ?>">
		<?php 
		
			//echo $guardian_id;
			//echo CHtml::submitButton('Emergency Contact »',array('submit' =>CController::createUrl('/students/guardians/update',array('id'=>$guardian_id,'sid'=>$_REQUEST['id'])),'class'=>'formbut')); 
		?>
</div>

<?php $this->endWidget(); ?>