<p class="note">Fields with <span class="required">*</span> are required.</p>
<div class="formCon">

<div class="formConInner">
    <h3>Enter the details of the upcoming academic year</h3>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'academic-years-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php /*?><?php echo $form->errorSummary($model); ?><?php */?>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
     <tr> <td>&nbsp;</td></tr>
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('academicYears','name')); ?></td>
    <td><?php echo $form->labelEx($model,Yii::t('academicYears','Start Date')); ?></td>
    <td><?php echo $form->labelEx($model,Yii::t('academicYears','End Date')); ?></td>

  </tr>
  <tr>
    <td><?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></td>
    
     <td><?php 
			$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
	if($settings!=NULL)
	{
		$date=$settings->dateformat;
		
		
	}
	else
	$date = 'dd-mm-yy';	
	//echo $form->textField($model,'joining_date',array('size'=>30,'maxlength'=>255));
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
							//'name'=>'Employees[joining_date]',
							'attribute'=>'start_date',
							'model'=>$model,
							
							// additional javascript options for the date picker plugin
							'options'=>array(
								'showAnim'=>'fold',
								'dateFormat'=>$date,
								'changeMonth'=> true,
									'changeYear'=>true,
									'yearRange'=>'1970:'
							),
							'htmlOptions'=>array(
								//'style'=>'height:20px;'
								//'value' => date('m-d-y'),
							),
						))
	
	 ?>
		<?php echo $form->error($model,'start_date'); ?></td>
    
    <td><?php 
			$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
	if($settings!=NULL)
	{
		$date=$settings->dateformat;
		
		
	}
	else
	$date = 'dd-mm-yy';	
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
									'yearRange'=>'1970:'
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
       <td><?php echo $form->labelEx($model,Yii::t('academicYears','Description')); ?></td>
  </tr>
  <tr>
 
        <td><?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>48)); ?>
		<?php echo $form->error($model,'description'); ?></td>
    
  </tr>
</table>


	<div class="row">
		<?php //echo $form->labelEx($model,'status'); ?>
		<?php echo $form->hiddenField($model,'status',array('value'=>1)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div style="padding-top:20px;">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formbut')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->