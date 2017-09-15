<?php
$this->breadcrumbs=array(
	'Weekdays'=>array('index'),
	'Manage',
);
?>
<style>
#table{
	border-top:1px #CCC solid;
	/*margin:30px 30px;*/
	border-right:1px #CCC solid;
}
.timetable td{
	border-left:1px #CCC solid;
	padding:10px 10px 10px 10px;
	border-bottom:1px #CCC solid;
	width:10px;
	min-width:10px;
	font-size:11px;
	text-align:center;
}

</style>
<div class="atnd_Con" style="padding-left:20px; padding-top:30px;">
	<?php
	if(isset($_REQUEST['id']) and $_REQUEST['id']!=NULL)
	{
	?> 
        <!-- Header -->
        <div style="border-bottom:#666 1px; width:700px; padding-bottom:20px;">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="first">
                               <?php $logo=Logo::model()->findAll();?>
                                <?php
                                if($logo!=NULL)
                                {
                                    //Yii::app()->runController('Configurations/displayLogoImage/id/'.$logo[0]->primaryKey);
                                    echo '<img src="uploadedfiles/school_logo/'.$logo[0]->photo_file_name.'" alt="'.$logo[0]->photo_file_name.'" class="imgbrder" width="100%" />';
                                }
                                ?>
                    </td>
                    <td align="center" valign="middle" class="first" style="width:300px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="listbxtop_hdng first" style="text-align:left; font-size:22px; width:300px;  padding-left:10px;">
                                    <?php $college=Configurations::model()->findAll(); ?>
                                    <?php echo $college[0]->config_value; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="listbxtop_hdng first" style="text-align:left; font-size:14px; padding-left:10px;">
                                    <?php echo $college[1]->config_value; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="listbxtop_hdng first" style="text-align:left; font-size:14px; padding-left:10px;">
                                    <?php echo 'Phone: '.$college[2]->config_value; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <!-- End Header --> 
        <br /><br />
    <span align="center"><h4>CLASS TIME TABLE</h4></span>
    <!-- Course details -->
    <div style="border:#CCC 1px; width:700px; padding:10px 10px; background:#E1EAEF;">
        <table style="font-size:14px;">
            <?php $employee = Employees::model()->findByAttributes(array('id'=>$_REQUEST['id']));
                 
            ?>
            <tr>
                <td><b>Employee Name</b></td>
                <td style="width:10px;">:</td>
                <td style="width:250px;"><?php echo $employee->first_name.' '.$employee->last_name; ?></td>
            
                <td><b>Employee Number</b></td>
                <td style="width:10px;">:</td>
                <td><?php echo $employee->employee_number; ?></td>
            </tr>
           
           
        </table>
    </div>
    <?php 
    $weekday= TimetableEntries::model()->findAll('employee_id=:x',array(':x'=>$_REQUEST['id']));
     ?>
     <div style="border-collapse:collapse;width:1000px;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                    <tbody>
                        <!-- Sunday Start-->
                       
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td colspan="4" >
                                <strong>Sunday</strong>
                            </td>
                        </tr>
                        <tr style="background-color:#E1EAEF;">
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">ClassTiming</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Course</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Batch Name</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Subject</td>
                        </tr>
                         <?php 
                        foreach($weekday as $weekday_1){
                        $classtiming= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday_1->class_timing_id));
                        $batch=Batches::model()->findAll('id=:x',array(':x'=>$weekday_1->batch_id));
                        $subject=Subjects::model()->findAll('id=:x',array(':x'=>$weekday_1->subject_id));
                        foreach($classtiming as $classtiming_1){
                            if($weekday_1->weekday_id==1){
                                echo '<tr>';
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$classtiming_1->start_time.'-'.$classtiming_1->end_time.'</td>';
                                foreach($batch as $batch_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$batch_1->name.'</td>';
                                 $course=Courses::model()->findAll('id=:x',array(':x'=>$batch_1->course_id));
                                 foreach($course as $course_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$course_1->course_name.'</td>';
                                foreach($subject as $subject_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$subject_1->name.'</td>';    
                                echo '</tr>';
                                
                            }}}}
                           
                        }} ?>
                       
                      
                        <!-- Sunday End -->
                        <tr><td>&nbsp;</td></tr>
                        <!-- Monday Start -->
                        
                         <tr>
                            <td colspan="4" >
                                <strong>Monday</strong>
                            </td>
                        </tr>
                        <tr style="background-color:#E1EAEF;">
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">ClassTiming</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Batch Name</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Course</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Subject</td>
                        </tr>
                        <?php 
                        foreach($weekday as $weekday_1){
                        $classtiming= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday_1->class_timing_id));
                        $batch=Batches::model()->findAll('id=:x',array(':x'=>$weekday_1->batch_id));
                        $subject=Subjects::model()->findAll('id=:x',array(':x'=>$weekday_1->subject_id));
                        foreach($classtiming as $classtiming_1){
                            if($weekday_1->weekday_id==2){
                                echo '<tr>';
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$classtiming_1->start_time.'-'.$classtiming_1->end_time.'</td>';
                                foreach($batch as $batch_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$batch_1->name.'</td>';
                                 $course=Courses::model()->findAll('id=:x',array(':x'=>$batch_1->course_id));
                                 foreach($course as $course_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$course_1->course_name.'</td>';
                                foreach($subject as $subject_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$subject_1->name.'</td>';    
                                echo '</tr>';
                                
                            }}}}
                           
                        }} ?>
                      
                        <!-- Monday End-->
                        <tr><td>&nbsp;</td></tr>
                        <!-- Tuesday Start-->
                         <tr>
                            <td colspan="4">
                                <strong>Tuesday</strong>
                            </td>
                        </tr>
                        <tr style="background-color:#E1EAEF;">
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">ClassTiming</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Course</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Batch Name</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Subject</td>
                        </tr>
                         <?php 
                        foreach($weekday as $weekday_1){
                        $classtiming= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday_1->class_timing_id));
                        $batch=Batches::model()->findAll('id=:x',array(':x'=>$weekday_1->batch_id));
                        $subject=Subjects::model()->findAll('id=:x',array(':x'=>$weekday_1->subject_id));
                        foreach($classtiming as $classtiming_1){
                            if($weekday_1->weekday_id==3){
                                echo '<tr>';
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$classtiming_1->start_time.'-'.$classtiming_1->end_time.'</td>';
                                foreach($batch as $batch_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$batch_1->name.'</td>';
                                 $course=Courses::model()->findAll('id=:x',array(':x'=>$batch_1->course_id));
                                 foreach($course as $course_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$course_1->course_name.'</td>';
                                foreach($subject as $subject_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$subject_1->name.'</td>';    
                                echo '</tr>';
                                
                            }}}}
                           
                        }} ?>
                        <!-- Tuesday End -->
                        <tr><td>&nbsp;</td></tr>
                        <!-- Wednesday Start-->
                         <tr>
                            <td colspan="4">
                                <strong>Wednesday</strong>
                            </td>
                        </tr>
                        <tr style="background-color:#E1EAEF;">
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">ClassTiming</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Course</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Batch Name</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Subject</td>
                        </tr>
                         <?php 
                        foreach($weekday as $weekday_1){
                        $classtiming= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday_1->class_timing_id));
                        $batch=Batches::model()->findAll('id=:x',array(':x'=>$weekday_1->batch_id));
                        $subject=Subjects::model()->findAll('id=:x',array(':x'=>$weekday_1->subject_id));
                        foreach($classtiming as $classtiming_1){
                            if($weekday_1->weekday_id==4){
                                echo '<tr>';
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$classtiming_1->start_time.'-'.$classtiming_1->end_time.'</td>';
                                foreach($batch as $batch_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$batch_1->name.'</td>';
                                 $course=Courses::model()->findAll('id=:x',array(':x'=>$batch_1->course_id));
                                 foreach($course as $course_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$course_1->course_name.'</td>';
                                foreach($subject as $subject_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$subject_1->name.'</td>';    
                                echo '</tr>';
                                
                            }}}}
                           
                        }} ?>
                        <!-- Wednesday End -->
                        <tr><td>&nbsp;</td></tr>
                         <!-- Thursday Start-->
                         <tr>
                            <td colspan="4">
                                <strong>Thursday</strong>
                            </td>
                        </tr>
                        <tr style="background-color:#E1EAEF;">
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">ClassTiming</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Course</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Batch Name</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Subject</td>
                        </tr>
                        <?php 
                        foreach($weekday as $weekday_1){
                        $classtiming= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday_1->class_timing_id));
                        $batch=Batches::model()->findAll('id=:x',array(':x'=>$weekday_1->batch_id));
                        $subject=Subjects::model()->findAll('id=:x',array(':x'=>$weekday_1->subject_id));
                        foreach($classtiming as $classtiming_1){
                            if($weekday_1->weekday_id==5){
                                echo '<tr>';
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$classtiming_1->start_time.'-'.$classtiming_1->end_time.'</td>';
                                foreach($batch as $batch_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$batch_1->name.'</td>';
                                 $course=Courses::model()->findAll('id=:x',array(':x'=>$batch_1->course_id));
                                 foreach($course as $course_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$course_1->course_name.'</td>';
                                foreach($subject as $subject_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$subject_1->name.'</td>';    
                                echo '</tr>';
                                
                            }}}}
                           
                        }} ?>
                        <!-- Thursday End -->
                        <tr><td>&nbsp;</td></tr>
                         <!-- Friday Start-->
                         <tr>
                            <td colspan="4">
                                <strong>Friday</strong>
                            </td>
                        </tr>
                        <tr style="background-color:#E1EAEF;">
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">ClassTiming</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Course</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Batch Name</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Subject</td>
                        </tr>
                         <?php 
                        foreach($weekday as $weekday_1){
                        $classtiming= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday_1->class_timing_id));
                        $batch=Batches::model()->findAll('id=:x',array(':x'=>$weekday_1->batch_id));
                        $subject=Subjects::model()->findAll('id=:x',array(':x'=>$weekday_1->subject_id));
                        foreach($classtiming as $classtiming_1){
                            if($weekday_1->weekday_id==6){
                                echo '<tr>';
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$classtiming_1->start_time.'-'.$classtiming_1->end_time.'</td>';
                                foreach($batch as $batch_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$batch_1->name.'</td>';
                                 $course=Courses::model()->findAll('id=:x',array(':x'=>$batch_1->course_id));
                                 foreach($course as $course_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$course_1->course_name.'</td>';
                                foreach($subject as $subject_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$subject_1->name.'</td>';    
                                echo '</tr>';
                                
                            }}}}
                           
                        }} ?>
                        <!-- Friday End -->
                        <tr><td>&nbsp;</td></tr>
                         <!-- Saturday Start-->
                         <tr>
                            <td colspan="4">
                                <strong>Saturday</strong>
                            </td>
                        </tr>
                        <tr style="background-color:#E1EAEF;">
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">ClassTiming</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Course</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Batch Name</td>
                            <td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">Subject</td>
                        </tr>
                        <?php 
                        foreach($weekday as $weekday_1){
                        $classtiming= ClassTimings::model()->findAll('id=:x',array(':x'=>$weekday_1->class_timing_id));
                        $batch=Batches::model()->findAll('id=:x',array(':x'=>$weekday_1->batch_id));
                        $subject=Subjects::model()->findAll('id=:x',array(':x'=>$weekday_1->subject_id));
                        foreach($classtiming as $classtiming_1){
                            if($weekday_1->weekday_id==7){
                                echo '<tr>';
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$classtiming_1->start_time.'-'.$classtiming_1->end_time.'</td>';
                                foreach($batch as $batch_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$batch_1->name.'</td>';
                                 $course=Courses::model()->findAll('id=:x',array(':x'=>$batch_1->course_id));
                                 foreach($course as $course_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$course_1->course_name.'</td>';
                                foreach($subject as $subject_1){
                                echo '<td style="border: 1px solid #dddddd;padding: 8px;width:18%;text-align: center">'.$subject_1->name.'</td>';    
                                echo '</tr>';
                                
                            }}}}
                           
                        }} ?>
                        <!-- Saturday End -->
                    </tbody>
          </table>
            
        </div>
        <?php } ?>
</div>