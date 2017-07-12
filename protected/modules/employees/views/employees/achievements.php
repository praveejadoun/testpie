<?php
$this->breadcrumbs=array(
	'Employees'=>array('index'),
	'View',
);

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
 <?php $this->renderPartial('profileleft');?>
    <?php $emp = Employees::model()->findAll("id=:x", array(':x'=>$_REQUEST['id']));?>
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1 ><?php foreach($emp as $emp_1){ echo Yii::t('employees','Employee Profile :');?><?php echo $emp_1->first_name.'&nbsp;'.$emp_1->last_name;} ?><br /></h1>
<div class="edit_bttns">
    <ul>
    <li><?php echo CHtml::link(Yii::t('employees','<span>Edit</span>'), array('update', 'id'=>$_REQUEST['id']),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
     <li><?php echo CHtml::link(Yii::t('employees','<span>Employees</span>'), array('employees/manage'),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
    </ul>
    </div>
    
    <div class="emp_right_contner">
    <div class="emp_tabwrapper">
    <div class="emp_tab_nav">
    <ul style="width:998px;">
    <li><?php echo CHtml::link(Yii::t('employees','Profile'), array('view', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Address'), array('address', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Contact'), array('contact', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Additional Info'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Achievments'), array('achievments', 'id'=>$_REQUEST['id']),array('class'=>'active')); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Log'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Documents'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Attendance'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','SubjectAssociation'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    </ul>
    </div>
    <div class="clear"></div>
    <div class="emp_cntntbx" style="min-height:200px;">
    <?php
	$achievement = EmployeeAchievements::model()->findAll("employee_id=:x", array(':x'=>$_REQUEST['id']));
	?>
        <table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #b9c7d0;">
            <tbody>
            <tr>
                <th  style=" float: left; padding: 19px; font-size: 17px;">Achievement Details</th>
            </tr>
            </tbody>
            </table>
    <div class="tableinnerlist"> 
        
    <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
    <th><?php echo Yii::t('students','Achievement Title');?></th>
    <th><?php echo Yii::t('students','Description');?></th>
    <th><?php echo Yii::t('students','Document Name');?></th>
    <th><?php echo Yii::t('students','Actions');?></th>
    </tr>

    <?php
	if($achievement!=NULL){
		foreach($achievement as $achievements)
		{
			echo '<tr>';
			
			echo '<td>'.$achievements->achievement_title.'</td>';
			
			echo '<td>'.$achievements->achievement_description.'</td>';
			echo '<td>'.$achievements->achievement_document_name.'</td>';
			echo '<td><ul class="tt-wrapper"><li><a class="tt-download" href="/index.php?r=employees/achievements/download&amp;id=2&amp;employee_id=35"><span>Download</span></a></li></ul></td>';
			echo '</tr>';
		}
	}
	else{
		echo '<tr>';
			echo '<td colspan="4"> No Achievement Details Available!</td>';
		echo '<tr>';
		
	}
	?>    </table>
    </div>
    </div>

   <div class="formCon">
        <div class="formConInner">
           <!-- <h3>Personal Details</h3>-->
           <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-achievement-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>false,
)); ?>
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
                <td valign="bottom"><?php echo $form->labelEx($model,Yii::t('employees','Document Name <span class="required">*</span>')); ?></td>
                <td>&nbsp;</td>
                 <td valign="top"><?php echo $form->textField($model,'achievement_document_name',array('size'=>30,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'achievement_document_name'); ?></td>
                <td>&nbsp;</td>
                </tr>
                
                 <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
               <div class="row">
		<?php //echo $form->labelEx($model,'course_id'); 
		?>
		<?php echo $form->hiddenField($model,'employee_id',array('value'=>$_REQUEST['id'])); ?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>
             
            </table>
         
          
           <div class="clear"></div>
    <div style="padding:0px 0 0 0px; text-align:left">
    	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create »' : 'Save',array('class'=>'formbut')); ?>
    </div>
           <?php $this->endWidget(); ?>
        </div>
    </div>
 
</div>
</div>
</div>
    
    </td>
  </tr>
</table>



<style type="text/css">
.document_table {
    padding: 0px 0px;
    margin: 0px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    border-top: 1px #d1e0ea solid;
    border-right: 1px #d1e0ea solid;
    border-left: 1px #d1e0ea solid;
}
</style>