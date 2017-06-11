
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subjects-form',
	'enableAjaxValidation'=>true,
)); 
$model;
?>
<div class="formCon">

<div class="formConInner">
	<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php $data = CHtml::listData(SubjectName::model()->findAll(),'id','name') ?>
	<?php echo $form->errorSummary($model); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 
   
    <td><?php echo $form->labelEx($model,Yii::t('Courses','Course')); ?></td>
   
     <?php
		$criteria=new CDbCriteria;
		$criteria->condition='is_deleted=:is_del';
		$criteria->params=array(':is_del'=>0);
	?>
    <td><div><?php echo $form->dropDownList($model,'course_id',CHtml::listData(Courses::model()->findAll($criteria),'id','concatened'),array('empty' =>'select course')); ?>
		<?php echo $form->error($model,'course_id'); ?></div></td>
  
   
    <tr>
    <td><?php echo $form->labelEx($model,Yii::t('subjects','name')); ?></td>
   <td><?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?></td>
    
 </tr>
   
 <tr>
    <td><?php echo $form->labelEx($model,Yii::t('subjects','max_weekly_classes')); ?></td>
    <td><?php echo $form->textField($model,'max_weekly_classes'); ?>
		<?php echo $form->error($model,'max_weekly_classes'); ?></td>
        
 </tr>
 <tr>
    <td><?php echo $form->labelEx($model,Yii::t('subjects','no_exams')); ?></td>
    <td><?php echo $form->checkBox($model,'no_exams'); ?>
		<?php echo $form->error($model,'no_exams'); ?></td>
  </tr>
  
</table>


	<div class="row">
		<?php //echo $form->labelEx($model,'batch_id'); ?>
		<?php echo $form->hiddenField($model,'batch_id',array('value'=>$batch_id)); ?>
		<?php echo $form->error($model,'batch_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'elective_group_id'); ?>
        <?php if($id==1)
		{
		echo $form->hiddenField($model,'elective_group_id');
		}
		else
		{
			echo $form->hiddenField($model,'elective_group_id',array('value'=>'1'));
		}
		 ?>
		<?php echo $form->error($model,'elective_group_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'is_deleted'); ?>
		<?php echo $form->hiddenField($model,'is_deleted'); ?>
		<?php echo $form->error($model,'is_deleted'); ?>
	</div>

        <div class="row">
		<?php //echo $form->labelEx($model,'is_active'); ?>
		<?php echo $form->hiddenField($model,'is_active'); ?>
		<?php echo $form->error($model,'is_active'); ?>
	</div>
        
	<div class="row">
		<?php //echo $form->labelEx($model,'created_at'); ?>
		
		 <?php  /*if(Yii::app()->controller->action->id == 'create')
		{
         echo $form->hiddenField($model,'created_at',array('value'=>date('Y-m-d')));
		}
		else
		{
			echo $form->hiddenField($model,'created_at');
		}
		  */?>
		<?php //echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'updated_at'); ?>
		<?php //echo $form->hiddenField($model,'updated_at',array('value'=>date('Y-m-d'))); ?>
		<?php //echo $form->error($model,'updated_at'); ?>
	</div>

	<div style="padding:20px 0 0 0px; text-align:left">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
         <?php if($id==1)
		{
		echo CHtml::ajaxSubmitButton(Yii::t('subjects','Save'),CHtml::normalizeUrl(array('subjects/create1','render'=>false)),array('success'=>'js: function(data) {
                       $("#jobDialog1").dialog("close");alert("Subject Created");window.location.reload();
                    }'),array('id'=>'closeJobDialog','name'=>'Submit'));
		}
		else
		{
			echo CHtml::ajaxSubmitButton(Yii::t('Subjects','Save'),CHtml::normalizeUrl(array('subjects/Addupdate&val1='.$batch_id,'render'=>false)),
		array('success'=>'js: function(data) {
									
											$("#jobDialog1").dialog("close");alert("Subject Updated successfully"); 
									 		window.location.reload();
									
									 
									 }',),
		array('id'=>'closeJobDialog','name'=>'Submit')); 
		}
		 ?>
       
	</div>
        
</div>
</div>
<?php $this->endWidget(); ?>
 