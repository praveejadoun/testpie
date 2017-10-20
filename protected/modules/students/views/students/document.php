<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Assessments',
);


?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <div class="emp_cont_left">
    <?php $this->renderPartial('profileleft');?>
    
    </div>
    </td>
     <?php $stud = Students::model()->findAll("id=:x", array(':x'=>$_REQUEST['id']));?>
    <td valign="top">
    <div class="cont_right formWrapper">
    
    <h1 style="margin-top:.67em;"><?php foreach($stud as $stud_1){ echo Yii::t('students','Student Profile : ');?><?php echo $stud_1->first_name.'&nbsp;'.$stud_1->last_name; }?><br /></h1>
        
    <div class="edit_bttns last">
    <ul>
    <li>
    <?php echo CHtml::link(Yii::t('students','<span>Edit</span>'), array('update', 'id'=>$model->id),array('class'=>' edit ')); ?>
    </li>
     <li>
    <?php echo CHtml::link(Yii::t('students','<span>Students</span>'), array('students/manage'),array('class'=>'edit last'));?>
    </li>
    </ul>
    </div>
    
    
    <div class="clear"></div>
    <div class="emp_right_contner">
    <div class="emp_tabwrapper">
    <?php $this->renderPartial('tab');?>
    <div class="clear"></div>
    <div class="emp_cntntbx" style="min-height:0px;">
    
 <?php
	$studdoc = StudentDocument::model()->findAll("student_id=:x and is_deleted=:y and is_active=:z", array(':x'=>$_REQUEST['id'],':y'=>'0',':z'=>'1'));
	?>
    
    <div class="document_table" style="margin-top: 10px;">
        <div class="formCon" style="margin:0px;">
        <div class="formConInner"style="height:15px;">
    <table width="100%" cellspacing="0" cellpadding="0" >
        <tbody>
            <tr>
                <th style="float: left;height: 18px;padding: 0px;font-size: 17px;"><?php echo Yii::t('employees','Document Name');?></th>
            </tr>
        </tbody>
        
    </table>
        </div>
        </div>
        <?php if($studdoc!=NULL){?>
        <?php 
        foreach($studdoc as $studdoc_1)
	{ ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none;border-bottom: 2px solid #def;height:60px;">
            <tbody>
                <tr>
                <td width="90" align="center"><?php echo $studdoc_1->document_name ?></td>
                <td width="100" align="right">
                <div style="width:127px"><div class="tag_approved">Approved</div></div> </td>
                <td  align="center" style="padding-left: 100px;">
                    <ul  class="sub_act"  >
                      <li style="list-style:none;">
                           <?php echo CHtml::link(Yii::t('Achievements','Approved'),array(/*'','id'=>$empdoc_1->id,'id'=>$_REQUEST['id']*/),array('class'=>'edit','style'=>'background: #008000;color: white;'),array('disabled'=>'true')); ?>
		           <?php echo CHtml::link(Yii::t('Achievements','Disapprove'),array('studentdocument/disapprove','id'=>$studdoc_1->id,'student_id'=>$_REQUEST['id']),array('class'=>'edit','confirm'=>'Are You Sure You Want To Disapprove This ?')); ?>	
                           <?php echo CHtml::link(Yii::t('Achievements','Edit'),array('studentdocument/update','id'=>$studdoc_1->id,'student_id'=>$_REQUEST['id']),array('class'=>'edit')); ?>
                         
                           <?php echo CHtml::link(Yii::t('Documents','Delete'), array('/students/studentdocument/delete', 'id'=>$studdoc_1->id,'student_id'=>$_REQUEST['id']),array('confirm'=>'Are You Sure You Want To Delete This ?')) ?>
                             <?php echo CHtml::link(Yii::t('Achievements','Download'),array('studentdocument/downloadImage','id'=>$studdoc_1->id,'student_id'=>$_REQUEST['id']),array('class'=>'edit')); ?>  
                          <?php //echo CHtml::link(CHtml::encode($model->document_file_name), array('/employees/employeedocument/download', 'id' => $achievements->id),array('class'=>'edit')); ?>
                      </li>
                    </ul>
                </td>
                </tr>
            </tbody>
        </table>
        <?php } } else { ?>
        <table width="100%" cellspacing="0" cellpadding="0" style="border-top:none;border-bottom: 2px solid #def;height:60px;" >
            <tbody>
                <tr>
                    <td style="font-size: 15px;padding: 15px;">
                        Documents Are Not Available !
                    </td>
                </tr>
            </tbody>
        </table>
        <?php } ?>
    </div>
    </div>
    </div>
    <?php echo $this->renderPartial('_form_2', array('model'=>$model)); ?>
    </div>
    </div>
   
    </td>
  </tr>
</table>