<?php
$this->breadcrumbs=array(
	'Student Attentances'=>array('/courses'),
	'Attendance',
);
?>
<style>
.attendance_table{
	border-top:1px #CCC solid;
	margin:30px 0px;
	font-size:9px;
	border-right:1px #CCC solid;
}
.attendance_table td{
	border-left:1px #CCC solid;
	padding:5px 6px;
	border-bottom:1px #CCC solid;
	
}
</style>
<div class="atnd_Con" style="padding-left:20px; padding-top:30px;">
<?php //$batch=Batches::model()->findByAttributes(array('id'=>$_REQUEST['id'])); ?>
    
<?php
function getweek($date,$month,$year)
{
$date = mktime(0, 0, 0,$month,$date,$year); 
$week = date('w', $date); 
switch($week) {
case 0: 
return 'S<br>';
break;
case 1: 
return 'M<br>';
break;
case 2: 
return 'T<br>';
break;
case 3: 
return 'W<br>';
break;
case 4: 
return 'T<br>';
break;
case 5: 
return 'F<br>';
break;
case 6: 
return 'S<br>';
break;
}
}
?>
<?php
//$subjects=Subjects::model()->findAll("batch_id=:x", array(':x'=>$_REQUEST['id']));

//echo CHtml::dropDownList('batch_id','',CHtml::listData(Subjects::model()->findAll("batch_id=:x",array(':x'=>$_REQUEST['id'])), 'id', 'name'), array('empty'=>'Select Type'));

  if(isset($_REQUEST['id']))
  {

	if(!isset($_REQUEST['mon']))
	{
		$mon = date('F');
		$mon_num = date('n');
	}
	else
	{
		$mon = EmployeeAttendances::model()->getMonthname($_REQUEST['mon']);
		$mon_num = $_REQUEST['mon'];
	}
	$num = cal_days_in_month(CAL_GREGORIAN, $mon_num, $_REQUEST['year']); // 31
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
    <span align="center"><h4>EMPLOYEE ATTENDANCE</h4></span>
    <!-- Department details -->
    <div style="border:#CCC 1px; width:700px; padding:10px 10px; background:#E1EAEF;">
        <table style="font-size:14px;">
            <?php 
				$employee = Employees::model()->findByAttributes(array('id'=>$_REQUEST['id']));
            ?>
            <tr>
                <td style="width:100px;"><b>Employee</b></td>
                <td style="width:10px;">:</td>
                <td style="width:250px;"><?php echo $employee->first_name.' '.$employee->last_name; ?></td>
            
                <td><b>Month</b></td>
                <td style="width:10px;">:</td>
                <td><?php echo $mon.' '.$_REQUEST['year']; ?></td>
            </tr>
            <tr>
            	<?php 
				$department = EmployeeDepartments::model()->findByAttributes(array('id'=>$employee->employee_department_id));
				?>
                <td><b>Department</b></td>
                <td>:</td>
                <td colspan="4"><?php echo $department->name; ?></td>
            </tr>
           
        </table>
    </div>
    <!-- END Department details -->
 <table width="100%" cellspacing="0" cellpadding="0" class="attendance_table">
        <tr style="background:#dfdfdf;">
            <?php
            for($i=1;$i<=$num;$i++)
            {
            echo '<td>'.getweek($i,$mon_num,$curr_year).'<span>'.$i.'</span></td>';
            }
            ?>
        </tr>
        <?php 
		$posts=Employees::model()->findByAttributes(array('id'=>$_REQUEST['id']));
        $class = 'class="even"';
        ?>
        <tr <?php echo $class; ?> >
           <?php /*?> <td class="name"><?php echo $posts->first_name; ?></td><?php */?>
            <?php
            for($i=1;$i<=$num;$i++)
            {
            echo '<td style="height:10px;">';
            /*$find = StudentAttentance::model()->findAll("date=:x AND student_id=:y", array(':x'=>$curr_year.$mon_num.'-'.$i,':y'=>$posts->id));*/
            $find = EmployeeAttendances::model()->findAll("attendance_date=:x AND employee_id=:y", array(':x'=>$_REQUEST['year'].'-'.$mon_num.'-'.$i,':y'=>$posts->id));
            
            if(count($find)==0)
            {
            echo '';
            }
            else
            echo "<span style='color:#ce0606;font-size:12px;margin-top:5px;'><strong>X</strong></span>";
            
            echo '</td>';
            }
            ?>
        </tr>
    </table>
    
<?php } ?>
</div>