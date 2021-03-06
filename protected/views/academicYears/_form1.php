<p class="note">Fields with <span class="required">*</span> are required.</p>
<div class="formCon">

<div class="formConInner">
    <?php if(Yii::app()->controller->action->id=='create'){?>
    <h3>Enter the details of the upcoming academic year</h3>
    <?php } else { ?>
    <h3>Update the details of this academic year</h3>
    <?php } ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'academic-years-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php /*?><?php echo $form->errorSummary($model); ?><?php */?>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
     <tr> <td>&nbsp;</td></tr>
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('academicYears','name')); ?></td>
    <td><?php echo $form->labelEx($model,Yii::t('academicYears','start_date')); ?></td>
    <td><?php echo $form->labelEx($model,Yii::t('academicYears','end_date')); ?></td>

  </tr>
  <tr>
    <td><?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></td>
    
     <td><div>
    <?php
			
			$date = 'yy-mm-dd';	
   				
						$this->widget('zii.widgets.jui.CJuiDatePicker', array(
								//'name'=>'Students[admission_date]',
								'model'=>$model,
								'attribute'=>'start_date',
								// additional javascript options for the date picker plugin
								'options'=>array(
									'showAnim'=>'fold',
									'dateFormat'=>$date,
									'changeMonth'=> true,
									'changeYear'=>true,
									'yearRange'=>'1900:2030'
								),
								'htmlOptions'=>array(
									'style'=>'height:20px;'
								),
							));
    ?>
		<?php echo $form->error($model,'start_date'); ?></div></td>
    
    <td><?php 
			/*$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
	if($settings!=NULL)
	{
		$date=$settings->dateformat;
		
		
	}
	else*/
	$date = 'yy-mm-dd';	
	//echo $form->textField($model,'joining_date',array('size'=>30,'maxlength'=>255));
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
							//'name'=>'Employees[joining_date]',
							'attribute'=>'end_date',
							'model'=>$model,
							
							// additional javascript options for the date picker plugin
							'options'=>array(
								'showAnim'=>'fold',
								'dateFormat'=>$date,
								'changeMonth'=> true,
									'changeYear'=>true,
									'yearRange'=>'1970:2030'
							),
							'htmlOptions'=>array(
								//'style'=>'height:20px;'
								//'value' => date('m-d-y'),
							),
						))
	
	 ?>
		<?php echo $form->error($model,'end_date'); ?></td>
  </tr>
  <tr> <td>&nbsp;</td></tr>
   
  <tr>
       <td><?php echo $form->labelEx($model,Yii::t('academicYears','description')); ?></td>
  </tr>
  <tr>
 
        <td><?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>48)); ?>
		<?php echo $form->error($model,'description'); ?></td>
    
  </tr>
  <tr> <td>&nbsp;</td></tr>

<tr>
	
    <td>	<?php echo $form->labelEx($model,Yii::t('academicYears','status')); ?></td></tr>
<tr><td>	<?php echo $form->dropdownlist($model,'status',array('0'=>'Active','1'=>'InActive'),array('style'=>'width:100% !important;')); ?>
		<?php echo $form->error($model,'status'); ?>
    </td></tr>
</table>
    <div class="row">
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

	<div style="padding-top:20px;">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formbut')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->