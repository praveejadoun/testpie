<p class="note">Fields with <span class="required">*</span> are required.</p>
<div class="formCon">

<div class="formConInner">
    <?php //if(Yii::app()->controller->action->id=='create'){?>
   <!-- <h3>Enter the details of the upcoming academic year</h3>-->
    <?php //} else { ?>
    <!--<h3>Update the details of this academic year</h3>-->
    <?php //} ?>
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'examination-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	

	<?php /*?><?php echo $form->errorSummary($model); ?><?php */?>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
     <tr> <td>&nbsp;</td></tr>
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('examination','name')); ?></td>
    <td><?php echo $form->labelEx($model,Yii::t('examination','course_id')); ?></td>
    <td><?php echo $form->labelEx($model,Yii::t('examination','batch_id')); ?></td>
   

  </tr>
  <tr>
    <td><?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></td>
    <td>
        <?php echo $form->textfield($model,'course_id',array('size'=>20,'maxlength'=>255));
              echo $form->error($model,'course_id'); ?>
    </td>
     <td>
        <?php echo $form->textfield($model,'batch_id',array('size'=>20,'maxlength'=>255));
              echo $form->error($model,'batch_id'); ?>
    </td>
    
  </tr>
  <tr> <td>&nbsp;</td></tr>
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('examination','start_time')); ?></td>
    <td><?php echo $form->labelEx($model,Yii::t('examination','end_time')); ?></td>
    <td><?php echo $form->labelEx($model,Yii::t('examination','duration')); ?></td>
    
  </tr>
  <tr>
     <td><div>
    <?php
			
			$date = 'dd-mm-yy';	
   				
						$this->widget('zii.widgets.jui.CJuiDatePicker', array(
								//'name'=>'Students[admission_date]',
								'model'=>$model,
								'attribute'=>'start_time',
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
		<?php echo $form->error($model,'start_time'); ?></div></td>
    
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
							'attribute'=>'end_time',
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
		<?php echo $form->error($model,'end_time'); ?></td> 
    
    <td><?php echo $form->textfield($model,'duration',array('size'=>20,'maxlength'=>255));
              echo $form->error($model,'duration'); ?></td>
  </tr>
  
  <tr> <td>&nbsp;</td></tr>

<!--<tr>
	
    <td>	<?php echo $form->labelEx($model,Yii::t('examination','status')); ?></td></tr>
<tr><td>	<?php echo $form->dropdownlist($model,'status',array('Active'=>'Active','InActive'=>'InActive'),array('style'=>'width:100% !important;')); ?>
		<?php echo $form->error($model,'status'); ?>
    </td></tr>-->
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