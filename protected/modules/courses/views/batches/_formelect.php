

<script language="javascript">
function course()
{
var id = document.getElementById('eg').value;
window.location= 'index.php?r=courses/batches/electives&id=26&eg='+id;	
}
function batch()
{
var id_1 = document.getElementById('eg').value;
var id = document.getElementById('sub').value;
window.location= 'index.php?r=courses/batches/electives&id=26&eg='+id_1+'&sub='+id;	
}
function departme()
{
var id_1 = document.getElementById('eg').value;
var id = document.getElementById('sub').value;
var dep = document.getElementById('depart').value;
window.location= 'index.php?r=employees/employeesSubjects/create&eg='+id_1+'&sub='+id+'&dept='+dep;		
}
</script>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-electives-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="formCon">

<div class="formConInner">
    <!--<table>
        <tr>
  <td><?php //echo $form->labelEx($model, 'id'); ?></td>
<td>
<?php/*
$regions = CHtml::listData(ElectiveGroups::model()->findAll(array('order' => 'id')), 'id', 'name');
echo $form->dropDownList($model, 'id', $regions, array(
'prompt' => '–select region–',
'ajax' => array(
'type' => 'POST',
'url' => CController::createUrl('batches/districts'),
'update' => '#Customer_district_id',
)
));*/
?>
</td>
<td><?php //echo $form->error($model, 'elective_group_id'); ?></td>
<td><?php //echo $form->labelEx($model, 'elective_group_id'); ?></td>
<td><?php// echo $form->dropDownList($model, 'elective_group_id', array(), array('style' => 'width:300px;')); ?></td>
<td><?php //echo $form->error($model, 'elective_group_id'); ?></td>
</tr>
</table>-->
    
    
    
     <?php 

$data = CHtml::listData(ElectiveGroups::model()->findAll("is_deleted 	=:x AND batch_id=:y", array(':x'=>0,':y'=>$_REQUEST['id']),array('order'=>'course_name DESC')),'id','name');
if(isset($_REQUEST['eg']))
{
	$sel= $_REQUEST['eg'];
}
else
{
	$sel='';
}
echo '<div style="float:left; width:380px;"><span style="font-size:14px; font-weight:bold; color:#666;">Select Group</span>&nbsp;&nbsp;&nbsp;&nbsp;';
echo CHtml::dropDownList('id','',$data,array('prompt'=>'Select','onchange'=>'course()','id'=>'eg','options'=>array($sel=>array('selected'=>true)))); 
echo '</div>';
echo '<div style="float:left; width:300px;"><span style="font-size:14px; font-weight:bold; color:#666;">Subject</span>&nbsp;&nbsp;'; ?>


<?php 
$data_1= array();
if(isset($_REQUEST['eg']))
{
	//$batches = Batches::model()->findAll("course_id=:x and is_deleted=:y", array(':x'=>$_REQUEST['cou'],':y'=>0));
	
	/*$data_1=Subjects::model()->findAll(array('join' => 'JOIN batches ON batch_id = batches.id','condition'=>'batches.course_id=:id', 
                  'params'=>array(':id'=>(int) $_REQUEST['cou'])));*/
	$data_1 =CHtml::listData(Electives::model()->findAll("elective_group_id=:x", array(':x'=>$_REQUEST['eg']),array('order'=>'name DESC')),'id','name');	  
				  
	 
}
if(isset($_REQUEST['sub']))
{
 $sel_1 = $_REQUEST['sub'];	
}
else
{
	$sel_1 ='';
}
echo CHtml::dropDownList('sub','',$data_1,array('prompt'=>'Select','onchange'=>'course()','id'=>'sub','onchange'=>'batch()','options'=>array($sel_1=>array('selected'=>true)))); 
 
echo '<br/></div><div class="clear"></div>';

  
 ?>
</div>
</div>
<?php /*
if(isset($_REQUEST['sub']))
{*/
	
$posts = Students::model()->findAll("batch_id=:x and is_deleted=:y and is_active=:z", array(':x'=>$_REQUEST['id'],':y'=>'0',':z'=>'1'));	

	/*if(count($emp_sub)==0)
	{
		echo '<br> <br>'.Yii::t('employees','<i>No Employee assigned yet.</i>').'<br> <br>';
	}
	else
	{*/
	?>
   <?php
                Yii::app()->clientScript->registerScript(
                        'myHideEffect', '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
                );
                ?>
                <div id="statusMsg">    
                <?php if (Yii::app()->user->hasFlash('notification')): ?>
                    
                    <div class="flash-success" style="color:#F00; padding-left:150px; font-size:12px">
                    <?php echo Yii::app()->user->getFlash('notification'); ?>
                    </div>
                    <?php endif; ?>
                </div>  
   <!-- <div class="clear"></div>
  <h3><?php echo Yii::t('employees','Currently Assigned:');?></h3>
  <div id="success" style="color:#F00; display:none;">Details Removed Successfully</div>-->

  <div class="tableinnerlist">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
         <th><?php echo Yii::t('employees','');?>Student Name</th>
         <th><?php echo Yii::t('employees','');?>Admission Number</th>
         <th><?php echo Yii::t('employees','');?>Action</th>
      </tr>
    
   <?php /*if((!isset($_REQUEST['dept'])) or (isset($_REQUEST['dept']) and $_REQUEST['dept']==NULL))
   {
	   $_REQUEST['dept']='';
	   
   }*/
   foreach($posts as $posts_1)
   { 
   ?>
     <tr>
    <td><?php 
	 //$emp_name = Employees::model()->findByAttributes(array('id'=>$emp_sub_1->employee_id));
	echo $posts_1->first_name.'  '.$posts_1->middle_name.'  '.$posts_1->last_name?></td>
    
		<td><?php echo $posts_1->admission_no; ?></td> 
	
    <td><?php echo CHtml::link(Yii::t('students','Assign'), array('batches/Assign','id'=>$_REQUEST['id'], 'sid'=>$posts_1->id,'sub'=>$_REQUEST['sub'],'eg'=>$_REQUEST['eg']), array('confirm' => 'Are you sure?')); ?></td>
               
           
     </tr>
    <?php } ?>
    </table>
   </div>
    <?php
	
	/*}
	
	echo '<br><span style="font-size:14px; font-weight:bold; color:#666;">Departments</span>&nbsp;&nbsp;';

	if(isset($_REQUEST['dept']))
	{
		$sel_2 = $_REQUEST['dept'];	
	}
	else
	{
		$sel_2 = '';	
	}
      
echo CHtml::dropDownList('dep','',CHtml::listData(EmployeeDepartments::model()->findAll(),'id','name'),array('prompt'=>'Select','id'=>'depart','onchange'=>'departme()','options'=>array($sel_2=>array('selected'=>true))));
	

echo '<br>';
if(isset($_REQUEST['dept']) and $_REQUEST['dept']!=NULL)
{
	$employee = $model->Employeenotassigned($_REQUEST['dept'],$_REQUEST['sub']);
	
	//$employee_subjects = EmployeesSubjects::models()->findAll("employee_id=:x", array(':x'=>$_REQUEST['dept']));
	//echo count($employee);
	//exit;
	
	if(count($employee)!=0)
	{?>
    <h3><?php echo Yii::t('employees','Assign New:');?></h3>
      <div class="tableinnerlist">
     <table width="100%" cellpadding="0" cellspacing="0">
     <tr>
         <th><?php echo Yii::t('employees','Employee Name');?></th>
         <th><?php echo Yii::t('employees','Action');?></th>
      </tr>

    <?php   
	foreach($employee as $employee_1)
	{
		echo '<tr>';
	    echo '<td>'.$employee_1['first_name'].'  '.$employee_1['middle_name'].'  '.$employee_1['last_name'].'</td>';
		echo '<td>'.CHtml::link(Yii::t('employees','Assign'), array('employeesSubjects/Assign', 'emp_id'=>$employee_1['id'],'sub'=>$_REQUEST['sub'],'eg'=>$_REQUEST['eg'],'dept'=>$_REQUEST['dept']), array('confirm' => 'Are you sure?')).'</td>'; 	
		echo '</tr>';
	}
	?>
    </table>
    </div>
    <?php }
	else
	{
		echo '<br> <br>'.Yii::t('employees','<i>Nothing Found.</i>').'<br> <br>';
	}
}

}*/

?>
    
    
    
    
    
    
</div>
</div>
<?php $this->endWidget(); ?>
<script>
function show()
{
	$("#success").css("display","block").animate({opacity: 1.0}, 3000).fadeOut("slow")
}

</script>