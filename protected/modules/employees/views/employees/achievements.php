<?php
$this->breadcrumbs=array(
	'Employees'=>array('index'),
	achievements,
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
<?php
	$achievement = EmployeeAchievements::model()->findAll("employee_id=:x", array(':x'=>$_REQUEST['id']));
	?>
       <?php
                Yii::app()->clientScript->registerScript(
                        'myHideEffect', '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
                );
                ?>
    <?php if(Yii::app()->user->hasFlash('success')):?>
                    <!--<div class="flash-success" style="color:#F00; padding-left:150px; font-size:15px">-->
                    <div class="flash-success" style="color:white; padding:8px; font-size:14px;border: 1px #999999 solid;background:rgb(35, 161, 16);border-radius: 4px;">

                        <?php echo Yii::app()->user->getFlash('success'); ?>
                    </div>
                    <?php endif; ?>
    
    <div class="emp_right_contner" style="min-height: 200px;" >
    <div class="emp_tabwrapper">
    <div class="emp_tab_nav">
    <ul style="width:998px;">
    <li><?php echo CHtml::link(Yii::t('employees','Profile'), array('view', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Address'), array('address', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Contact'), array('contact', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Additional Info'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Achievments'), array('achievements', 'id'=>$_REQUEST['id']),array('class'=>'active')); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Log'), array('log', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Documents'), array('documents', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Attendance'), array('attendance', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','SubjectAssociation'), array('subjectassociation', 'id'=>$_REQUEST['id'])); ?></li>
    </ul>
    </div>
    <div class="clear"></div>
    
    
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
			echo '<td align="center"  class="sub_act">'; ?> 
					 <?php echo CHtml::link(Yii::t('Achievements','Edit'),array('employeeachievements/update','id'=>$achievements->id,'employee_id'=>$_REQUEST['id']),array('class'=>'edit')); ?>
		 <?php echo CHtml::link(Yii::t('Achievements','Delete'), array('employeeachievements/delete', 'id'=>$achievements->id,'employee_id'=>$_REQUEST['id']),array('confirm'=>'Are You Sure You Want To Delete This ?')) ?>
		 <?php echo CHtml::link(Yii::t('Achievements','Download'),array('employeeachievements/downloadImage','id'=>$achievements->id,'employee_id'=>$_REQUEST['id']),array('class'=>'edit')); ?>	
                 <?php //echo CHtml::link(Yii::t('Achievements','View'),array('','id'=>$achievements->id,'employee_id'=>$_REQUEST['id']),array('class'=>'edit')); ?>
 <?php echo'</td></tr>';?>
		<?php }
	}
	else{
		echo '<tr>';
			echo '<td colspan="4"> No Achievement Details Available!</td>';
		echo '<tr>';
		
	}
	?>    </table>
    </div>
  

</div>
</div>
<?php echo $this->renderPartial('_form3', array('model'=>$model)); ?>
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