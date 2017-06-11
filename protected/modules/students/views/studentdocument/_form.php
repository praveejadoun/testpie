<?php
if(Yii::app()->controller->action->id=='create') 
{
	$config=Configurations::model()->findByPk(7);
	$adm_no='';
	$adm_no_1 = '';
	//if($config->config_value==1)
	//{
		$adm_no	= Students::model()->findAll(array('order' => 'id DESC','limit' => 1));
                //echo "<pre>";
                //print_r($adm_no);
		$adm_no_1=$adm_no[0]['id']+1;
	//}
	?>
         <div class="captionWrapper" >
        <ul>
            <li><h2 ><?php echo CHtml::link(Yii::t('students','Student Details'), array('students/update','id' => $_REQUEST['id'],'class'=>cur)); ?></h2></li>
            <li><h2><?php echo CHtml::link(Yii::t('students','Guardian Details'), array('guardians/create','id' => $_REQUEST['id'],'class'=>cur)); ?></h2></li>
            <li><h2><?php echo CHtml::link(Yii::t('students','Previous Details'), array('studentpreviousdatas/create','id' => $_REQUEST['id'],'class'=>cur)); ?></h2></li>
            <li class="cur" style="border-top-right-radius: 4px;
    border-top: 1px #aec3d3 solid;
    border-left: 1px #aec3d3 solid;
    border-right: 1px #aec3d3 solid;
    background: #FFF;
    color:#576d7e;"><h2>Student Documents</h2></li>
        </ul>
	</div>
	
<?php  
}
else
{
	echo '<br><br>';
	$adm_no	= Students::model()->findByAttributes(array('id' => $_REQUEST['id']));
	$adm_no_1 = $adm_no->admission_no;
?>
       <div class="captionWrapper">
        <ul>
            <li><h2 class="cur">Student Details</h2></li>
            <li><h2>Guardian Details</h2></li>
           
            <li><h2>Previous Details</h2></li>
            <li class="last"><h2>Student Profile</h2></li>
        </ul>
	</div>
<?php
}
?>

<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'students-form',
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
   
    <div class="formCon">
        <div class="formConInner">
            <h3>Personal Details</h3>
            <table width="85%" border="0" cellspacing="0" cellpadding="0">
             
                <tr>
                    <td valign="bottom"><?php echo $form->labelEx($model,Yii::t('students','')); ?></td>
                </tr>
                <tr>
                    <td valign="top">
                        <?php //echo $form->textField($model,'gender',array('size'=>60,'maxlength'=>255)); ?>
                        <?php echo $form->dropDownList($model,'gender',array('M' => 'Class X Marksheet', 'F' => 'Others'),array('empty' => 'Select Gender')); ?>
                        <?php echo $form->error($model,'gender'); ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="formCon" style=" background:#EDF1D1 url(images/green-bg.png); border:0px #c4da9b solid; color:#393; ">
        <div class="formConInner" style="padding:10px 10px;">
            <!--<h3>Image Details</h3>-->
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <?php /*?><tr>
            <td><?php echo $form->labelEx($model,'photo_file_name'); ?></td>
            <td><?php echo $form->hiddenField($model,'photo_file_name',array('size'=>30,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'photo_file_name'); ?></td>
            <td><?php echo $form->labelEx($model,'photo_content_type'); ?>
            </td>
            <td><?php echo $form->hiddenField($model,'photo_content_type',array('size'=>30,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'photo_content_type'); ?></td>
            </tr><?php */?>
            	<tr>
                    <td>
                    <?php 
                    if($model->photo_data==NULL)
                        echo $form->labelEx($model,Yii::t('students','<strong style="color:#000">Upload Photo</strong>'));
                        else
                        echo $form->labelEx($model,'Photo'); 
                    ?>
                    </td>
                    <td>
                        <?php 
                        if($model->isNewRecord)
                        {
                            echo $form->fileField($model,'photo_data'); 
                            echo $form->error($model,'photo_data'); 
                        }
                        else
                        {
                            if($model->photo_data==NULL) 
                            {
                                echo $form->fileField($model,'photo_data'); 
                                echo $form->error($model,'photo_data'); 
                            }
                            else
                            {
                                if(Yii::app()->controller->action->id=='update') 
                                {
                                    echo CHtml::link(Yii::t('students','Remove'), array('Students/remove', 'id'=>$model->id),array('confirm'=>'Are you sure?')); 
                                    echo '<img class="imgbrder" src="'.$this->createUrl('Students/DisplaySavedImage&id='.$model->primaryKey).'" alt="'.$model->photo_file_name.'" width="100" height="100" />';	
                                }
                                else if(Yii::app()->controller->action->id=='create')
                                {
                                    echo CHtml::hiddenField('photo_file_name',$model->photo_file_name);
                                    echo CHtml::hiddenField('photo_content_type',$model->photo_content_type);
                                    echo CHtml::hiddenField('photo_file_size',$model->photo_file_size);
                                    echo CHtml::hiddenField('photo_data',bin2hex($model->photo_data));
                                    echo '<img class="imgbrder" src="'.$this->createUrl('Students/DisplaySavedImage&id='.$model->primaryKey).'" alt="'.$model->photo_file_name.'" width="100" height="100" />';
                                }
                            }
                        }
                        ?>
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
            	</tr>
            </table>
            
            <div class="row">
				<?php //echo $form->labelEx($model,'class_roll_no'); ?>
                <?php echo $form->hiddenField($model,'class_roll_no',array('size'=>60,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'class_roll_no'); ?>
            </div>
            
            <div class="row">
				<?php //echo $form->labelEx($model,'immediate_contact_id'); ?>
                <?php echo $form->hiddenField($model,'immediate_contact_id'); ?>
                <?php echo $form->error($model,'immediate_contact_id'); ?>
            </div>
            
            <div class="row">
				<?php //echo $form->labelEx($model,'is_sms_enabled'); ?>
                <?php echo $form->hiddenField($model,'is_sms_enabled'); ?>
                <?php echo $form->error($model,'is_sms_enabled'); ?>
            </div>
            
            
            <div class="row">
				<?php //echo $form->labelEx($model,'status_description'); ?>
                <?php echo $form->hiddenField($model,'status_description',array('size'=>60,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'status_description'); ?>
            </div>
            
            <div class="row">
				<?php //echo $form->labelEx($model,'is_active'); ?>
                <?php echo $form->hiddenField($model,'is_active'); ?>
                <?php echo $form->error($model,'is_active'); ?>
            </div>
            
            <div class="row">
				<?php //echo $form->labelEx($model,'is_deleted'); ?>
                <?php echo $form->hiddenField($model,'is_deleted'); ?>
                <?php echo $form->error($model,'is_deleted'); ?>
            </div>
            
            <div class="row">
				<?php //echo $form->labelEx($model,'created_at'); ?>
                <?php  if(Yii::app()->controller->action->id == 'create')
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
            
            <div class="row">
				<?php //echo $form->labelEx($model,'has_paid_fees'); ?>
                <?php echo $form->hiddenField($model,'has_paid_fees'); ?>
                <?php echo $form->error($model,'has_paid_fees'); ?>
            </div>
            
            <div class="row">
				<?php //echo $form->labelEx($model,'photo_file_size'); ?>
                <?php echo $form->hiddenField($model,'photo_file_size'); ?>
                <?php echo $form->error($model,'photo_file_size'); ?>
            </div>
            
            <div class="row">
				<?php //echo $form->labelEx($model,'user_id'); ?>
                <?php echo $form->hiddenField($model,'user_id',array('value'=>'1')); ?>
                <?php echo $form->error($model,'user_id'); ?>
            </div>
        </div>
    </div><!-- form -->
    <div class="clear"></div>
    <div style="padding:0px 0 0 0px; text-align:left">
    	<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardian Details »' : 'Save',array('class'=>'formbut')); ?>
    </div>
<?php $this->endWidget(); ?>