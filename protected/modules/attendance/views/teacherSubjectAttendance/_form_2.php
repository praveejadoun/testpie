    <div class="form"  style="padding-left:20px; height:auto; min-height:350px;">
<br />
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-subjectwise-attendances-form',
	'enableAjaxValidation'=>true,
         
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php /*?><?php echo $form->errorSummary($model); ?><?php */?>

	<div class="row">
		<?php //echo $form->labelEx($model,'attendance_date'); ?>
		<?php echo $form->hiddenField($model,'attendance_date',array('value'=>$year.'-'.$month.'-'.$day));?>
		<?php echo $form->error($model,'attendance_date'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'employee_id'); ?>
		<?php echo $form->hiddenField($model,'employee_id',array('value'=>$emp_id)); ?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>
        
         <div class="row">
		<?php //echo $form->labelEx($model,'class_timing_id'); ?>
		<?php  echo $form->hiddenField($model,'class_timing_id',array('value'=>$_REQUEST['c_t_id'])); ?>
		<?php //echo $form->error($model,'class_timing_id'); ?>
	</div>
        <div class="row">
        <?php echo $form->hiddenField($model,'batch_id',array('value'=>$_REQUEST['batch_id']));?>
        <?php echo $form->hiddenField($model,'weekday_id',array('value'=>$_REQUEST['weekday_id']));?>
            
        </div>
	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('employees','employee_leave_type_id')); ?>
		<?php //echo $form->textField($model,'employee_leave_type_id'); ?>
        <?php echo $form->dropDownList($model,'employee_leave_type_id',CHtml::listData(EmployeeLeaveTypes::model()->findAll(), 'id', 'name'),array('empty'=>'Select Type')); ?>
		<?php echo $form->error($model,'employee_leave_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('employees','reason')); ?>
		<?php echo $form->textField($model,'reason',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'reason' ); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('employees','is_half_day')); ?>
		<?php echo $form->checkBox($model,'is_half_day'); ?>
		<?php echo $form->error($model,'is_half_day'); ?>
	</div><br />

	<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php 
		
		echo CHtml::ajaxSubmitButton(Yii::t('job','Save'),CHtml::normalizeUrl(array('teacherSubjectAttendance/Addnew','render'=>false)),array('dataType'=>'json','success'=>'js: function(data) {
					 $("#AjaxLoader").hide();
                                        if (data.status == "success")
					{
						$("#td").text("");
						$("#jobDialog").html("<span class=\"abs\"></span>","");
						$("#jobDialog").dialog("close");
						window.location.reload();
					}
                    }',
                    'beforeSend'=>'function(){
                $(\'body\').undelegate(\'#submit\', \'click\');
                $("#AjaxLoader").show();
            }'
                    ),array('id'=>'closejobDialog','name'=>'save'));
		
		?>
	</div><br />

<?php $this->endWidget(); ?>

</div><!-- form -->