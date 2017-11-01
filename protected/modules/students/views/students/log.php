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
    <?php $stud = Students::model()->findAll("id=:x", array(':x'=>$_REQUEST['id']));?>
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    <h1 style="margin-top:.67em;"><?php foreach($stud as $stud_1){ echo Yii::t('students','Student Profile : ');?><?php echo $stud_1->first_name.'&nbsp;'.$stud_1->last_name; }?><br /></h1>

    <div class="edit_bttns">
    <ul>
    <li><?php echo CHtml::link(Yii::t('students','<span>Edit</span>'), array('update', 'id'=>$_REQUEST['id']),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
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
    <div class="emp_right_contner" style="min-height: 200px;" >
    <div class="emp_tabwrapper">
        <?php $this->renderPartial('tab');?>

    <div class="clear"></div>
    
  <?php  echo $this->renderPartial('_form_4', array('model'=>$model)); ?>
</div>
         
        <?php   $emplog = StudentLogs::model()->findAll("student_id=:x",array(':x'=>$_REQUEST['id']));
        foreach($emplog as $emplog_1){?>
            <div class="log_comment_box" id="delete_div_5">
      <?php  $logcategory = StudentLogCategory::model()->findAll("id=:x",array(':x'=>$emplog_1->logcategory_id));?>
       
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
    <li><?php echo CHtml::link(Yii::t('employees','<span>Edit</span>'), array('studentlogs/update', 'id'=>$emplog_1->id,'student_id'=>$_REQUEST['id']),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
     <li><?php echo CHtml::link(Yii::t('employees','<span>Delete</span>'), array('studentlogs/delete','id'=>$emplog_1->id,'student_id'=>$_REQUEST['id']),array('class'=>'edit last','confirm'=>'Are You Sure You Want To Delete This ?')); ?><!--<a class=" edit last" href="">Edit</a>--></li>
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

