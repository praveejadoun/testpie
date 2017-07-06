<div class="captionWrapper">
	<ul>
            <li><h2  ><a href="/sms/index.php?r=employees/employees/update&id=<?php echo $_REQUEST['id']?>">Employee Details</a></h2></li>
            <li><h2><a href="/sms/index.php?r=employees/employees/update2&id=<?php echo $_REQUEST['id']?>">Employee Contact Details</a></h2></li>
            <li><h2 class="cur"><a href="#">Employee Documents</a></h2></li>
    </ul>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employeeDocument-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    
));
?>


	<?php if($form->errorSummary($model)){; ?>

    
    <div class="errorSummary">Input Error<br />
    <span>Please fix the following error(s).</span>
    </div>
    
    <?php  } ?>
    
<p class="note">Fields with <span class="required">*</span> are required.</p>
<div class="formCon" style=" background:#EDF1D1; border:0px #c4da9b solid; color:#393; background:#EDF1D1 url(images/green-bg.png); border:0px #c4da9b solid; color:#393;  ">

<div class="formConInner" style="padding:10px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="bottom" style="padding-bottom:3px;"><?php echo $form->labelEx($model,Yii::t('employeeDocument','document_name')); ?></td>
   
  </tr>
  <tr>
    <td valign="top" width="45%"><?php echo $form->textField($model,'document_name',array('size'=>32,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'document_name'); ?></td>
    
  </tr>	
  <div class="row">
		<?php //echo $form->labelEx($model,'course_id'); 
		?>
		<?php echo $form->hiddenField($model,'employee_id',array('value'=>$val1)); ?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>
  <tr>
    <td></td>
    <td> </td>
    <td ><?php 
	if($model->document_data==NULL)
	{
	echo $form->labelEx($model,'upload_Document');
	}
	else
	{
	echo $form->labelEx($model,'Document');	
	}
	
	 ?>
		</td>
    <td>
	<?php 
		
		
		if($model->isNewRecord)
		{
			echo $form->fileField($model,'document_data'); 
		    echo $form->error($model,'document_data'); 
		}
		else
		{
			if($model->document_data==NULL)
			{
				echo $form->fileField($model,'document_data'); 
		        echo $form->error($model,'document_data'); 
			}
			
			else
			{
				if(Yii::app()->controller->action->id=='update') {
					echo CHtml::link(Yii::t('students','Remove'), array('Employees/remove', 'id'=>$model->id),array('confirm'=>'Are you sure?')); 
					echo '<img class="imgbrder" src="'.$this->createUrl('Employees/DisplaySavedImage&id='.$model->primaryKey).'" alt="'.$model->document_file_name.'" width="100" height="100" />';	
				}
				else if(Yii::app()->controller->action->id=='create') {
					echo CHtml::hiddenField('document_file_name',$model->document_file_name);
					echo CHtml::hiddenField('document_content_type',$model->document_content_type);
					echo CHtml::hiddenField('document_file_size',$model->document_file_size);
					echo CHtml::hiddenField('document_data',bin2hex($model->document_data));
					echo '<img class="imgbrder" src="'.$this->createUrl('Employees/DisplaySavedImage&id='.$model->primaryKey).'" alt="'.$model->document_file_name.'" width="100" height="100" />';
				}
			}
		}
		
		 ?>
        
        </td>
  </tr>

</table>
<div class="row">
		<?php //echo $form->labelEx($model,'document_file_size'); ?>
		<?php echo $form->hiddenField($model,'document_file_size'); ?>
		<?php echo $form->error($model,'document_file_size'); ?>
	</div>

</div>
</div>
<div class="clear"></div>
	<div style="padding:0px 0 0 0px; text-align:left">
	
		<?php echo CHtml::Button($model->isNewRecord ? 'Add Another' : 'Save',array('class'=>'formbut')); ?>
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Next Step »' : 'Save',array('class'=>'formbut')); ?>

        </div>


</div>
</div><!-- form -->
<?php $this->endWidget(); ?>
<script type="text/javascript">
	function star(){
		var year = '';
		var year_val = '';
		year = document.getElementById('experience_year');
		year_val = year.options[year.selectedIndex].value;
		if(year_val!='' && year_val!=0){
			//alert(year_val);
			document.getElementById('required').style.visibility='visible';
		}
	}
	function star2(){
		var mnth = '';
		var mnth_val = '';
		mnth = document.getElementById('experience_month');
		mnth_val = mnth.options[mnth.selectedIndex].value;
		if(mnth_val!='' && mnth_val!=0){
			//alert(year_val);
			document.getElementById('required').style.visibility='visible';
		}
	}
</script>