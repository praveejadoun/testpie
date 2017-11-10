<script language="javascript">
function course()
{
var id = document.getElementById('emp').value;
window.location= 'index.php?r=employees/employeeLeaveTypes/manage&emp='+id;	
}
</script>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employees-subjects-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="formCon">

<div class="formConInner">

    <?php 

$data = CHtml::listData(Employees::model()->findAll("is_deleted =:x", array(':x'=>0),array('order'=>'first_name DESC')),'id','first_name');
if(isset($_REQUEST['emp']))
{
	$sel= $_REQUEST['emp'];
}
else
{
	$sel='';
}
echo '<div style="float:left; width:413px;"><span style="font-size:14px; font-weight:bold; color:#666;margin:0px 30px 0px 74px;">Select Employee</span>&nbsp;&nbsp;&nbsp;&nbsp;';
echo CHtml::dropDownList('id','',$data,array('prompt'=>'Select Employee','onchange'=>'course()','id'=>'emp','style'=>'width:170px !important;','options'=>array($sel=>array('selected'=>true)))); 
echo '</div><br/><br/><br/>';

?>

</div>
</div>


  <div class="emp_right_contner">
    <div class="emp_tabwrapper">   
    <?php // $this->renderPartial('/weekdays/tab_1');?>
    <?php 
        if(!empty($_REQUEST['emp']))
        {
	    $emp_sub = EmployeeLeaveTypes::model()->findAll("status=:x ", array(':x'=>'1'));	
    ?>    
   
 <h3><?php echo Yii::t('employees','Active Leave types');?></h3>
       <div class="tableinnerlist">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
         <th><?php echo Yii::t('employees');?>S.No</th>
         <th><?php echo Yii::t('employees');?>Subject Name</th>
         <th><?php echo Yii::t('employees');?>Total Leaves</th>
         <th><?php echo Yii::t('employees');?>Used Leaves</th>
         <th><?php echo Yii::t('employees');?>Remaining Leaves</th>
         <!--<th><?php echo Yii::t('employees');?>Action</th>-->
      </tr>
      <?php
 
	if(isset($_REQUEST['emp']) and $emp_sub!=NULL)
	{ ?>
     <?php 
  if(isset($_REQUEST['page']))
  {
      $i=($pages->pageSize*$_REQUEST['page'])-9;
  }
  else
  {
	  $i=1;
  }
  ?>
   <?php 
   foreach($emp_sub as $emp_sub_1)
   { 
   ?>
     <tr>
         <td><?php echo $i;?></td>
    <td><?php 
	 
	echo $emp_sub_1->name?></td>
    <td><?php echo $emp_sub_1->max_leave_count; ?></td>
    
     <?php $empattend = EmployeeAttendances::model()->findByAttributes(array('employee_id'=>$_REQUEST['emp'],'employee_leave_type_id'=>$emp_sub_1->id)); 
	if($empattend!=NULL)
	{
		 ?>
		<td><?php echo count($empattend); ?></td> 
	<?php }
	else{?> <td><?php echo 0 ?></td> <?php }?>
    
     <td><?php  $a=$emp_sub_1->max_leave_count;
                $b=count($empattend);
                echo $a-$b;?></td>
        </tr>
        <?php $i++;} ?>
        <?php } else { ?>
        <tr>
            <td colspan="6">Active leavetypes are not available Yet!</td>
        </tr>
        <?php } ?>
    </table>
   </div> 
        
  <h3><?php echo Yii::t('employees','InActive Leave types');?></h3>      
  <?php $emp_sub = EmployeeLeaveTypes::model()->findAll("status=:x ", array(':x'=>0));?>      
               <div class="tableinnerlist">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
         <th><?php echo Yii::t('employees');?>S.No</th>
         <th><?php echo Yii::t('employees');?>Subject Name</th>
         <th><?php echo Yii::t('employees');?>Total Leaves</th>
         <th><?php echo Yii::t('employees');?>Used Leaves</th>
         <th><?php echo Yii::t('employees');?>Remaining Leaves</th>
         <!--<th><?php echo Yii::t('employees');?>Action</th>-->
      </tr>
      <?php
 
	if(isset($_REQUEST['emp']) and $emp_sub!=NULL)
	{ ?>
     <?php 
  if(isset($_REQUEST['page']))
  {
      $i=($pages->pageSize*$_REQUEST['page'])-9;
  }
  else
  {
	  $i=1;
  }
  ?>
   <?php 
   foreach($emp_sub as $emp_sub_1)
   { 
   ?>
     <tr>
         <td><?php echo $i;?></td>
    <td><?php 
	 
	echo $emp_sub_1->name?></td>
    <td><?php echo $emp_sub_1->max_leave_count; ?></td>
    
     <?php $empattend = EmployeeAttendances::model()->findByAttributes(array('employee_id'=>$_REQUEST['emp'],'employee_leave_type_id'=>$emp_sub_1->id)); 
	if($empattend!=NULL)
	{
		 ?>
		<td><?php echo count($empattend); ?></td> 
	<?php }
	else{?> <td><?php echo 0 ?></td> <?php }?>
    
     <td><?php  $a=$emp_sub_1->max_leave_count;
                $b=count($empattend);
                echo $a-$b;?></td>
        </tr>
        <?php $i++;} ?>
        <?php } else { ?>
        <tr>
            <td colspan="6">InActive leavetypes are not available Yet!</td>
        </tr>
<?php }} ?>
    </table>
   </div> 
   </div>
</div>

<?php $this->endWidget(); ?>
<script>
function show()
{
	$("#success").css("display","block").animate({opacity: 1.0}, 3000).fadeOut("slow")
}

</script>