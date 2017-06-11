<!--<div class="form" style="padding-left:20px; height:auto; min-height:350px;">
<br />
<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-attendances-form',
	'enableAjaxValidation'=>true,
)); */?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php /*?><?php echo $form->errorSummary($model); ?><?php */?>

	<div class="row">
		<?php //echo $form->labelEx($model,'attendance_date'); ?>
		<?php //echo $form->hiddenField($model,'attendance_date',array('value'=>$year.'-'.$month.'-'.$day));?>
		<?php //echo $form->error($model,'attendance_date'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'employee_id'); ?>
		<?php //echo $form->hiddenField($model,'employee_id',array('value'=>$emp_id)); ?>
		<?php// echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="row">
		<?php// echo $form->labelEx($model,Yii::t('employees','employee_leave_type_id')); ?>
		<?php //echo $form->textField($model,'employee_leave_type_id'); ?>
        <?php// echo $form->dropDownList($model,'employee_leave_type_id',CHtml::listData(EmployeeLeaveTypes::model()->findAll(), 'id', 'name'),array('empty'=>'Select Type')); ?>
		<?php// echo $form->error($model,'employee_leave_type_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,Yii::t('employees','reason')); ?>
		<?php //echo $form->textField($model,'reason',array('size'=>30,'maxlength'=>255)); ?>
		<?php //echo $form->error($model,'reason'); ?>
	</div>

	<div class="row">
		<?php// echo $form->labelEx($model,Yii::t('employees','is_half_day')); ?>
		<?php //echo $form->checkBox($model,'is_half_day'); ?>
		<?php //echo $form->error($model,'is_half_day'); ?>
	</div><br />

	<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php 
		
		/*echo CHtml::ajaxSubmitButton(Yii::t('job','Save'),CHtml::normalizeUrl(array('EmployeeAttendances/Addnew','render'=>false)),array('dataType'=>'json','success'=>'js: function(data) {
					if (data.status == "success")
					{
						$("#td'.$day.$emp_id.'").text("");
						$("#jobDialog123'.$day.$emp_id.'").html("<span class=\"abs\"></span>","");
						$("#jobDialog'.$day.$emp_id.'").dialog("close");
						window.location.reload();
					}
                    }'),array('id'=>'closeJobDialog'.$day.$emp_id,'name'=>'save'));*/
		
		?>
	</div><br />

<?php// $this->endWidget(); ?>

</div>--><!-- form -->



<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/employees/left_side');?>
    
    </td>
    <td valign="top" width="96%" align="left">
    <!--<div class="cont_right formWrapper" id="demo-->
    
    


<td valign="top" width="247">
<div class="cont_right formWrapper">
<h1><?php echo Yii::t('employees','Create Payment Type');?></h1>
<div class="edit_bttns" style="top:20px; right:20px;">
<ul>
<li>
<a class="addbttn last " href="/index.php?r=fees/paymentTypes/admin">
<span>Manage</span>
</a>
</li>
</ul>
</div>
<style>

#status input
{
    float:left;
}
#status label
{
    float:left;
}
</style>
<div class="formCon">
<div class="formConInner">
<form id="fee-payment-types-form" action="/index.php?r=fees/paymentTypes/create" method="post">
<div style="display:none">
<input value="75e6b084217a8bd52c8b48b3c6c5b52bea0403e1" name="YII_CSRF_TOKEN" type="hidden">
</div>
<p class="note">
Fields with
<span class="required">*</span>
are required.
</p>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tbody>
<tr>
<td>
<label class="required" for="FeePaymentTypes_type">
Type
<span class="required">*</span>
</label>
</td>
<td>
<input id="FeePaymentTypes_type" size="60" maxlength="200" name="FeePaymentTypes[type]" type="text">
</td>
</tr>
<tr>
<td> </td>
<td> </td>
</tr>
<tr>
<td>
<label for="FeePaymentTypes_is_active">Status</label>
</td>
<td id="status">
<input id="ytFeePaymentTypes_is_active" value="" name="FeePaymentTypes[is_active]" type="hidden">
<input id="FeePaymentTypes_is_active_0" value="1" checked="checked" name="FeePaymentTypes[is_active]" type="radio">
<label for="FeePaymentTypes_is_active_0">Active</label>
<input id="FeePaymentTypes_is_active_1" value="0" name="FeePaymentTypes[is_active]" type="radio">
<label for="FeePaymentTypes_is_active_1">Inactive</label>
</td>
</tr>
<tr>
<td> </td>
<td> </td>
</tr>
<tr>
<td> </td>
<td>
<input class="formbut" name="yt0" value="Create" type="submit">
</td>
</tr>
</tbody>
</table>
</form>
</div>
</div>
</div>
</td>   