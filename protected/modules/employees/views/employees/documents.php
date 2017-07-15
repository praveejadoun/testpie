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
    
    <div class="emp_right_contner" style="min-height: 200px;" >
    <div class="emp_tabwrapper">
    <div class="emp_tab_nav">
    <ul style="width:998px;">
    <li><?php echo CHtml::link(Yii::t('employees','Profile'), array('view', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Address'), array('address', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Contact'), array('contact', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Additional Info'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Achievments'), array('achievments', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Log'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Documents'), array('documents', 'id'=>$_REQUEST['id']),array('class'=>'active')); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Attendance'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','SubjectAssociation'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
    </ul>
    </div>
    <div class="clear"></div>
    
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
                                                      </div>                                         
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
  <tr class="tablebx_topbg">
      <td></td>
   
    <td><?php echo Yii::t('employees','Employee Name');?></td>
  
  
  </tr>
  
 
  
  <?php foreach($list as $list_1)
	{ ?>
 <tr class=<?php echo $cls;?> id=<?php echo $i;?>>
     
    
    <td><?php echo CHtml::link($list_1->document_name,array('view','id'=>$list_1->id)) ?></td>
   
	
 
    <td><?php //echo CHtml::ajaxlink('Delete',array('employees/manage','id'=>$list_1->id),array('confirm'=>'Do you want to delete Employee ?')) 
		//echo CHtml::ajaxLink('Delete', array('deletes','id'=>$list_1->id), array('update'=>'#'.$i),array('confirm'=>'Do you want to delete this employee ?'));
		echo CHtml::ajaxLink('Delete', array('deletes','id'=>$list_1->id), array('success'=>'rowdelete('.$i.')'),array('confirm'=>'Do you want to delete this employee ?'));
		//echo CHtml::ajaxLink('Delete', array('deletes'), array('update'=>'#forAjaxRefresh'),array('onclick'=>'js: alert(Do you want to delete Employee ?);'));
	?></td>
    <!--<td style="border-right:none;">Task</td>-->
  </tr><?php
  if($cls=="even")
  {
	 $cls="odd" ;
  }
  else
  {
	  $cls="even"; 
  }
	$i++;} ?>
</table>
    
  

</div>
</div>
<?php echo $this->renderPartial('_form5', array('model'=>$model)); ?>
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
