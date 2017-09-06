

<script language="javascript">
function department()
{
var id = document.getElementById('dep').value;
window.location= 'index.php?r=timetable/teacherstimetable/index&dep='+id;	
}
function teacher()
{
var id_1 = document.getElementById('dep').value;
var id = document.getElementById('tea').value;
window.location= 'index.php?r=timetable/teacherstimetable/index&dep='+id_1+'&tea='+id;	
}
function departme()
{
var id_1 = document.getElementById('cou').value;
var id = document.getElementById('sub').value;
var dep = document.getElementById('depart').value;
window.location= 'index.php?r=employees/employeesSubjects/create&cou='+id_1+'&sub='+id+'&dept='+dep;		
}
</script>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employees-subjects-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="formCon">

<div class="formConInner">

    <?php 

$data = CHtml::listData(EmployeeDepartments::model()->findAll("status 	=:x", array(':x'=>1),array('order'=>'name DESC')),'id','name');
if(isset($_REQUEST['dep']))
{
	$sel= $_REQUEST['dep'];
}
else
{
	$sel='';
}
echo '<div style="float:left; width:413px;"><span style="font-size:14px; font-weight:bold; color:#666;margin:0px 30px 0px 74px;">Select Department</span>&nbsp;&nbsp;&nbsp;&nbsp;';
echo CHtml::dropDownList('id','',$data,array('prompt'=>'Select Department','onchange'=>'department()','id'=>'dep','style'=>'height:auto;width:auto;','options'=>array($sel=>array('selected'=>true)))); 
echo '</div><br/><br/><br/>';
echo '<div style="float:left; width:350px;"><span style="font-size:14px; font-weight:bold; color:#666;margin:0px 42px 0px 75px;">Select Teacher</span>&nbsp;&nbsp;'; ?>


<?php 
$batches= array();
if(isset($_REQUEST['dep']))
{
	$employees = CHtml::listData(Employees::model()->findAll("employee_department_id=:x and is_deleted=:y", array(':x'=>$_REQUEST['dep'],':y'=>0),array('order'=>'name DESC')),'id','first_name');
	
	/*$data_1=Subjects::model()->findAll(array('join' => 'JOIN batches ON batch_id = batches.id','condition'=>'batches.course_id=:id', 
                  'params'=>array(':id'=>(int) $_REQUEST['cou'])));*/
	///$data_1 = CHtml::listData(Subjects::model()->findAll(array('join' => 'JOIN batches ON batch_id = batches.id','condition'=>'batches.course_id=:id', 
                 // 'params'=>array(':id'=>(int) $_REQUEST['cou']))),'id','batchname');			  
				  
	 
}
if(isset($_REQUEST['tea']))
{
 $sel_1 = $_REQUEST['tea'];	
}
else
{
	$sel_1 ='';
}
echo CHtml::dropDownList('tea','',$employees,array('prompt'=>'Select','onchange'=>'department()','id'=>'tea','onchange'=>'teacher()','options'=>array($sel_1=>array('selected'=>true)))); 
 
echo '<br/></div><div class="clear"></div>';

  
 ?>
</div>
</div>
<?php /*
if(isset($_REQUEST['bat']))
{
	
$employee = $model->Employeenotassigned($_REQUEST['dept'],$_REQUEST['sub']);
		
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
*/
?>

  <div class="emp_right_contner">
    <div class="emp_tabwrapper">   
    <?php //$this->renderPartial('/weekdays/tab_1');?>
      <?php
 
	if(isset($_REQUEST['tea']) and $_REQUEST['tea']!=NULL)
	{ ?>
        <div class="pdtab_Con" style="text-align:center">
       <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered mb30">
                    <tbody>
                        <?php 
                               $weekday= TimetableEntries::model()->findAll('employee_id=:x',array(':x'=>$_REQUEST['tea']));?>
                               
                    	                       			  <tr>
                                    	<td colspan="4">
											<strong>SUNDAY</strong>                                 		</td>
                                     </tr>
                            <tr class="pdtab-h">
                                      
                                        <td style="text-align:center"><strong>Class Timing</strong></td>
                                        <td style="text-align:center"><strong>Course</strong></td>
                                        <td align="center"><strong>Batch Name</strong></td>
                                        <td align="center"><strong>Subject</strong></td>
                                        
                         	</tr>
                        
                                 <?php
                                foreach($weekday as $weekday_1){
                                 $classtiming= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday_1->class_timing_id));
                                 if($weekday_1->weekday_id==1){?>
                                   ech
                                 <tr id="timetablerow4">
                                     <td style="text-align:center;"><?php echo $classtiming->start_time; ?></td>
                                     <td>Science/Engineering</td>
                                     <td>Electrical Engineering</td>
                                     <td><?php echo $weekday_1->subject_id; ?></td>
                                 </tr>
                               <?php }  else { ?>
                                  
                                 <tr><td colspan="4"><i>No Timetable is set for this Teacher!</i></td></tr> 
                                <?php } }?>
                                 <tr>
                                    	<td colspan="4">
											<strong>MONDAY</strong>                                 		</td>
                                     </tr>
                            <tr class="pdtab-h">
                                      
                                        <td style="text-align:center"><strong>Class Timing</strong></td>
                                        <td style="text-align:center"><strong>Course</strong></td>
                                        <td align="center"><strong>Batch Name</strong></td>
                                        <td align="center"><strong>Subject</strong></td>
                                        
                         	</tr>
                        
                                 
                                 <?php
                                $weekday1= TimetableEntries::model()->findAll('employee_id=:x',array(':x'=>$_REQUEST['tea']));
                                  foreach($weekday1 as $weekday1_1){
                                 $batch1 = Batches::model()->findAll('id=:x',array(':x'=>$weekday1_1->batch_id));
                                 $subject1= Subjects::model()->findAll('id=:x',array(':x'=>$weekday1_1->subject_id));
                                $classtiming1= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday1_1->class_timing_id));

                                 if($weekday1_1->weekday_id==2){?>	
                                  
                                 <tr id="timetablerow4">
                                     <td style="text-align:center;"><?php foreach($classtiming1 as $classtiming1_1){ echo $classtiming1_1->start_time.'-' .$classtiming1_1->end_time;} ?></td>
                                     <td>Science/Engineering</td>
                                     <td><?php foreach($batch1 as $batch1_1){ echo $batch1_1->name;} ?></td>
                                     <td><?php foreach($subject1 as $subject1_1){ echo $subject1_1->name;}?></td>
                                 </tr>
                                     <?php }else {?>
                                  <tr><td colspan="4"><i>No Timetable is set for this Teacher!</i></td></tr> 
                                  <?php }} ?>
                                  <tr>
                                    	<td colspan="4">
											<strong>TUESDAY</strong>                                 		</td>
                                     </tr>
                            <tr class="pdtab-h">
                                      
                                        <td style="text-align:center"><strong>Class Timing</strong></td>
                                        <td style="text-align:center"><strong>Course</strong></td>
                                        <td align="center"><strong>Batch Name</strong></td>
                                        <td align="center"><strong>Subject</strong></td>
                                        
                         	</tr>
                         <?php
                                $weekday2= TimetableEntries::model()->findAll('employee_id=:x',array(':x'=>$_REQUEST['tea']));
                                  foreach($weekday2 as $weekday2_1){
                                 $batch2 = Batches::model()->findAll('id=:x',array(':x'=>$weekday2_1->batch_id));
                                 $subject2= Subjects::model()->findAll('id=:x',array(':x'=>$weekday2_1->subject_id));
                                $classtiming2= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday2_1->class_timing_id));
                              
                                 if($weekday2_1->weekday_id==3){ ?>
                                 <tr id="timetablerow4">
                                     <td style="text-align:center;"><?php foreach($classtiming2 as $classtiming2_1){ echo $classtiming2_1->start_time.'-' .$classtiming2_1->end_time;} ?></td>
                                     <td>Science/Engineering</td>
                                     <td><?php foreach($batch2 as $batch2_1){ echo $batch2_1->name;} ?></td>
                                     <td><?php foreach($subject2 as $subject2_1){ echo $subject2_1->name;}?></td>
                                 </tr>
                                     <?php }else {?>
                                  <tr><td colspan="4"><i>No Timetable is set for this Teacher!</i></td></tr> 
                                  <?php }} ?>
                                 
                                 	
                                <tr>
                                    	<td colspan="4">
											<strong>WEDNESDAY</strong>                                 		</td>
                                     </tr>
                            <tr class="pdtab-h">
                                      
                                        <td style="text-align:center"><strong>Class Timing</strong></td>
                                        <td style="text-align:center"><strong>Course</strong></td>
                                        <td align="center"><strong>Batch Name</strong></td>
                                        <td align="center"><strong>Subject</strong></td>
                                        
                         	</tr>
                         <?php
                                $weekday3= TimetableEntries::model()->findAll('employee_id=:x',array(':x'=>$_REQUEST['tea']));
                                  foreach($weekday3 as $weekday3_1){
                                 $batch3 = Batches::model()->findAll('id=:x',array(':x'=>$weekday3_1->batch_id));
                                 $subject3= Subjects::model()->findAll('id=:x',array(':x'=>$weekday3_1->subject_id));
                                $classtiming3= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday3_1->class_timing_id));

                                 if($weekday3_1->weekday_id==4){?>	
                                  
                                 <tr id="timetablerow4">
                                     <td style="text-align:center;"><?php foreach($classtiming3 as $classtiming3_1){ echo $classtiming3_1->start_time.'-' .$classtiming3_1->end_time;} ?></td>
                                     <td>Science/Engineering</td>
                                     <td><?php foreach($batch3 as $batch3_1){ echo $batch3_1->name;} ?></td>
                                     <td><?php foreach($subject3 as $subject3_1){ echo $subject3_1->name;}?></td>
                                 </tr>
                                     <?php }else {?>
                                  <tr><td colspan="4"><i>No Timetable is set for this Teacher!</i></td></tr> 
                                  <?php }} ?>
                                 
                                 	
                                    <tr>
                                    	<td colspan="4">
											<strong>THURSDAY</strong>                                 		</td>
                                     </tr>
                            <tr class="pdtab-h">
                                      
                                        <td style="text-align:center"><strong>Class Timing</strong></td>
                                        <td style="text-align:center"><strong>Course</strong></td>
                                        <td align="center"><strong>Batch Name</strong></td>
                                        <td align="center"><strong>Subject</strong></td>
                                        
                         	</tr>
                        
                                  <?php
                                $weekday4= TimetableEntries::model()->findAll('employee_id=:x',array(':x'=>$_REQUEST['tea']));
                                  foreach($weekday4 as $weekday4_1){
                                 $batch4 = Batches::model()->findAll('id=:x',array(':x'=>$weekday4_1->batch_id));
                                 $subject4= Subjects::model()->findAll('id=:x',array(':x'=>$weekday4_1->subject_id));
                                $classtiming4= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday4_1->class_timing_id));

                                 if($weekday4_1->weekday_id==5){?>	
                                  
                                 <tr id="timetablerow4">
                                     <td style="text-align:center;"><?php foreach($classtiming4 as $classtiming4_1){ echo $classtiming4_1->start_time.'-' .$classtiming4_1->end_time;} ?></td>
                                     <td>Science/Engineering</td>
                                     <td><?php foreach($batch4 as $batch4_1){ echo $batch4_1->name;} ?></td>
                                     <td><?php foreach($subject4 as $subject4_1){ echo $subject4_1->name;}?></td>
                                 </tr>
                                     <?php }else {?>
                                  <tr><td colspan="4"><i>No Timetable is set for this Teacher!</i></td></tr> 
                                  <?php }} ?>
                                 	
                                <tr>
                                    	<td colspan="4">
											<strong>FRIDAY</strong>                                 		</td>
                                     </tr>
                            <tr class="pdtab-h">
                                      
                                        <td style="text-align:center"><strong>Class Timing</strong></td>
                                        <td style="text-align:center"><strong>Course</strong></td>
                                        <td align="center"><strong>Batch Name</strong></td>
                                        <td align="center"><strong>Subject</strong></td>
                                        
                         	</tr>
                         <?php
                                $weekday5= TimetableEntries::model()->findAll('employee_id=:x',array(':x'=>$_REQUEST['tea']));
                                  foreach($weekday5 as $weekday5_1){
                                 $batch5 = Batches::model()->findAll('id=:x',array(':x'=>$weekday5_1->batch_id));
                                 $subject5= Subjects::model()->findAll('id=:x',array(':x'=>$weekday5_1->subject_id));
                                $classtiming5= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday5_1->class_timing_id));

                                 if($weekday5_1->weekday_id==6){?>	
                                  
                                 <tr id="timetablerow4">
                                     <td style="text-align:center;"><?php foreach($classtiming5 as $classtiming5_1){ echo $classtiming5_1->start_time.'-' .$classtiming5_1->end_time;} ?></td>
                                     <td>Science/Engineering</td>
                                     <td><?php foreach($batch5 as $batch5_1){ echo $batch5_1->name;} ?></td>
                                     <td><?php foreach($subject5 as $subject5_1){ echo $subject2_1->name;}?></td>
                                 </tr>
                                     <?php }else {?>
                                  <tr><td colspan="4"><i>No Timetable is set for this Teacher!</i></td></tr> 
                                  <?php }} ?>
                                 
                                 	
                                  
                                                    
                      
                               
                             
					</tbody>
				</table>                                            
      	
	</div>
        <?php } ?>
  </div>
</div>
    
 


<?php $this->endWidget(); ?>
<script>
function show()
{
	$("#success").css("display","block").animate({opacity: 1.0}, 3000).fadeOut("slow")
}

</script>