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
    <?php $stud = Students::model()->findAll("id=:x", array(':x'=>$_REQUEST['student_id']));?>
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1 ><?php foreach($stud as $stud_1){ echo Yii::t('students','Student Profile :');?><?php echo $stud_1->first_name.'&nbsp;'.$stud_1->last_name;} ?><br /></h1>
<div class="edit_bttns">
    <ul>
    <li><?php echo CHtml::link(Yii::t('students','<span>Edit</span>'), array('students/update', 'id'=>$_REQUEST['student_id']),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
     <li><?php echo CHtml::link(Yii::t('students','<span>Students</span>'), array('students/manage'),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
    </ul>
    </div>
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
    <div class="emp_right_contner" style="min-height: 70px;" >
    <div class="emp_tabwrapper">
    
    <div class="emp_tab_nav" style="padding: 0px 0px 0px 0px;">
    <ul style="width:998px;">
    <li><?php echo CHtml::link(Yii::t('students','Profile'), array('students/view', 'id'=>$_REQUEST['student_id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('students','Assesments'), array('students/assesments', 'id'=>$_REQUEST['student_id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('students','Attendance'), array('students/attentance', 'id'=>$_REQUEST['student_id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('students','Fees'), array('students/fees', 'id'=>$_REQUEST['student_id'])); ?></li>
    <!--<li><?php echo CHtml::link(Yii::t('students','Courses'), array('students/courses', 'id'=>$_REQUEST['student_id'])); ?></li>-->
    <li><?php echo CHtml::link(Yii::t('students','Documents'), array('students/document', 'id'=>$_REQUEST['student_id']),array('class'=>'active')); ?></li>
    <li><?php echo CHtml::link(Yii::t('students','Electives'), array('students/electives', 'id'=>$_REQUEST['student_id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('students','Achievments'), array('students/achievements', 'id'=>$_REQUEST['student_id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('students','Log'), array('students/log', 'id'=>$_REQUEST['student_id'])); ?></li>
    </ul>
    </div>
    <div class="clear"></div>
    

    </div>
<div class="edit_bttns_1" style="margin: 5px;">
    <ul>
   
     <li><?php echo CHtml::link(Yii::t('employees','<span>Documents List</span>'), array('students/document','id'=>$_REQUEST['student_id']),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
    </ul>
    </div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
        
    
    </td>
  </tr>
</table>




