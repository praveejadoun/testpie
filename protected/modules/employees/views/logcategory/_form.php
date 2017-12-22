<div class="formCon">

<div class="formConInner">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-log-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    
));
?>
 <?php if($form->errorSummary($model)){; ?>

    
    <div class="errorSummary">Input Error<br />
    <span>Please fix the following error(s).</span>
    </div>
    
    <?php  } ?> 
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <table width="75%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('Courses','name')); ?></td>
    <td><?php echo $form->textField($model,'name',array('size'=>40,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    </table>
   
   <div class="row">
		<?php //echo $form->labelEx($model,'is_deleted'); ?>
		<?php echo $form->hiddenField($model,'is_deleted'); ?>
		<?php echo $form->error($model,'is_deleted'); ?>
	</div>

	<div class="row">
   
		<?php //echo $form->labelEx($model,'created_at'); ?>
   <?php     if(Yii::app()->controller->action->id == 'create')
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
 <div style="padding:0px 0 0 0px; text-align:left">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('class'=>'formbut','id' => 'btn', 'name' => 'bbtn', 'title' => 'Save')); ?>
	</div>
	<?php $this->endWidget(); ?>
<script>
    $(document).ready(function(){
        $("#employee-log-form").submit(function(){
            $("#btn").attr('disabled','true');
        });
    });''
    </script>
	