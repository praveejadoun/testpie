
<script language="javascript">
    function department()
    {
        var id = document.getElementById('dep').value;
        window.location = 'index.php?r=attendance/teacherSubjectAttendance/create&dep=' + id;
    }
    function employee()
    {
        var id_1 = document.getElementById('dep').value;
        var id = document.getElementById('emp').value;
        window.location = 'index.php?r=attendance/teacherSubjectAttendance/create&dep=' + id_1 + '&emp=' + id;
    }
    function departme()
    {
        var id_1 = document.getElementById('dep').value;
        var id = document.getElementById('sub').value;
        var dep = document.getElementById('depart').value;
        window.location = 'index.php?r=employees/employeesSubjects/create&cou=' + id_1 + '&sub=' + id + '&dept=' + dep;
    }
</script>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'employees-subjects-form',
    'enableAjaxValidation' => false,
        ));
?>
<div class="formCon" style="padding:0px 0px 25px 0px;">

    <div class="formConInner">
        <?php
        $data = CHtml::listData(EmployeeDepartments::model()->findAll(), 'id', 'name');
        if (isset($_REQUEST['dep'])) {
            $sel = $_REQUEST['dep'];
        } else {
            $sel = '';
        }
        echo '<div style="float:left; width:380px;"><span style="font-size:14px; font-weight:bold; color:#666;">Select Department</span>&nbsp;&nbsp;&nbsp;&nbsp;';
        echo CHtml::dropDownList('id', '', $data, array('prompt' => 'Select', 'onchange' => 'department()', 'id' => 'dep', 'options' => array($sel => array('selected' => true))));
        echo '</div>';
        echo '<div style="float:left; width:300px;"><span style="font-size:14px; font-weight:bold; color:#666;">Select Employee</span>&nbsp;&nbsp;';
        ?>


        <?php
        $data_1 = array();
        if (isset($_REQUEST['dep'])) {
            $data_1 = CHtml::listData(Employees::model()->findAll("employee_department_id =:x AND is_deleted=:y", array(':x' => $_REQUEST['dep'], ':y' => 0), array('order' => 'name DESC')), 'id', 'first_name');
        }
        if (isset($_REQUEST['emp'])) {
            $sel_4 = $_REQUEST['emp'];
        } else {
            $sel_4 = '';
        }
        echo CHtml::dropDownList('emp', '', $data_1, array('prompt' => 'Select', 'onchange' => 'department()', 'id' => 'emp', 'onchange' => 'employee()', 'options' => array($sel_4 => array('selected' => true))));

        echo '<br/></div></div>';
        ?>
        <div class="edit_bttns" style="width:350px; top:304px; left:700px;">
            <ul>
                <li> <a><?php echo CHtml::link('Teacher Attendance', array('employeeAttendances/'), array('class' => 'addbttn', 'style' => 'padding:8px 18px 6px 18px;;margin:0px 0px 0px 10px;')) ?></a></li>
            </ul>
        </div>

    </div>
</div>

<?php
if (isset($_REQUEST['emp']) != NULL) {


    $dt = new DateTime;
    if (isset($_GET['year']) && isset($_GET['week'])) {
        $dt->setISODate($_GET['year'], $_GET['week']);
    } else {
        $dt->setISODate($dt->format('o'), $dt->format('W'));
    }
    $year = $dt->format('o');
    $week = (int) $dt->format('W');
    $w = $dt->format('W');
//    $week = 09;
//    echo (int)$week;
//    exit;
    ?>

    <?php
//             $year = (isset($_GET['year'])) ? $_GET['year'] : date("Y");
//            $week = (isset($_GET['week'])) ? $_GET['week'] : date('W');
//            if($week > 52) {
//                $year++;
//                $week = 1;
//            } elseif($week < 1) {
//                $year--;
//                $week = 52;
//            }
    $d_1 = strtotime($year . "W" . $w . 0);
    $d_2 = strtotime($year . "W" . $w . 6);
//    echo strtotime( $week);
//    exit;
    ?>


    <div align="center" class="atnd_tnav" style="top:367px;right:68%">
        <?php
        echo CHtml::link('<div class="atnd_arow_l"><img src="images/atnd_arrow-l.png" width="7" border="0"  height="13" /></div>', array('create', 'dep' => $_REQUEST['dep'], 'emp' => $_REQUEST['emp'], 'week' => ($week - 1), 'year' => ($year)));
        echo date('M d', $d_1) . '&nbsp;-&nbsp; ' . date('M d', $d_2);
        echo CHtml::link('<div class="atnd_arow_r"><img src="images/atnd_arrow.png" border="0" width="7"  height="13" /></div>', array('create', 'dep' => $_REQUEST['dep'], 'emp' => $_REQUEST['emp'], 'week' => ($week + 1), 'year' => ($year)));
        ?>
    </div>
    <br/>
    <br/>
    <br/>

    <div  style="width:100%">

        <div class="">




            <div class="timetable-grid">
                <div class="timetable-grid-scroll">
                    <table border="0" align="center" width="100%" id="table" cellspacing="0">
                        <tbody>
                            <tr>
                                <th width="60px" class="loader">&nbsp;</th>
                                <?php
                                $timing = array();
                                
                                $sql = "SELECT DISTINCT class_timing_id FROM timetable_entries WHERE employee_id = '".$_REQUEST['emp']."'";
//                               $sql = "SELECT DISTINCT class_timing_id, employee_id, COUNT(*)FROM timetable_entries GROUP BY class_timing_id, employee_id HAVING COUNT(*) > 1";
                                $criteria = new CDbCriteria;
                                $criteria->compare('employee_id', $_REQUEST['emp']);
                                $criteria->distinct = true;
                                $total = TimetableEntries::model()->count($criteria);
                                $criteria->order = 'class_timing_id ASC';

//                                $te = TimetableEntries::model()->findAll($criteria);
                                $te = TimetableEntries::model()->findAllBySql($sql);
                                foreach ($te as $tte) {
                                    $ct = ClassTimings::model()->findAll("id=:x", array(':x' => $tte->class_timing_id));

                                    foreach ($ct as $ct_1) {
                                        $settings = UserSettings::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
                                        if ($settings != NULL) {
                                            $time1 = date($settings->timeformat, strtotime($ct_1->start_time));
                                            $time2 = date($settings->timeformat, strtotime($ct_1->end_time));
                                        }
                                        ?>
                                        <th class="th" width="130px">
                                            <div class="top"><?php echo $time1 . '&nbsp-&nbsp' . $time2; ?></div>
                                        </th>
                                        <?php
                                        $timing[] = ['start_time' => $ct_1->start_time, 'time_id' => $ct_1->id];
                                    }
                                }
                                ?>
                            </tr>

                            <?php
                            if ($week < 10) {
                                $week = '0' . $week;
                            }
                            $criteria = new CDbCriteria;
                            $criteria->compare('employee_id', $_REQUEST['emp']);
                            $total = TimetableEntries::model()->count($criteria);
                            $criteria->order = 'weekday_id ASC';

                            $te = TimetableEntries::model()->findAll($criteria);
                            foreach ($te as $te_1) {

//                                      
                                if ($te_1->weekday_id == 1) {

                                    $d = strtotime($year . "W" . $week . 0);
                                    echo "<tr>"
                                    . "<td class='td daywise-block' >" .
                                    date('l', $d) . "<br>" . date('d M', $d) . " " . $year . "</td>";
//                                         $subject = Subjects::model()->findByAttributes(array('id'=>$te_1->subject_id));
//                                         echo '<td class="td">'.$subject->name.'</td>';
                                    $date = date('Y', $d);
                                    foreach ($timing as $timings) {
                                        $class_timeing = TimetableEntries::model()->findByAttributes(array('class_timing_id' => $timings['time_id'], 'weekday_id' => $te_1->weekday_id, 'employee_id' => $te_1->employee_id));
                                        $batch = Batches::model()->findByAttributes(array('id' => $class_timeing->batch_id));
                                        $subject = Subjects::model()->findByAttributes(array('id' => $class_timeing->subject_id));
                                        //echo "<pre/>";
                                        //print_r($class_timeing);
                                        // echo $class_timeing->subject_id;
//                                              echo  $this->renderPartial('/employeeAttendances/ajax',array('day'=>$i,'month'=>$mon_num,'year'=>$curr_year,'emp_id'=>$_REQUEST['emp']),array('class'=>'abs'));
//                                       $this->renderPartial('/employeeAttendances/ajax',array('day'=>date('d', $d),'month'=>date('m', $d),'year'=>date('Y', $d),'emp_id'=>$_REQUEST['emp']),array('class'=>'abs'));

                                        if ($class_timeing != NULL) {
                                         
                                            echo '<td class="td">'
                                            . /* $this->renderPartial('ajax',array('day'=>'17','month'=>'12','year'=>'2013','emp_id'=>$_REQUEST['emp'])) */

//                                                  $set = EmployeeSubjectwiseAttendances::model()->findByAttributes(array('attendance_date'=>2018-01-14));     
//                                              if(count($set)==0)
//                                              {
                                                  
//                                            $this->renderPartial('ajax',array('day'=>date('d', $d),'month'=>date('m', $d),'year'=>date('Y', $d),'emp_id'=>$_REQUEST['emp'],'c_t_id'=>$class_timeing->class_timing_id,'batch_id'=>$batch->id),array('class'=>'abs')).$subject->name.'<br><br>'.$batch->name
                                            $subject->name . '<br><br>' . $batch->name 
                                                    .'</td>';
                                               

//                                         }
//                                        else {
//                                                echo CHtml::link('',array('timetableEntries/remove'),array('confirm'=>'Are you sure?','class'=>'delete'));
//                                        }
                                        } else {
                                            echo '<td class="td"></td>';
                                        }
                                    }
                                    echo "</tr>";
//                                        echo " Sunday";
                                }
                                if ($te_1->weekday_id == 2) {

                                    $d = strtotime($year . "W" . $week . 1);
                                    echo "<tr>"
                                    . "<td class='td daywise-block' >" .
                                    date('l', $d) . "<br>" . date('d M', $d) . " " . $year . "</td>";
                                    $subject = Subjects::model()->findByAttributes(array('id' => $te_1->subject_id));
//                                         echo '<td class="td">'.$subject->name.'</td>';
                                    foreach ($timing as $timings) {
                                        $class_timeing = TimetableEntries::model()->findByAttributes(array('class_timing_id' => $timings['time_id'], 'weekday_id' => $te_1->weekday_id));
                                        $batch = Batches::model()->findByAttributes(array('id' => $class_timeing->batch_id));
                                        $subject = Subjects::model()->findByAttributes(array('id' => $class_timeing->subject_id));
                                        //echo "<pre/>";
                                        //print_r($class_timeing);
                                        // echo $class_timeing->subject_id;
                                         if ($class_timeing != NULL) {
                                        echo '<td class="td">' . 
                                            $this->renderPartial('ajax',array('day'=>date('d', $d),'month'=>date('m', $d),'year'=>date('Y', $d),'emp_id'=>$_REQUEST['emp'],'c_t_id'=>$class_timeing->class_timing_id,'batch_id'=>$batch->id),array('class'=>'abs')).$subject->name.'<br><br>'.$batch->name

                                                
//                                                $subject->name . '<br><br>' . $batch->name 
                                                . '</td>';
                                    } else {
                                            echo '<td class="td"></td>';
                                        }
                                        
                                    }
                                    echo "</tr>";
//                                        echo " monday";
                                }
                                if ($te_1->weekday_id == 3) {

                                    $d = strtotime($year . "W" . $week . 2);
                                    echo "<tr>"
                                    . "<td class='td daywise-block' >" .
                                    date('l', $d) . "<br>" . date('d M', $d) . " " . $year . "</td>";
                                    $subject = Subjects::model()->findByAttributes(array('id' => $te_1->subject_id));
//                                         echo '<td class="td">'.$subject->name.'</td>';
                                    foreach ($timing as $timings) {
                                        $class_timeing = TimetableEntries::model()->findByAttributes(array('class_timing_id' => $timings['time_id'], 'weekday_id' => $te_1->weekday_id));
                                        $batch = Batches::model()->findByAttributes(array('id' => $class_timeing->batch_id));
                                        $subject = Subjects::model()->findByAttributes(array('id' => $class_timeing->subject_id));
                                        //echo "<pre/>";
                                        //print_r($class_timeing);
                                        // echo $class_timeing->subject_id;
                                        if ($class_timeing != NULL) {

                                        echo '<td class="td">' .
                                                
//                                                $this->renderPartial('ajax',array('day'=>date('d', $d),'month'=>date('m', $d),'year'=>date('Y', $d),'emp_id'=>$_REQUEST['emp'],'c_t_id'=>$class_timeing->class_timing_id,'batch_id'=>$batch->id),array('class'=>'abs')).$subject->name.'<br><br>'.$batch->name

                                                $subject->name . '<br><br>' . $batch->name 
                                                . '</td>';
                                        }else {
                                            echo '<td class="td"></td>';
                                        }       
                                
                                    }
                                    echo "</tr>";
//                                        echo " tuesday";
                                }
                                if ($te_1->weekday_id == 4) {

                                    $d = strtotime($year . "W" . $week . 3);
                                    echo "<tr>"
                                    . "<td class='td daywise-block' >" .
                                    date('l', $d) . "<br>" . date('d M', $d) . " " . $year . "</td>";
                                    $subject = Subjects::model()->findByAttributes(array('id' => $te_1->subject_id));
//                                         echo '<td class="td">'.$subject->name.'</td>';
                                    foreach ($timing as $timings) {
                                        $class_timeing = TimetableEntries::model()->findByAttributes(array('class_timing_id' => $timings['time_id'], 'weekday_id' => $te_1->weekday_id));
                                        $batch = Batches::model()->findByAttributes(array('id' => $class_timeing->batch_id));
                                        $subject = Subjects::model()->findByAttributes(array('id' => $class_timeing->subject_id));
                                        //echo "<pre/>";
                                        //print_r($class_timeing);
                                        // echo $class_timeing->subject_id;
                                        if ($class_timeing != NULL) {

                                        echo '<td class="td">' .
                                                
//                                                $this->renderPartial('ajax',array('day'=>date('d', $d),'month'=>date('m', $d),'year'=>date('Y', $d),'emp_id'=>$_REQUEST['emp'],'c_t_id'=>$class_timeing->class_timing_id,'batch_id'=>$batch->id),array('class'=>'abs')).$subject->name.'<br><br>'.$batch->name

                                                $subject->name . '<br><br>' . $batch->name . 
                                                '</td>';
                                        }else {
                                            echo '<td class="td"></td>';
                                        }   
                                    }
                                    echo "</tr>";
//                                        echo " wednesday";
                                }
                                if ($te_1->weekday_id == 5) {

                                    $d = strtotime($year . "W" . $week . 4);
                                    echo "<tr>"
                                    . "<td class='td daywise-block' >" .
                                    date('l', $d) . "<br>" . date('d M', $d) . " " . $year . "</td>";
                                    $subject = Subjects::model()->findByAttributes(array('id' => $te_1->subject_id));
//                                         echo '<td class="td">'.$subject->name.'</td>';
                                    foreach ($timing as $timings) {
                                        $class_timeing = TimetableEntries::model()->findByAttributes(array('class_timing_id' => $timings['time_id'], 'weekday_id' => $te_1->weekday_id));
                                        $batch = Batches::model()->findByAttributes(array('id' => $class_timeing->batch_id));
                                        $subject = Subjects::model()->findByAttributes(array('id' => $class_timeing->subject_id));
                                        //echo "<pre/>";
                                        //print_r($class_timeing);
                                        // echo $class_timeing->subject_id;
                                        echo '<td class="td">' . $subject->name . '<br><br>' . $batch->name . '</td>';
                                    }
                                    echo "</tr>";
//                                        echo " thursday";
                                }
                                if ($te_1->weekday_id == 6) {

                                    $d = strtotime($year . "W" . $week . 5);
                                    echo "<tr>"
                                    . "<td class='td daywise-block' >" .
                                    date('l', $d) . "<br>" . date('d M', $d) . " " . $year . "</td>";
                                    $subject = Subjects::model()->findByAttributes(array('id' => $te_1->subject_id));
//                                         echo '<td class="td">'.$subject->name.'</td>';
                                    foreach ($timing as $timings) {
                                        $class_timeing = TimetableEntries::model()->findByAttributes(array('class_timing_id' => $timings['time_id'], 'weekday_id' => $te_1->weekday_id));
                                        $batch = Batches::model()->findByAttributes(array('id' => $class_timeing->batch_id));
                                        $subject = Subjects::model()->findByAttributes(array('id' => $class_timeing->subject_id));
                                        //echo "<pre/>";
                                        //print_r($class_timeing);
                                        // echo $class_timeing->subject_id;
                                        echo '<td class="td">' . $subject->name . '<br><br>' . $batch->name . '</td>';
                                    }
                                    echo "</tr>";
//                                        echo " friday";
                                }
                                if ($te_1->weekday_id == 7) {

                                    $d = strtotime($year . "W" . $week . 6);
                                    echo "<tr>"
                                    . "<td class='td daywise-block' >" .
                                    date('l', $d) . "<br>" . date('d M', $d) . " " . $year . "</td>";
                                    $subject = Subjects::model()->findByAttributes(array('id' => $te_1->subject_id));
//                                         echo '<td class="td">'.$subject->name.'</td>';
                                    foreach ($timing as $timings) {
                                        $class_timeing = TimetableEntries::model()->findByAttributes(array('class_timing_id' => $timings['time_id'], 'weekday_id' => $te_1->weekday_id));
                                        $batch = Batches::model()->findByAttributes(array('id' => $class_timeing->batch_id));
                                        $subject = Subjects::model()->findByAttributes(array('id' => $class_timeing->subject_id));
                                        //echo "<pre/>";
                                        //print_r($class_timeing);
                                        // echo $class_timeing->subject_id;
                                        echo '<td class="td">' . $subject->name . '<br><br>' . $batch->name . '</td>';
                                    }
                                    echo "</tr>";
//                                        echo " saturday";
                                }
                            }
                            ?>
                            <?php
                            if ($week < 10) {
                                $week = '0' . $week;
                            }
//                for($day= 1; $day <= 7; $day++) {
//                    $d = strtotime($year ."W". $week . $day);
//
//                    echo "<tr><td class='td daywise-block' >". date('l', $d) ."<br>". date('d M', $d) ." ".$year;
//                    echo '<td class="td">'.sunil.'</td>';
//                    echo "</tr></td>";
//                }
                            ?>


                        </tbody>


                    </table>
    <!--                <table border="1px">
                       <tr>
                           <td>Employee</td>
                    <?php
//                if($week < 10) {
//                    $week = '0'. $week;
//                }
//                for($day= 1; $day <= 7; $day++) {
//                    $d = strtotime($year ."W". $week . $day);
//
//                    echo "<td>". date('l', $d) ."<br>". date('d M', $d) ."</td>";
//                }
                    ?>
                   </tr>
                </table>   -->
                </div>
            </div>

        <?php } ?>

    </div>

</div>

<?php $this->endWidget(); ?>


<style type="text/css">
    .timetable-grid{
        width: 960px;
        overflow: scroll;  
    }
    .timetable-grid-scroll{

    }
    .timetable-grid th {
        border-right: 1px solid #e6e5e5;
        padding: 15px;
        background-color: #efefef;
        color: #6d7177;
        font-size: 11px;
        font-weight: 600;
        font-family: sans-serif;
    }
    .loader {
        background-color: #aec3d3;
    }
    .timetable-grid .daywise-block {
        background-color: #f3f3f3;
        max-width: 100px;
    }
    .timetable-grid .td {
        position: relative;
    }
    .timetable-grid td {
        background-color: #f9f9f9;
        border-right: 1px solid #e6e5e5;
        border-bottom: 1px solid #e6e5e5;
        padding: 12px 0px;
        font-size: 10px;
        font-weight: bold;
        text-align: center;
        max-width: 150px;
        min-width: 150px;
    }
</style>