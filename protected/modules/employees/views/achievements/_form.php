<?php 
/*if(Yii::app()->controller->action->id=='create') 
{
	$config=Configurations::model()->findByPk(7);
	$adm_no='';
	$adm_no_1 = '';
	if($config->config_value==1)
	{
		$adm_no	= Students::model()->findAll(array('order' => 'id DESC','limit' => 1));
		$adm_no_1=$adm_no[0]['id']+1;
	} */
	?>
	<!--<div class="captionWrapper">
        <ul>
            <li><h2 class="cur">Student Details</h2></li>
            <li><h2>Parent Details</h2></li>
            <li><h2>Emergency Contact</h2></li>
            <li><h2>Previous Details</h2></li>
            <li class="last"><h2>Student Profile</h2></li>
        </ul>
	</div> -->
<?php  
/*}
else
{
	echo '<br><br>';
	$adm_no	= Students::model()->findByAttributes(array('id' => $_REQUEST['id']));
	$adm_no_1 = $adm_no->admission_no;
} */
?>

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
                 <td style="float:left;    margin: 37px 0px -28px -181px;"><?php echo $form->textField($model,'achievement_document_name',array('size'=>30,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'achievement_document_name'); ?></td>
               
                <td> 
                         <div class="bttns_addstudent"style="-webkit-box-shadow: none;box-shadow: none;">   
                      <ul>
                        	<li><?php echo CHtml::link(Yii::t('employees','Download'), array('create'),array('class'=>'addbttn last','style'=>'margin: 57px 0px 0px -57px;')); ?></li>
                                <li><?php echo CHtml::link(Yii::t('employees','Remove'),array('deleteall',id=>$list),array('class'=>'addbttn last','style'=>'margin: 57px 0px 0px -57px;','confirm'=>'Are you sure you want to delete this?')); ?></li>

                      </ul>
                         </div>
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
			
			else
			{
				if(Yii::app()->controller->action->id=='update') {
					echo CHtml::link(Yii::t('Employees','Remove'), array('remove', 'id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?')); 
					//echo '<img class="imgbrder" src="'.$this->createUrl('Employees/DisplaySavedImage&id='.$model->primaryKey).'" alt="'.$model->achievdoc_file_name.'" width="100" height="100" />';	
				}
				else if(Yii::app()->controller->action->id=='create') {
					echo CHtml::hiddenField('achievdoc_file_name',$model->achievdoc_file_name);
					echo CHtml::hiddenField('achievdoc_content_type',$model->achievdoc_content_type);
					echo CHtml::hiddenField('achievdoc_file_size',$model->achievdoc_file_size);
					echo CHtml::hiddenField('achievdoc_data',bin2hex($model->achievdoc_data));
					echo '<img class="imgbrder" src="'.$this->createUrl('Employees/DisplaySavedImage&id='.$model->primaryKey).'" alt="'.$model->achievdoc_file_name.'" width="100" height="100" />';
				}
			}
		}
		
		 ?>      
                    </td>
                  
                </tr>
                
                 <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                <tr>
             
                </tr>
             
            </table>
           
           <div class="row">
				<?php //echo $form->labelEx($model,'updated_at'); ?>
                <?php echo $form->hiddenField($model,'updated_at',array('value'=>date('Y-m-d'))); ?>
                <?php echo $form->error($model,'updated_at'); ?>
            </div>
           
           <div class="clear"></div>
    <div style="padding:40px 0 0 0px; text-align:left">
    	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create »' : 'Save',array('class'=>'formbut')); ?>
    </div>
        </div>
    </div>
    
   
   <?php $this->endWidget(); ?>
    <script type="text/javascript">
        function removeFile() 
	{	
		if(document.getElementById("new_file").style.display == "none")
		{
			document.getElementById("existing_file").style.display = "none";
			document.getElementById("new_file").style.display = "block";
			document.getElementById("new_file_field").value = "1";
		}
		
		return false;
	}



        </script>