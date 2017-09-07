

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
	{  
        $weekday= TimetableEntries::model()->findAll('employee_id=:x',array(':x'=>$_REQUEST['tea']));
        ?>
        <div class="pdtab_Con" style="text-align:center">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered mb30">
                    <tbody>
                        <!-- Sunday Start-->
                        <tr>
                            <td colspan="4">
                                <strong>Sunday</strong>
                            </td>
                        </tr>
                      
                        <tr class="pdtab-h">
                            <td style="text-align:center;">ClassTiming</td>
                            <td style="text-align:center;">Course</td>
                            <td style="text-align:center;">Batch Name</td>
                            <td style="text-align:center;">Subject</td>
                        </tr>
                         <?php 
                        foreach($weekday as $weekday_1){
                        $classtiming= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday_1->class_timing_id));
                        $batch=Batches::model()->findAll('id=:x',array(':x'=>$weekday_1->batch_id));
                        $subject=Subjects::model()->findAll('id=:x',array(':x'=>$weekday_1->subject_id));
                        foreach($classtiming as $classtiming_1){
                            if($weekday_1->weekday_id==1){
                                echo '<tr>';
                                echo '<td>'.$classtiming_1->start_time.'-'.$classtiming_1->end_time.'</td>';
                                foreach($batch as $batch_1){
                                echo '<td>'.$batch_1->name.'</td>';
                                 $course=Courses::model()->findAll('id=:x',array(':x'=>$batch_1->course_id));
                                 foreach($course as $course_1){
                                echo '<td>'.$course_1->course_name.'</td>';
                                foreach($subject as $subject_1){
                                echo '<td>'.$subject_1->name.'</td>';    
                                echo '</tr>';
                                
                            }}}}
                           
                        }} ?>
                       
                      
                        <!-- Sunday End -->
                        
                        <!-- Monday Start -->
                         <tr>
                            <td colspan="4">
                                <strong>Monday</strong>
                            </td>
                        </tr>
                        <tr class="pdtab-h">
                            <td style="text-align:center;">ClassTiming</td>
                            <td style="text-align:center;">Batch Name</td>
                            <td style="text-align:center;">Course</td>
                            <td style="text-align:center;">Subject</td>
                        </tr>
                        <?php 
                        foreach($weekday as $weekday_1){
                        $classtiming= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday_1->class_timing_id));
                        $batch=Batches::model()->findAll('id=:x',array(':x'=>$weekday_1->batch_id));
                        $subject=Subjects::model()->findAll('id=:x',array(':x'=>$weekday_1->subject_id));
                        foreach($classtiming as $classtiming_1){
                            if($weekday_1->weekday_id==2){
                                echo '<tr>';
                                echo '<td>'.$classtiming_1->start_time.'-'.$classtiming_1->end_time.'</td>';
                                foreach($batch as $batch_1){
                                echo '<td>'.$batch_1->name.'</td>';
                                 $course=Courses::model()->findAll('id=:x',array(':x'=>$batch_1->course_id));
                                 foreach($course as $course_1){
                                echo '<td>'.$course_1->course_name.'</td>';
                                foreach($subject as $subject_1){
                                echo '<td>'.$subject_1->name.'</td>';    
                                echo '</tr>';
                                
                            }}}}
                           
                        }} ?>
                      
                        <!-- Monday End-->
                        
                        <!-- Tuesday Start-->
                         <tr>
                            <td colspan="4">
                                <strong>Tuesday</strong>
                            </td>
                        </tr>
                        <tr class="pdtab-h">
                            <td style="text-align:center;">ClassTiming</td>
                            <td style="text-align:center;">Course</td>
                            <td style="text-align:center;">Batch Name</td>
                            <td style="text-align:center;">Subject</td>
                        </tr>
                         <?php 
                        foreach($weekday as $weekday_1){
                        $classtiming= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday_1->class_timing_id));
                        $batch=Batches::model()->findAll('id=:x',array(':x'=>$weekday_1->batch_id));
                        $subject=Subjects::model()->findAll('id=:x',array(':x'=>$weekday_1->subject_id));
                        foreach($classtiming as $classtiming_1){
                            if($weekday_1->weekday_id==3){
                                echo '<tr>';
                                echo '<td>'.$classtiming_1->start_time.'-'.$classtiming_1->end_time.'</td>';
                                foreach($batch as $batch_1){
                                echo '<td>'.$batch_1->name.'</td>';
                                 $course=Courses::model()->findAll('id=:x',array(':x'=>$batch_1->course_id));
                                 foreach($course as $course_1){
                                echo '<td>'.$course_1->course_name.'</td>';
                                foreach($subject as $subject_1){
                                echo '<td>'.$subject_1->name.'</td>';    
                                echo '</tr>';
                                
                            }}}}
                           
                        }} ?>
                        <!-- Tuesday End -->
                        
                        <!-- Wednesday Start-->
                         <tr>
                            <td colspan="4">
                                <strong>Wednesday</strong>
                            </td>
                        </tr>
                        <tr class="pdtab-h">
                            <td style="text-align:center;">ClassTiming</td>
                            <td style="text-align:center;">Course</td>
                            <td style="text-align:center;">Batch Name</td>
                            <td style="text-align:center;">Subject</td>
                        </tr>
                         <?php 
                        foreach($weekday as $weekday_1){
                        $classtiming= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday_1->class_timing_id));
                        $batch=Batches::model()->findAll('id=:x',array(':x'=>$weekday_1->batch_id));
                        $subject=Subjects::model()->findAll('id=:x',array(':x'=>$weekday_1->subject_id));
                        foreach($classtiming as $classtiming_1){
                            if($weekday_1->weekday_id==4){
                                echo '<tr>';
                                echo '<td>'.$classtiming_1->start_time.'-'.$classtiming_1->end_time.'</td>';
                                foreach($batch as $batch_1){
                                echo '<td>'.$batch_1->name.'</td>';
                                 $course=Courses::model()->findAll('id=:x',array(':x'=>$batch_1->course_id));
                                 foreach($course as $course_1){
                                echo '<td>'.$course_1->course_name.'</td>';
                                foreach($subject as $subject_1){
                                echo '<td>'.$subject_1->name.'</td>';    
                                echo '</tr>';
                                
                            }}}}
                           
                        }} ?>
                        <!-- Wednesday End -->
                        
                         <!-- Thursday Start-->
                         <tr>
                            <td colspan="4">
                                <strong>Thursday</strong>
                            </td>
                        </tr>
                        <tr class="pdtab-h">
                            <td style="text-align:center;">ClassTiming</td>
                            <td style="text-align:center;">Course</td>
                            <td style="text-align:center;">Batch Name</td>
                            <td style="text-align:center;">Subject</td>
                        </tr>
                        <?php 
                        foreach($weekday as $weekday_1){
                        $classtiming= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday_1->class_timing_id));
                        $batch=Batches::model()->findAll('id=:x',array(':x'=>$weekday_1->batch_id));
                        $subject=Subjects::model()->findAll('id=:x',array(':x'=>$weekday_1->subject_id));
                        foreach($classtiming as $classtiming_1){
                            if($weekday_1->weekday_id==5){
                                echo '<tr>';
                                echo '<td>'.$classtiming_1->start_time.'-'.$classtiming_1->end_time.'</td>';
                                foreach($batch as $batch_1){
                                echo '<td>'.$batch_1->name.'</td>';
                                 $course=Courses::model()->findAll('id=:x',array(':x'=>$batch_1->course_id));
                                 foreach($course as $course_1){
                                echo '<td>'.$course_1->course_name.'</td>';
                                foreach($subject as $subject_1){
                                echo '<td>'.$subject_1->name.'</td>';    
                                echo '</tr>';
                                
                            }}}}
                           
                        }} ?>
                        <!-- Thursday End -->
                        
                         <!-- Friday Start-->
                         <tr>
                            <td colspan="4">
                                <strong>Friday</strong>
                            </td>
                        </tr>
                        <tr class="pdtab-h">
                            <td style="text-align:center;">ClassTiming</td>
                            <td style="text-align:center;">Course</td>
                            <td style="text-align:center;">Batch Name</td>
                            <td style="text-align:center;">Subject</td>
                        </tr>
                         <?php 
                        foreach($weekday as $weekday_1){
                        $classtiming= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday_1->class_timing_id));
                        $batch=Batches::model()->findAll('id=:x',array(':x'=>$weekday_1->batch_id));
                        $subject=Subjects::model()->findAll('id=:x',array(':x'=>$weekday_1->subject_id));
                        foreach($classtiming as $classtiming_1){
                            if($weekday_1->weekday_id==6){
                                echo '<tr>';
                                echo '<td>'.$classtiming_1->start_time.'-'.$classtiming_1->end_time.'</td>';
                                foreach($batch as $batch_1){
                                echo '<td>'.$batch_1->name.'</td>';
                                 $course=Courses::model()->findAll('id=:x',array(':x'=>$batch_1->course_id));
                                 foreach($course as $course_1){
                                echo '<td>'.$course_1->course_name.'</td>';
                                foreach($subject as $subject_1){
                                echo '<td>'.$subject_1->name.'</td>';    
                                echo '</tr>';
                                
                            }}}}
                           
                        }} ?>
                        <!-- Friday End -->
                        
                         <!-- Saturday Start-->
                         <tr>
                            <td colspan="4">
                                <strong>Saturday</strong>
                            </td>
                        </tr>
                        <tr class="pdtab-h">
                            <td style="text-align:center;">ClassTiming</td>
                            <td style="text-align:center;">Course</td>
                            <td style="text-align:center;">Batch Name</td>
                            <td style="text-align:center;">Subject</td>
                        </tr>
                        <?php 
                        foreach($weekday as $weekday_1){
                        $classtiming= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday_1->class_timing_id));
                        $batch=Batches::model()->findAll('id=:x',array(':x'=>$weekday_1->batch_id));
                        $subject=Subjects::model()->findAll('id=:x',array(':x'=>$weekday_1->subject_id));
                        foreach($classtiming as $classtiming_1){
                            if($weekday_1->weekday_id==7){
                                echo '<tr>';
                                echo '<td>'.$classtiming_1->start_time.'-'.$classtiming_1->end_time.'</td>';
                                foreach($batch as $batch_1){
                                echo '<td>'.$batch_1->name.'</td>';
                                 $course=Courses::model()->findAll('id=:x',array(':x'=>$batch_1->course_id));
                                 foreach($course as $course_1){
                                echo '<td>'.$course_1->course_name.'</td>';
                                foreach($subject as $subject_1){
                                echo '<td>'.$subject_1->name.'</td>';    
                                echo '</tr>';
                                
                            }}}}
                           
                        }} ?>
                        <!-- Saturday End -->
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