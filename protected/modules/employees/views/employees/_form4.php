<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'employees-form',
'enableAjaxValidation'=>false,
'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<?php 
	if($form->errorSummary($model)){
	?>
        <div class="errorSummary">Input Error<br />
        	<span>Please fix the following error(s).</span>
        </div>
    <?php 
	}
	?>
       
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="formCon" style="background:url(images/yellow-pattern.png); width:100%; border:0px #fac94a solid; color:#000;">
     
    </div>
    <div class="formCon">
        <div class="formConInner">
           <!-- <h3>Personal Details</h3>-->
            <table width="85%" border="0" cellspacing="0" cellpadding="0">
                <tr >
                <?php
		$criteria=new CDbCriteria;
		$criteria->condition='is_deleted=:is_del';
		$criteria->params=array(':is_del'=>0);
	?>
    <td ><div><?php echo $form->dropDownList($model,'logcategory_id',CHtml::listData(EmployeeLogCategory::model()->findAll($criteria),'id','concatened'),array('prompt' =>'select')); ?>
		<?php echo $form->error($model,'logcategory_id'); ?></div></td>
  
                 
                
                </tr>
              
                
                 <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                <tr>
                    
                    
                       <td valign="bottom"><?php echo $form->textArea($model,'description',array('size'=>25,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'description'); ?></td>  
                </tr>
                
                
                
               
             
            </table>
           <div class="row">
				<?php //echo $form->labelEx($model,'employee_id'); ?>
                <?php echo $form->hiddenField($model,'employee_id',array('value'=>$_REQUEST['id'])); ?>
                <?php echo $form->error($model,'employee_id'); ?>
            </div>
             <div class="row">
				<?php //echo $form->labelEx($model,'updated_at'); ?>
                <?php echo $form->hiddenField($model,'created_at',array('value'=>date('Y-m-d'))); ?>
                <?php echo $form->error($model,'created_at'); ?>
            </div>
           <div class="row">
				<?php //echo $form->labelEx($model,'updated_at'); ?>
                <?php echo $form->hiddenField($model,'updated_at',array('value'=>date('Y-m-d'))); ?>
                <?php echo $form->error($model,'updated_at'); ?>
            </div>
           
          
           <div class="clear"></div>
    <div style="padding:45px 0 0 0px; text-align:left">
    	<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save',array('class'=>'formbut')); ?>
    </div>
        </div>
    </div>
    
   
   <?php $this->endWidget(); ?>

