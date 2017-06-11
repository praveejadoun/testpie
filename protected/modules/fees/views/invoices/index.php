<?php
$this->breadcrumbs=array(
	'Fees'=>array(''),
	'Invoices',
);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/employees/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    <h1><?php echo Yii::t('employees','Manage Invoices');?></h1>
    <div class="overview" style="padding-top:0px;">
<div class="overviewbox ovbox1" style="margin-left:0px;">
<h1>
<strong>Total Fee Categories</strong>
</h1>
<div class="ovrBtm"> 11 </div>
</div>
<div class="overviewbox ovbox2">
<h1><strong>Invoices Generated For</strong></h1>
<div class="ovrBtm"> 6 </div>
</div>
<div class="clear"></div>
</div>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="formCon">
<div class="formConInner">
    <h3>Search Invoices</h3>
<div class="form">
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-leave-types-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>

	

	<?php /*?><?php echo $form->errorSummary($model); ?><?php */?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
       <td><?php echo $form->labelEx($model,Yii::t('employees','Fee Category'),array('style'=>'float:left')); ?></td>
       <td><?php echo $form->labelEx($model,Yii::t('employees','InvoiceID'),array('style'=>'float:left')); ?></td>
       <td><?php echo $form->labelEx($model,Yii::t('employees','Receipt Name'),array('style'=>'float:left')); ?></td>
  </tr>
  
  <tr>
       <td><?php echo $form->dropdownlist($model,'name',array('M'=>15,'F'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></td>
      
    
    <td><?php echo $form->textField($model,'name',array('size'=>15,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></td>
    
    <td><?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></td>

    
  </tr> 
 
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
      <td><?php echo $form->labelEx($model,Yii::t('employees','Course'),array('style'=>'float:left')); ?></td>
      
       <td><?php echo $form->labelEx($model,Yii::t('employees','Batch'),array('style'=>'float:left')); ?></td>
       <td><?php echo $form->labelEx($model,Yii::t('employees','Status'),array('style'=>'float:left')); ?></td>
       <td><?php echo $form->labelEx($model,Yii::t('employees','Invoice Date'),array('style'=>'float:left')); ?></td>

  </tr>
  <tr>
      <td><?php echo $form->dropdownlist($model,'name',array('M'=>30,'F'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></td>
      <td><?php echo $form->dropdownlist($model,'name',array('M'=>30,'F'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></td>
      <td><?php echo $form->dropdownlist($model,'name',array('M'=>30,'F'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></td>
   
    <td><?php echo $form->textField($model,'max_leave_count',array('size'=>15,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'max_leave_count'); ?></td>
  </tr>
  <!--<tr>
    <td colspan="2" class="cr_align">
		<?php echo $form->checkBox($model,Yii::t('employees','carry_forward')); ?>
		<?php echo $form->error($model,'carry_forward'); ?>
        <?php echo $form->labelEx($model,'carry_forward'); ?>
        </td>
    
  </tr>
   <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
  	<td><?php echo $form->labelEx($model,Yii::t('employees','status'),array('style'=>'float:left')); ?>
    </td>
     <td colspan="3" class="cr_align"><?php echo $form->radioButtonList($model,'status',array('1'=>'Active','2'=>'Inactive'),array('separator'=>' ')); ?>
     <?php echo $form->error($model,'status'); ?></td>
  </tr-->
</table>

	<div class="clear"></div>
<br />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formbut')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>
<!--<h3><?php echo Yii::t('employees','Active Leave types');?></h3>-->
<!--<div class="tableinnerlist">
<table width="100%" cellpadding="0" cellspacing="0">
<tr class="pdtab-h">
	<td style="text-align:left;">Leave Type</td>
    <td>Edit</td>
    <td>Delete</td>
</tr>


<?php
$active=EmployeeLeaveTypes::model()->findAll("status=:x", array(':x'=>1));
foreach($active as $active_1)
{
   echo '<tr><td style="padding-left:10px; text-align:left;">'.$active_1->name.'</td>';	
   echo '<td>'.CHtml::link(Yii::t('employees','Edit'), array('update', 'id'=>$active_1->id)).'</td>';
    echo '<td>'.CHtml::link(Yii::t('employees','Delete'), array('delete', 'id'=>$active_1->id),array('confirm'=>Yii::t('employees','Are you Sure?'))).'</td></tr>';
}
?>
</table>
</div>-->
<!--<br />-->
<!--<h3><?php echo Yii::t('employees','Inactive Leave types');?></h3>-->
<!--<div class="tableinnerlist">
<table width="100%" cellpadding="0" cellspacing="0">
<tr class="pdtab-h">
	<td style="text-align:left;">Leave Type</td>
    <td>Edit</td>
    <td>Delete</td>
</tr>

<?php
$inactive=EmployeeLeaveTypes::model()->findAll("status=:x", array(':x'=>2));
foreach($inactive as $inactive_1)
{
   echo '<tr><td style="padding-left:10px; text-align:left;">'.$inactive_1->name.'</td>';	
   echo '<td>'.CHtml::link(Yii::t('employees','Edit'), array('update', 'id'=>$inactive_1->id)).'</td>';
    echo '<td>'.CHtml::link(Yii::t('employees','Delete'), array('delete', 'id'=>$inactive_1->id),array('confirm'=>Yii::t('employees','Are you Sure?'))).'</td></tr>';
}
?>
</table>
</div>-->
<div class="pdtab_Con" style="width:100%; padding-top:0px;">
<form id="invoices-form" action="/index.php?r=fees/invoices" method="post">
<div style="display:none">
<input value="c9c05516cf746dacd9255d1779fb178844631a45" name="YII_CSRF_TOKEN" type="hidden">
</div>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tbody>
<tr class="pdtab-h">
<td>
<input id="check-all" value="1" name="check-all" type="checkbox">
</td>
<td align="center" height="18">Invoice ID</td>
<td align="center">Recipient</td>
<td align="center" height="18">Fee Category</td>
<td align="center">Amount</td>
<td align="center">Balance</td>
<td align="center">Status</td>
<td align="center">Actions</td>
</tr>
<tr>
<td>
<input id="invoice-check" class="invoice-check" value="252" name="invoice-check[]" type="checkbox">
</td>
<td align="center">252</td>
<td align="center">
<a href="/index.php?r=students/students/view&id=135">SdS SADSA</a>
</td>
<td align="center">Admission fees</td>
<td align="center"> 200.00 </td>
<td align="center"> 200.00 </td>
<td align="center"> Unpaid </td>
<td align="center">
<a href="/index.php?r=fees/invoices/view&id=252">View</a>
</td>
</tr>
<tr>
<td>
<input id="invoice-check" class="invoice-check" value="249" name="invoice-check[]" type="checkbox">
</td>
<td align="center">249</td>
<td align="center">
<a href="/index.php?r=students/students/view&id=132">Isaac Dagwom</a>
</td>
<td align="center">Admission fees</td>
<td align="center"> 200.00 </td>
<td align="center"> 200.00 </td>
<td align="center"> Unpaid </td>
<td align="center">
<a href="/index.php?r=fees/invoices/view&id=249">View</a>
</td>
</tr>
<tr>
<td>
<input id="invoice-check" class="invoice-check" value="248" name="invoice-check[]" type="checkbox">
</td>
<td align="center">248</td>
<td align="center">
<a href="/index.php?r=students/students/view&id=131">David Israel Tito Geldres</a>
</td>
<td align="center">Admission fees</td>
<td align="center"> 200.00 </td>
<td align="center"> 200.00 </td>
<td align="center"> Unpaid </td>
<td align="center">
<a href="/index.php?r=fees/invoices/view&id=248">View</a>
</td>
</tr>
<tr>
<td>
<input id="invoice-check" class="invoice-check" value="248" name="invoice-check[]" type="checkbox">
</td>
<td align="center">248</td>
<td align="center">
<a href="/index.php?r=students/students/view&id=131">David Israel Tito Geldres</a>
</td>
<td align="center">Admission fees</td>
<td align="center"> 200.00 </td>
<td align="center"> 200.00 </td>
<td align="center"> Unpaid </td>
<td align="center">
<a href="/index.php?r=fees/invoices/view&id=248">View</a>
</td>
</tr>
<tr>
<td>
<input id="invoice-check" class="invoice-check" value="248" name="invoice-check[]" type="checkbox">
</td>
<td align="center">248</td>
<td align="center">
<a href="/index.php?r=students/students/view&id=131">David Israel Tito Geldres</a>
</td>
<td align="center">Admission fees</td>
<td align="center"> 200.00 </td>
<td align="center"> 200.00 </td>
<td align="center"> Unpaid </td>
<td align="center">
<a href="/index.php?r=fees/invoices/view&id=248">View</a>
</td>
</tr>
<tr>
<td>
<input id="invoice-check" class="invoice-check" value="248" name="invoice-check[]" type="checkbox">
</td>
<td align="center">248</td>
<td align="center">
<a href="/index.php?r=students/students/view&id=131">David Israel Tito Geldres</a>
</td>
<td align="center">Admission fees</td>
<td align="center"> 200.00 </td>
<td align="center"> 200.00 </td>
<td align="center"> Unpaid </td>
<td align="center">
<a href="/index.php?r=fees/invoices/view&id=248">View</a>
</td>
</tr>
<tr>
<td>
<input id="invoice-check" class="invoice-check" value="248" name="invoice-check[]" type="checkbox">
</td>
<td align="center">248</td>
<td align="center">
<a href="/index.php?r=students/students/view&id=131">David Israel Tito Geldres</a>
</td>
<td align="center">Admission fees</td>
<td align="center"> 200.00 </td>
<td align="center"> 200.00 </td>
<td align="center"> Unpaid </td>
<td align="center">
<a href="/index.php?r=fees/invoices/view&id=248">View</a>
</td>
</tr>
<tr>
<td>
<input id="invoice-check" class="invoice-check" value="248" name="invoice-check[]" type="checkbox">
</td>
<td align="center">248</td>
<td align="center">
<a href="/index.php?r=students/students/view&id=131">David Israel Tito Geldres</a>
</td>
<td align="center">Admission fees</td>
<td align="center"> 200.00 </td>
<td align="center"> 200.00 </td>
<td align="center"> Unpaid </td>
<td align="center">
<a href="/index.php?r=fees/invoices/view&id=248">View</a>
</td>
</tr>
<tr>
<td>
<input id="invoice-check" class="invoice-check" value="248" name="invoice-check[]" type="checkbox">
</td>
<td align="center">248</td>
<td align="center">
<a href="/index.php?r=students/students/view&id=131">David Israel Tito Geldres</a>
</td>
<td align="center">Admission fees</td>
<td align="center"> 200.00 </td>
<td align="center"> 200.00 </td>
<td align="center"> Unpaid </td>
<td align="center">
<a href="/index.php?r=fees/invoices/view&id=248">View</a>
</td>
</tr>
</div>
    </td>
    
  </tr>
  
  
</table>
    <div>
 <ul id="yw2" class="pages">
<li class="first hidden">
<a href="/index.php?r=fees/invoices/index"><< First</a>
</li>
<li class="previous hidden">
<a href="/index.php?r=fees/invoices/index">< Previous</a>
</li>
<li class="page selected">
<a href="/index.php?r=fees/invoices/index">1</a>
</li>
<li class="page">
<a href="/index.php?r=fees/invoices/index&page=2">2</a>
</li>
<li class="page">
<a href="/index.php?r=fees/invoices/index&page=3">3</a>
</li>
<li class="page">
<a href="/index.php?r=fees/invoices/index&page=4">4</a>
</li>
<li class="page">
<a href="/index.php?r=fees/invoices/index&page=5">5</a>
</li>
<li class="next">
<a href="/index.php?r=fees/invoices/index&page=2">Next ></a>
</li>
<li class="last">
<a href="/index.php?r=fees/invoices/index&page=10">Last >></a>
</li>
</ul>   
</div>       
        
        
        
        
    
    
    
    
    