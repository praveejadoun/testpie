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
                <tr>
                <td valign="bottom" ><?php echo $form->labelEx($model,Yii::t('employees','Achievement Title <span class="required">*</span>')); ?></td>
                <td>&nbsp;</td>
                 <td valign="bottom"><?php echo $form->textField($model,'achievement_title',array('size'=>30,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'achievement_title'); ?></td>
                
                </tr>
              
                
                 <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                <tr>
                     <td valign="bottom"><?php echo $form->labelEx($model,Yii::t('employees','Description <span class="required">*</span>')); ?></td>
                       <td>&nbsp;</td>
                       <td valign="bottom"><?php echo $form->textArea($model,'achievement_description',array('size'=>25,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'achievement_description'); ?></td>  
                </tr>
                
                
                
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                <tr>
                <td valign="botttom"><?php echo $form->labelEx($model,Yii::t('employees','Document Name <span class="required">*</span>')); ?></td>
                <td>&nbsp;</td>
                 <td style="float:left;    margin: 37px 0px -28px -130px;"><?php echo $form->textField($model,'achievement_document_name',array('size'=>30,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'achievement_document_name'); ?>
	<?php 
		
		
		if($model->isNewRecord)
		{
			echo $form->fileField($model,'achievdoc_data'); 
		    echo $form->error($model,'achievdoc_data'); 
		}
		else
		{
			if($model->achievdoc_data==NULL)
			{
				echo $form->fileField($model,'achievdoc_data'); 
		        echo $form->error($model,'achievdoc_data'); 
			}
			
			
		}
		
		 ?>
        
        </td>
  </tr>
                 
             
            </table>
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
           <div class="row">
		<?php //echo $form->labelEx($model,'document_file_size'); ?>
		<?php echo $form->hiddenField($model,'achievdoc_file_size'); ?>
		<?php echo $form->error($model,'achievdoc_file_size'); ?>
	</div>
            <div class="row">
		<?php //echo $form->labelEx($model,'document_file_size'); ?>
		<?php echo $form->hiddenField($model,'employee_id',array('value'=>$_REQUEST['id'])); ?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>
          
           <div class="clear"></div>
    <div style="padding:45px 0 0 0px; text-align:left">
    	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create »' : 'Save',array('class'=>'formbut')); ?>
    </div>
        </div>
    </div>
    
   
   <?php $this->endWidget(); ?>
