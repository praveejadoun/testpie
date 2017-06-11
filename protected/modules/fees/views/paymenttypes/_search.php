<!--<div class="wide form">

<?php/* $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); */?>

	<div class="row">
		<?php //echo $form->label($model,'id'); ?>
		<?php //echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php// echo $form->label($model,'attendance_date'); ?>
		<?php// echo $form->textField($model,'attendance_date'); ?>
	</div>

	<div class="row">
		<?php// echo $form->label($model,'employee_id'); ?>
		<?php// echo $form->textField($model,'employee_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'employee_leave_type_id'); ?>
		<?php// echo $form->textField($model,'employee_leave_type_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'reason'); ?>
		<?php //echo $form->textField($model,'reason',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'is_half_day'); ?>
		<?php //echo $form->textField($model,'is_half_day'); ?>
	</div>

	<div class="row buttons">
		<?php //echo CHtml::submitButton('Search'); ?>
	</div>

<?php// $this->endWidget(); ?>

</div><!-- search-form -->


<td valign="top" width="247">
<div class="cont_right formWrapper">
<h1>Payment Types</h1>
<div class="edit_bttns" style="top:20px; right:20px;">
<ul>
<li>
<a class="addbttn last " href="/index.php?r=fees/paymentTypes/create">
<span>Create</span>
</a>
</li>
</ul>
</div>
<div id="fee-payment-types-grid" class="grid-view">
<div class="summary">Displaying 1-3 of 3 result(s).</div>
<table class="items">
<thead>
<tr>
<th id="fee-payment-types-grid_c0">
<a href="/index.php?r=fees/paymentTypes/admin&FeePaymentTypes_sort=type">Type</a>
</th>
<th id="fee-payment-types-grid_c1">
<a href="/index.php?r=fees/paymentTypes/admin&FeePaymentTypes_sort=created_by">Created By</a>
</th>
<th id="fee-payment-types-grid_c2">
<a href="/index.php?r=fees/paymentTypes/admin&FeePaymentTypes_sort=created_at">Created At</a>
</th>
<th id="fee-payment-types-grid_c3">
<a href="/index.php?r=fees/paymentTypes/admin&FeePaymentTypes_sort=is_active">Status</a>
</th>
<th id="fee-payment-types-grid_c4" class="button-column"> </th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td>Cash</td>
<td>Admin Administrator</td>
<td>22 Jan 2016</td>
<td>Active</td>
<td class="button-column">
<a class="update" title="Update" href="/index.php?r=fees/paymentTypes/update&id=2">
<img src="/assets/ec0886f6/gridview/update.png" alt="Update">
</a>
<a class="delete" title="Delete" href="/index.php?r=fees/paymentTypes/delete&id=2">
<img src="/assets/ec0886f6/gridview/delete.png" alt="Delete">
</a>
</td>
</tr>
<tr class="even">
<td>Cheque</td>
<td>Admin Administrator</td>
<td>10 Feb 2016</td>
<td>Active</td>
<td class="button-column">
<a class="update" title="Update" href="/index.php?r=fees/paymentTypes/update&id=3">
<img src="/assets/ec0886f6/gridview/update.png" alt="Update">
</a>
<a class="delete" title="Delete" href="/index.php?r=fees/paymentTypes/delete&id=3">
<img src="/assets/ec0886f6/gridview/delete.png" alt="Delete">
</a>
</td>
</tr>
<tr class="odd">
<td>money</td>
<td>Admin Administrator</td>
<td>17 Apr 2017</td>
<td>Active</td>
<td class="button-column">
<a class="update" title="Update" href="/index.php?r=fees/paymentTypes/update&id=4">
<img src="/assets/ec0886f6/gridview/update.png" alt="Update">
</a>
<a class="delete" title="Delete" href="/index.php?r=fees/paymentTypes/delete&id=4">
<img src="/assets/ec0886f6/gridview/delete.png" alt="Delete">
</a>
</td>
</tr>
</tbody>
</table>
<div class="keys" style="display:none" title="/index.php?r=fees/paymentTypes/admin">
<span>2</span>
<span>3</span>
<span>4</span>
</div>
</div>
</div>
</td>