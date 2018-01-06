

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

<script language="javascript">
function electivebatch()
{
var id = document.getElementById('bid').value;
window.location= 'index.php?r=employees/employeesSubjects/create&bid='+id;	
}
function electivesubject()
{
var id_1 = document.getElementById('bid').value;
var id = document.getElementById('elect').value;
window.location= 'index.php?r=employees/employeesSubjects/create&bid='+id_1+'&elect='+id;	
}
function department()
{
var id_1 = document.getElementById('bid').value;
var id = document.getElementById('elect').value;
var dep = document.getElementById('depar').value;
window.location= 'index.php?r=employees/employeesSubjects/create&bid='+id_1+'&elect='+id+'&dep='+dep;		
}
</script>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employees-subjects-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="formCon">

<div class="formConInner">
    <?php 

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
	
	/*$data_1=Subjects::model()->findAll(array('join' => 'JOIN batches ON batch_id = batches.id','condition'=>'batches.course_id=:id', 
                  'params'=>array(':id'=>(int) $_REQUEST['cou'])));*/
	$data_1 = CHtml::listData(Subjects::model()->findAll(array('join' => 'JOIN batches ON batch_id = batches.id','condition'=>'batches.course_id=:id', 
                  'params'=>array(':id'=>(int) $_REQUEST['cou']))),'id','name','batch_id');			  
				  
	 
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
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
         <th><?php echo Yii::t('employees','');?>Employee Name</th>
         <th><?php echo Yii::t('employees','');?>Department</th>
         <th><?php echo Yii::t('employees','');?>Action</th>
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

}

?>

<div style="padding-top:20px;">
    <div style="border:1px solid #CCCCCC;margin:0px 0px 20px 0px"></div>
   
    
    <h3>Elective Subjects</h3> 
    
  <div class="formCon">

<div class="formConInner">  
    
    
    
    <?php 

$elec_batch = CHtml::listData(Batches::model()->findAll("is_deleted 	=:x", array(':x'=>0),array('order'=>'name DESC')),'id','name');
if(isset($_REQUEST['bid']))
{
	$sel_3= $_REQUEST['bid'];
}
else
{
	$sel_3='';
}
echo '<div style="float:left; width:380px;"><span style="font-size:14px; font-weight:bold; color:#666;">Batch</span>&nbsp;&nbsp;&nbsp;&nbsp;';
echo CHtml::dropDownList('id','',$elec_batch,array('prompt'=>'Select','onchange'=>'electivebatch()','id'=>'bid','options'=>array($sel_3=>array('selected'=>true)))); 
echo '</div>';
echo '<div style="float:left; width:300px;"><span style="font-size:14px; font-weight:bold; color:#666;">Subject</span>&nbsp;&nbsp;'; ?>


<?php 
$elec_batch_1= array();
if(isset($_REQUEST['bid']))
{
    
    $elec_batch_1 = CHtml::listData(Electives::model()->findAll("batch_id 	=:x", array(':x'=>$_REQUEST['bid']),array('order'=>'name DESC')),'id','name');
	
	
	/*$data_1=Subjects::model()->findAll(array('join' => 'JOIN batches ON batch_id = batches.id','condition'=>'batches.course_id=:id', 
                  'params'=>array(':id'=>(int) $_REQUEST['cou'])));*/
			  
	 
}
if(isset($_REQUEST['elect']))
{
 $sel_4 = $_REQUEST['elect'];	
}
else
{
	$sel_4 ='';
}
echo CHtml::dropDownList('elect','',$elec_batch_1,array('prompt'=>'Select','onchange'=>'electivebatch()','id'=>'elect','onchange'=>'electivesubject()','options'=>array($sel_4=>array('selected'=>true)))); 
 
echo '<br/></div><div class="clear"></div>';

  
 ?>
    </div>
  </div>
<?php 
if(isset($_REQUEST['elect']))
{
	
$emp_sub_2 = EmployeesSubjects::model()->findAll("elective_id=:x", array(':x'=>$_REQUEST['elect']));	

	if(count($emp_sub_2)==0)
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
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
         <th><?php echo Yii::t('employees','');?>Employee Name</th>
         <th><?php echo Yii::t('employees','');?>Department</th>
         <th><?php echo Yii::t('employees','');?>Action</th>
      </tr>
    
   <?php if((!isset($_REQUEST['dep'])) or (isset($_REQUEST['dep']) and $_REQUEST['dep']==NULL))
   {
	   $_REQUEST['dep']='';
	   
   }
   foreach($emp_sub_2 as $emp_sub_2_1)
   { 
   ?>
     <tr>
    <td><?php 
	 $emp_name_1 = Employees::model()->findByAttributes(array('id'=>$emp_sub_2_1->employee_id));
	echo $emp_name_1->first_name.'  '.$emp_name_1->middle_name.'  '.$emp_name_1->last_name?></td>
    <?php $electivebatch = EmployeeDepartments::model()->findByAttributes(array('id'=>$emp_name_1->employee_department_id)); 
	if($electivebatch!=NULL)
	{
		 ?>
		<td><?php echo $electivebatch->name; ?></td> 
	<?php }
	else{?> <td>-</td> <?php }?>
    <td><?php echo CHtml::link(Yii::t('employees','Remove'), array('deleterowelective', 'id'=>$emp_sub_2_1->id,'elect'=>$_REQUEST['elect'],'bid'=>$_REQUEST['bid'],'dep'=>$_REQUEST['dep']), array('confirm' => 'Are you sure?','onclick'=>"show()")); ?></td>
    </tr>
    <?php } ?>
    </table>
   </div>
    <?php
	
	}
	
	echo '<br><span style="font-size:14px; font-weight:bold; color:#666;">Departments</span>&nbsp;&nbsp;';

	if(isset($_REQUEST['dep']))
	{
		$sel_5 = $_REQUEST['dep'];	
	}
	else
	{
		$sel_5 = '';	
	}

echo CHtml::dropDownList('dep','',CHtml::listData(EmployeeDepartments::model()->findAll(),'id','name'),array('prompt'=>'Select','id'=>'depar','onchange'=>'department()','options'=>array($sel_5=>array('selected'=>true))));
	

echo '<br>';
if(isset($_REQUEST['dep']) and $_REQUEST['dep']!=NULL)
{
	$employee_1 = $model->Employeenotassignedelective($_REQUEST['dep'],$_REQUEST['elect']);
	
	//$employee_subjects = EmployeesSubjects::models()->findAll("employee_id=:x", array(':x'=>$_REQUEST['dept']));
	//echo count($employee);
	//exit;
	
	if(count($employee_1)!=0)
	{?>
    <h3><?php echo Yii::t('employees','Assign New:');?></h3>
      <div class="tableinnerlist">
     <table width="100%" cellpadding="0" cellspacing="0">
     <tr>
         <th><?php echo Yii::t('employees','Employee Name');?></th>
         <th><?php echo Yii::t('employees','Action');?></th>
      </tr>

    <?php   
	foreach($employee_1 as $employee_2)
	{
		echo '<tr>';
	    echo '<td>'.$employee_2['first_name'].'  '.$employee_2['middle_name'].'  '.$employee_2['last_name'].'</td>';
		echo '<td>'.CHtml::link(Yii::t('employees','Assign'), array('employeesSubjects/AssignElective', 'emp_id_1'=>$employee_2['id'],'elect'=>$_REQUEST['elect'],'bid'=>$_REQUEST['bid'],'dep'=>$_REQUEST['dep']), array('confirm' => 'Are you sure?')).'</td>'; 	
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

}

?>
    </div>

   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

<?php $this->endWidget(); ?>
<script>
function show()
{
	$("#success").css("display","block").animate({opacity: 1.0}, 3000).fadeOut("slow")
}

</script>