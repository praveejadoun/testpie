
<script language="javascript">
function course()
{
var id = document.getElementById('cou').value;
window.location= 'index.php?r=employees/employeesSubjects/create&cou='+id;	
}
function batch()
{
var id_1 = document.getElementById('cou').value;
var id = document.getElementById('sub').value;
window.location= 'index.php?r=employees/employeesSubjects/create&cou='+id_1+'&sub='+id;	
}
function departme()
{
var id_1 = document.getElementById('cou').value;
var id = document.getElementById('sub').value;
var dep = document.getElementById('depart').value;
window.location= 'index.php?r=employees/employeesSubjects/create&cou='+id_1+'&sub='+id+'&dept='+dep;		
}
</script>
<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'employees-subjects-form',
	'enableAjaxValidation'=>false,
)); */?>

    <?php 
/*
$data = CHtml::listData(Courses::model()->findAll("is_deleted 	=:x", array(':x'=>0),array('order'=>'course_name DESC')),'id','course_name');
if(isset($_REQUEST['cou']))
{
	$sel= $_REQUEST['cou'];
}
else
{
	$sel='';
}
echo '<div style="float:left; width:380px;"><span style="font-size:14px; font-weight:bold; color:#666;">Course</span>&nbsp;&nbsp;&nbsp;&nbsp;';
echo CHtml::dropDownList('id','',$data,array('prompt'=>'Select','onchange'=>'course()','id'=>'cou','options'=>array($sel=>array('selected'=>true)))); 
echo '</div>';
echo '<div style="float:left; width:300px;"><span style="font-size:14px; font-weight:bold; color:#666;">Subject</span>&nbsp;&nbsp;'; ?>


<?php 
$data_1= array();
if(isset($_REQUEST['cou']))
{
	$batches = Batches::model()->findAll("course_id=:x and is_deleted=:y", array(':x'=>$_REQUEST['cou'],':y'=>0));
	
	$data_1=Subjects::model()->findAll(array('join' => 'JOIN batches ON batch_id = batches.id','condition'=>'batches.course_id=:id', 
                  'params'=>array(':id'=>(int) $_REQUEST['cou'])));
	$data_1 = CHtml::listData(Subjects::model()->findAll(array('join' => 'JOIN batches ON batch_id = batches.id','condition'=>'batches.course_id=:id', 
                  'params'=>array(':id'=>(int) $_REQUEST['cou']))),'id','batchname');			  
				  
	 
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
    
<?php 
if(isset($_REQUEST['sub']))
{
	
$emp_sub = EmployeesSubjects::model()->findAll("subject_id=:x", array(':x'=>$_REQUEST['sub']));	

	if(count($emp_sub)==0)
	{
		echo '<br> <br>'.Yii::t('employees','<i>No Employee assigned yet.</i>').'<br> <br>';
	}
	else
	{
	?>
    
    <div class="clear"></div>
  <h3><?php echo Yii::t('employees','Currently Assigned:');?></h3>
  <div id="success" style="color:#F00; display:none;">Details Removed Successfully</div>

  <div class="tableinnerlist">
    <table border="0" cellpadding="0" cellspacing="0" width="80%">
    <tr>
         <th><?php echo Yii::t('employees','Sl. No.');?>Employee Name</th>
         <th><?php echo Yii::t('employees','Sl. No.');?>Department</th>
         <th><?php echo Yii::t('employees','Sl. No.');?>Action</th>
      </tr>
    
   <?php if((!isset($_REQUEST['dept'])) or (isset($_REQUEST['dept']) and $_REQUEST['dept']==NULL))
   {
	   $_REQUEST['dept']='';
	   
   }
   foreach($emp_sub as $emp_sub_1)
   { 
   ?>
     <tr>
    <td><?php 
	 $emp_name = Employees::model()->findByAttributes(array('id'=>$emp_sub_1->employee_id));
	echo $emp_name->first_name.'  '.$emp_name->middle_name.'  '.$emp_name->last_name?></td>
    <?php $batc = EmployeeDepartments::model()->findByAttributes(array('id'=>$emp_name->employee_department_id)); 
	if($batc!=NULL)
	{
		 ?>
		<td><?php echo $batc->name; ?></td> 
	<?php }
	else{?> <td>-</td> <?php }?>
    <td><?php echo CHtml::link(Yii::t('employees','Remove'), array('deleterow', 'id'=>$emp_sub_1->id,'sub'=>$_REQUEST['sub'],'cou'=>$_REQUEST['cou'],'dept'=>$_REQUEST['dept']), array('confirm' => 'Are you sure?','onclick'=>"show()")); ?></td>
    </tr>
    <?php } ?>
    </table>
   </div>
    <?php
	
	}
	
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
     <table width="80%" cellpadding="0" cellspacing="0">
     <tr>
         <th><?php echo Yii::t('employees','Employee Name');?></th>
         <th><?php echo Yii::t('employees','Action');?></th>
      </tr>

    <?php   
	foreach($employee as $employee_1)
	{
		echo '<tr>';
	    echo '<td>'.$employee_1['first_name'].'  '.$employee_1['middle_name'].'  '.$employee_1['last_name'].'</td>';
		echo '<td>'.CHtml::link(Yii::t('employees','Assign'), array('employeesSubjects/Assign', 'emp_id'=>$employee_1['id'],'sub'=>$_REQUEST['sub'],'cou'=>$_REQUEST['cou'],'dept'=>$_REQUEST['dept']), array('confirm' => 'Are you sure?')).'</td>'; 	
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



<?php //$this->endWidget(); ?>
<script>
function show()
{
	$("#success").css("display","block").animate({opacity: 1.0}, 3000).fadeOut("slow")
}
</script> 
<td valign="top" width="96%" align="left">
<td valign="top" width="247">
<div class="cont_right formWrapper">
    <h1><?php echo Yii::t('employees','Create Tax');?></h1>
<div class="edit_bttns" style="top:20px; right:20px;">
<ul>
<li>
<a class="addbttn last " href="/index.php?r=fees/taxes/admin">
<span>Manage</span>
</a>
</li>
</ul>
</div>
<style>

#status input
{
    float:left;
}
#status label
{
    float:left;
}
</style>
<div class="formCon">
<div class="formConInner">
<form id="fee-taxes-form" action="/index.php?r=fees/taxes/create" method="post">
<div style="display:none">
<input value="75e6b084217a8bd52c8b48b3c6c5b52bea0403e1" name="YII_CSRF_TOKEN" type="hidden">
</div>
<p class="note">
Fields with
<span class="required">*</span>
are required.
</p>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tbody>
<tr>
<td>
<label class="required" for="FeeTaxes_label">
Label
<span class="required">*</span>
</label>
</td>
<td>
<input id="FeeTaxes_label" size="60" maxlength="200" name="FeeTaxes[label]" type="text">
</td>
</tr>
<tr>
<td> </td>
<td> </td>
</tr>
<tr>
<td>
<label class="required" for="FeeTaxes_value">
Value ( % )
<span class="required">*</span>
</label>
</td>
<td>
<input id="FeeTaxes_value" size="10" maxlength="10" name="FeeTaxes[value]" type="text">
</td>
</tr>
<tr>
<td> </td>
<td> </td>
</tr>
<tr>
<td>
<label for="FeeTaxes_is_active">Is Active</label>
</td>
<td id="status">
<input id="ytFeeTaxes_is_active" value="" name="FeeTaxes[is_active]" type="hidden">
<input id="FeeTaxes_is_active_0" value="1" checked="checked" name="FeeTaxes[is_active]" type="radio">
<label for="FeeTaxes_is_active_0">Active</label>
<input id="FeeTaxes_is_active_1" value="0" name="FeeTaxes[is_active]" type="radio">
<label for="FeeTaxes_is_active_1">Inactive</label>
</td>
</tr>
<tr>
<td> </td>
<td> </td>
</tr>
<tr>
<td> </td>
<td>
<input class="formbut" name="yt0" value="Create" type="submit">
</td>
</tr>
</tbody>
</table>
<div class="row"> </div>
<div class="row"> </div>
<div class="row"> </div>
<div class="row buttons"> </div>
</form>
</div>
</div>
</div>
</td>
</td>
</tr>

</td>
    </tr>
</table>