<div class="formCon">
    <div class="formConInner">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subscription-form',
	'enableAjaxValidation'=>false,
    )); 
?> 
        <table width="80%" border="0" cellspacing="0" cellpadding="0">
           <tr>
           <h3>Setup a Subscription Method</h3>
    <td><?php echo $form->labelEx($model,Yii::t('subscription','start_date')); ?></td>
   <td><div>
    <?php
			
			$date = 'dd-mm-yy';	
   				
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
   
     <td><?php echo $form->labelEx($model,Yii::t('subscription','end_date')); ?></td>
      <td><div>
    <?php
			
			$date = 'dd-mm-yy';	
   				
						$this->widget('zii.widgets.jui.CJuiDatePicker', array(
								//'name'=>'Students[admission_date]',
								'model'=>$model,
								'attribute'=>'end_date',
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
		<?php echo $form->error($model,'end_date'); ?></div></td>
   
  </tr>  
  <tr>
      <td>&nbsp;</td>
  </tr>
  <tr>
      <td><?php echo $form->checkBox($model,'is_divide_fee_by_nos',array('value' => '1', 'uncheckValue'=>'0')); ?>
		<?php echo $form->error($model,'is_divide_fee_by_nos'); ?></td>
      <td><?php echo $form->labelEx($model,Yii::t('subscription','is_divide_fee_by_nos')); ?></td>
  </tr>
  <tr>
      <td>&nbsp;</td>
  </tr>
   </table>
   <table width="80%" border="0" cellspacing="0" cellpadding="0">
 <h3>Setup a Subscription Method</h3>
  <tr>
      
      <td ><div class="cr_align" >
		
		<?php echo $form->radioButtonList($model,'subscription_type',array('1'=>'One Time'),array('checked'=>'1')); ?>
		<?php echo $form->error($model,'subscription_type'); ?>
	</div></td>
       
  </tr>
  <tr>
      <td>&nbsp;</td>
  </tr>
   </table>
          <div id="payment_types">
        	<div class="white_bx">
<div class="triangle-up"></div>
<table width="45%">
    <tr>
         <td><?php echo $form->labelEx($model,Yii::t('subscription','due_date')); ?></td>
      <td><div>
    <?php
			
			$date = 'dd-mm-yy';	
   				
						$this->widget('zii.widgets.jui.CJuiDatePicker', array(
								//'name'=>'Students[admission_date]',
								'model'=>$model,
								'attribute'=>'due_date',
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
		<?php echo $form->error($model,'due_date'); ?></div></td>
<!--        <td><label>Due Date <span class="required">*</span></label></td>
        <td>
            <input value="1" name="FeeCategories[subscription_type]" id="FeeCategories_subscription_type" type="hidden" /><input readonly="readonly" id="FeeSubscriptions_due_date_1510040568" name="FeeSubscriptions[due_date][1510040568]" type="text" />        </td>-->
    </tr>
</table>
</div>        </div>	
   <div class="row">
		<?php //echo $form->labelEx($model,'is_deleted'); ?>
		<?php echo $form->hiddenField($model,'is_deleted'); ?>
		<?php echo $form->error($model,'is_deleted'); ?>
	</div>

	<div class="row">
   
		<?php //echo $form->labelEx($model,'created_at'); ?>
   <?php     if(Yii::app()->controller->action->id == 'index')
	{
		 echo $form->hiddenField($model,'created_at',array('value'=>date('Y-m-d H:i:s'))); 
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
		<?php echo $form->hiddenField($model,'updated_at',array('value'=>date('Y-m-d H:i:s'))); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>
      
      

    </div>
 </div>
<div style="padding:0px 0 0 0px;">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save',array('class'=>'formbut')); ?>
	</div>  
 <?php $this->endWidget(); ?>   