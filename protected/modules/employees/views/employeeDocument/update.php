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
    <?php $emp = Employees::model()->findAll("id=:x", array(':x'=>$_REQUEST['employee_id']));?>
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1 ><?php foreach($emp as $emp_1){ echo Yii::t('employees','Employee Profile :');?><?php echo $emp_1->first_name.'&nbsp;'.$emp_1->last_name;} ?><br /></h1>
<div class="edit_bttns">
    <ul>
    <li><?php echo CHtml::link(Yii::t('employees','<span>Edit</span>'), array('update', 'id'=>$_REQUEST['employee_id']),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
     <li><?php echo CHtml::link(Yii::t('employees','<span>Employees</span>'), array('employees/manage'),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
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
    <div class="emp_tab_nav">
    <ul style="width:998px;">
    <li><?php echo CHtml::link(Yii::t('employees','Profile'), array('employees/view', 'id'=>$_REQUEST['employee_id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Address'), array('employees/address', 'id'=>$_REQUEST['employee_id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Contact'), array('employees/contact', 'id'=>$_REQUEST['employee_id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Additional Info'), array('employees/addinfo', 'id'=>$_REQUEST['employee_id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Achievments'), array('employees/achievements', 'id'=>$_REQUEST['employee_id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Log'), array('employees/log', 'id'=>$_REQUEST['employee_id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Documents'), array('employees/documents', 'id'=>$_REQUEST['employee_id']),array('class'=>'active')); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Attendance'), array('employees/attendance', 'id'=>$_REQUEST['employee_id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','SubjectAssociation'), array('employees/subjectassociation', 'id'=>$_REQUEST['employee_id'])); ?></li>
    </ul>
    </div>
    <div class="clear"></div>
    
   
</div>
    </div>
<div class="edit_bttns_1">
    <ul>
   
     <li><?php echo CHtml::link(Yii::t('employees','<span>Documents List</span>'), array('employees/documents','id'=>$_REQUEST['employee_id']),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
    </ul>
    </div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
        
    
    </td>
  </tr>
</table>




