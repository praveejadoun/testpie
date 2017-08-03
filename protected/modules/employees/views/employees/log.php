<?php
$this->breadcrumbs=array(
	'Employees'=>array('index'),
	log,
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
    
    <div class="emp_right_contner" style="min-height: 200px;" >
    <div class="emp_tabwrapper">
    <div class="emp_tab_nav">
    <ul style="width:998px;">
    <li><?php echo CHtml::link(Yii::t('employees','Profile'), array('view', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Address'), array('address', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Contact'), array('contact', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Additional Info'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Achievements'), array('achievements', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Log'), array('log', 'id'=>$_REQUEST['id']),array('class'=>'active')); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Documents'), array('documents', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Attendance'), array('attendance', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','SubjectAssociation'), array('subjectassociation', 'id'=>$_REQUEST['id'])); ?></li>
    </ul>
    </div>
    <div class="clear"></div>
    
  <?php echo $this->renderPartial('_form4', array('model'=>$model)); ?>
</div>
         
        <?php   $emplog = EmployeeLogs::model()->findAll("employee_id=:x",array(':x'=>$_REQUEST['id']));
        foreach($emplog as $emplog_1){?>
            <div class="log_comment_box" id="delete_div_5">
      <?php  $logcategory = EmployeeLogCategory::model()->findAll("id=:x",array(':x'=>$emplog_1->logcategory_id));?>
       
                <h2>Admin Admin<span style="font-size:12px;color:#7cf;margin:0px 0px 0px 15px;">
                            Admin</span>
                                            <div style="float:right;font-size:14px;color:#f63"><?php foreach($logcategory as $logcategory_1){ echo $logcategory_1->name; }?></div></h2>
                                    <div class="clear"></div>
                                    <p><?php echo $emplog_1->description; ?></p>
                                    <?php if(Yii::app()->controller->action->id == 'log'){?>
                                     <h7><?php echo $emplog_1->created_at; ?></h7>
                                    <?php } else { ?>
                                      <h7><?php echo $emplog_1->updated_at; ?></h7>
                                    <?php } ?>
        <div class="edit_bttns_1">
    <ul>
    <li><?php echo CHtml::link(Yii::t('employees','<span>Edit</span>'), array('employeelogs/update', 'id'=>$emplog_1->id,'employee_id'=>$_REQUEST['id']),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
     <li><?php echo CHtml::link(Yii::t('employees','<span>Delete</span>'), array('employeelogs/delete','id'=>$emplog_1->id,'employee_id'=>$_REQUEST['id']),array('class'=>'edit last','confirm'=>'Are You Sure You Want To Delete This ?')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
    </ul>
    </div>
            </div>
        <?php } ?>

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

