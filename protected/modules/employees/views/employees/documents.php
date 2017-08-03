<?php
$this->breadcrumbs=array(
	'Employees'=>array('index'),
	documents,
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
    <li><?php echo CHtml::link(Yii::t('employees','Achievments'), array('achievements', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Log'), array('log', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Documents'), array('documents', 'id'=>$_REQUEST['id']),array('class'=>'active')); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Attendance'), array('attendance', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','SubjectAssociation'), array('subjectassociation', 'id'=>$_REQUEST['id'])); ?></li>
    </ul>
    </div>
    <div class="clear"></div>
    
    <?php
	$empdoc = EmployeeDocument::model()->findAll("employee_id=:x and is_deleted=:y and is_active=:z", array(':x'=>$_REQUEST['id'],':y'=>'0',':z'=>'1'));
	?>
    
    <div class="document_table" style="margin-top: 10px;">
        <div class="formCon" style="margin:0px;">
        <div class="formConInner"style="height:15px;">
    <table width="100%" cellspacing="0" cellpadding="0" ">
        <tbody>
            <tr>
                <th style="float: left;height: 18px;padding: 0px;font-size: 17px;"><?php echo Yii::t('employees','Document Name');?></th>
            </tr>
        </tbody>
        
    </table>
        </div>
        </div>
        <?php 
        foreach($empdoc as $empdoc_1)
	{ ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none;border-bottom: 2px solid #def;height:60px;">
            <tbody>
                <tr>
                <td width="90" align="center"><?php echo $empdoc_1->document_name ?></td>
                <td width="100" align="right">
                <div style="width:127px"><div class="tag_approved">Approved</div></div> </td>
                <td  align="center" style="padding-left: 100px;">
                    <ul  class="sub_act"  >
                      <li style="list-style:none;">
                           <?php echo CHtml::link(Yii::t('Achievements','Approved'),array(/*'','id'=>$empdoc_1->id,'id'=>$_REQUEST['id']*/),array('class'=>'edit')); ?>
		           <?php echo CHtml::link(Yii::t('Achievements','Disapprove'),array('employeedocument/disapprove','id'=>$empdoc_1->id,'employee_id'=>$_REQUEST['id']),array('class'=>'edit','confirm'=>'Are You Sure You Want To Disapprove This ?')); ?>	
                           <?php echo CHtml::link(Yii::t('Achievements','Edit'),array('employeedocument/update','id'=>$empdoc_1->id,'employee_id'=>$_REQUEST['id']),array('class'=>'edit')); ?>
                         
                           <?php echo CHtml::link(Yii::t('Documents','Delete'), array('/employees/employeedocument/delete', 'id'=>$empdoc_1->id,'employee_id'=>$_REQUEST['id']),array('confirm'=>'Are You Sure You Want To Delete This ?')) ?>
                             <?php echo CHtml::link(Yii::t('Achievements','Download'),array('Employeedocument/downloadImage','id'=>$empdoc_1->id,'employee_id'=>$_REQUEST['id']),array('class'=>'edit')); ?>  
                          <?php //echo CHtml::link(CHtml::encode($model->document_file_name), array('/employees/employeedocument/download', 'id' => $achievements->id),array('class'=>'edit')); ?>
                      </li>
                    </ul>
                </td>
                </tr>
            </tbody>
        </table>
        <?php } ?>
    </div>
</div>

<?php echo $this->renderPartial('_form5', array('model'=>$model)); ?>
</div>
        </div>
    
    </td>
  </tr>
</table>



