<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	achievements,
);

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
 <?php $this->renderPartial('profileleft');?>
    </td>
    <td valign="top">
    <?php $stud = Students::model()->findAll("id=:x", array(':x'=>$_REQUEST['id']));?>

    <div class="cont_right formWrapper">
    <h1 style="margin-top:.67em;"><?php foreach($stud as $stud_1){ echo Yii::t('students','Student Profile : ');?><?php echo $stud_1->first_name.'&nbsp;'.$stud_1->last_name; }?><br /></h1>

    <div class="edit_bttns">
    <ul>
    <li><?php echo CHtml::link(Yii::t('employees','<span>Edit</span>'), array('update', 'id'=>$_REQUEST['id']),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
     <li><?php echo CHtml::link(Yii::t('employees','<span>Employees</span>'), array('students/manage'),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
    </ul>
    </div>
<?php
	$achievement = StudentAchievements::model()->findAll("student_id=:x", array(':x'=>$_REQUEST['id']));
	?>
       <?php
                Yii::app()->clientScript->registerScript(
                        'myHideEffect', '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
                );
                ?>
    <?php if(Yii::app()->user->hasFlash('success')):?>
                    <div class="flash-success" style="color:#F00; padding-left:150px; font-size:15px">
                        <?php echo Yii::app()->user->getFlash('success'); ?>
                    </div>
                    <?php endif; ?>
    
    <div class="emp_right_contner" style="min-height: 200px;" >
    <div class="emp_tabwrapper">
    <?php $this->renderPartial('tab');?>
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
					 <?php echo CHtml::link(Yii::t('Achievements','Edit'),array('studentachievements/update','id'=>$achievements->id,'student_id'=>$_REQUEST['id']),array('class'=>'edit')); ?>
		 <?php echo CHtml::link(Yii::t('Achievements','Delete'), array('studentachievements/delete', 'id'=>$achievements->id,'student_id'=>$_REQUEST['id']),array('confirm'=>'Are You Sure You Want To Delete This ?')) ?>
		 <?php echo CHtml::link(Yii::t('Achievements','Download'),array('achievements/downloadImage','id'=>$achievements->id,'student_id'=>$_REQUEST['id']),array('class'=>'edit')); ?>	
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
<?php echo $this->renderPartial('_form_3', array('model'=>$model)); ?>
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