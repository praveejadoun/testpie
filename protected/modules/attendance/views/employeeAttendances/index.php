<?php
$this->breadcrumbs=array(
	'Attendance'=>array('/attendance'),
	'Employee Attendance','Subject Wise'
);
?>
<script>
function course()
{
var id = document.getElementById('cou').value;
window.location= 'index.php?r=attendance/employeeAttendances/index&id='+id;	
}
</script>
 <div style="background:#fff; min-height:800px;">        

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
  <h1 style="padding:18px 0px 0px 32px;">Teacher Attendances</h1>
     <div class="c_batch_tbar" style="padding:0px; margin:10px 0px 0px 24px;border:none;border-radius:0px;">
        
   
           <?php
                                                
                                                $rurl = explode('index.php?r=',Yii::app()->request->getUrl());
                       
			$rurl = explode('&id=',$rurl[1]); 
			echo CHtml::ajaxLink('Student Attendance',array('/site/explorer2','widget'=>'2','rurl'=>$rurl[0]),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'sb_but','style'=>'top:-40px; right:40px;')); 
                        
				//echo CHtml::link('Teacher Attendance',array(''),array('class'=>'sb_but','style'=>'top:-40px; right:170px;'));
			?>
            
            <?php echo CHtml::link('<span>close</span>',array('/attendance'),array('class'=>'sb_but_close','style'=>'top:-40px; right:0px;'));?>
        </div>
    <td valign="top" width="96%" style="padding:23px;">
       


<?php

function getweek($date,$month,$year)
{
$date = mktime(0, 0, 0,$month,$date,$year); 
$week = date('w', $date); 
switch($week) {
case 0: 
return 'Su';
break;
case 1: 
return 'M';
break;
case 2: 
return 'Tu';
break;
case 3: 
return 'W';
break;
case 4: 
return 'Th';
break;
case 5: 
return 'F';
break;
case 6: 
return 'Sa';
break;
}
}
?>




<div class="c_batch_tbar" style="padding:15px; margin:0px;width:926px;">
<?php

$data = CHtml::listData(EmployeeDepartments::model()->findAll(),'id','name');
if(isset($_REQUEST['id']))
{
	$sel= $_REQUEST['id'];
}
else
{
	$sel='';
}

echo Yii::t('employees','Select Department').'&nbsp;&nbsp;&nbsp;';
echo CHtml::dropDownList('id','',$data,array('prompt'=>'Select Department','onchange'=>'course()','id'=>'cou','options'=>array($sel=>array('selected'=>true)))); ?>
   
    
    <div class="edit_bttns" style="width:350px; top:13px; right:350px;">
       <ul>
           <li> <a><?php echo CHtml::link('Subject Wise Attendance',array('teacherSubjectAttendance/create'),array('class'=>'addbttn','style'=>'padding:8px 18px 6px 18px;;margin:0px 0px 0px 10px;'))?></a></li>
       </ul>
    </div>
     <div class="cb_right">
         <div class="status_bx">
             <ul>
                <li style="padding:11px 12px;margin:-14px 330px;border-left: 1px #d9e1e7 solid;border-right:none;"><span><?php echo count(Employees::model()->findAll(array('condition'=>'employee_department_id=:x AND is_deleted=:y','params'=>array(':x'=>$_REQUEST['id'],':y'=>0))));?></span><?php echo Yii::t('Batch','Employee(s)');?></li>

             </ul>
         </div>
     </div>
<?php 
if(isset($_REQUEST['id']))
{

	if(!isset($_REQUEST['mon']))
	{
		$mon = date('F');
		$mon_num = date('n');
		$curr_year = date('Y');
	}
	else
	{
		$mon = $model->getMonthname($_REQUEST['mon']);
		$mon_num = $_REQUEST['mon'];
		$curr_year = $_REQUEST['year'];
	}
	$num = cal_days_in_month(CAL_GREGORIAN, $mon_num, $curr_year); // 31
	?>
   </div>
 </div>
 
	<div align="center" class="atnd_tnav" style="top:356px;"><?php echo CHtml::link('<div class="atnd_arow_l"><img src="images/atnd_arrow-l.png" width="7" border="0"  height="13" /></div>', array('index', 'mon'=>date("m",strtotime($curr_year."-".$mon_num."-01 -1 months")),'year'=>date("Y",strtotime($curr_year."-".$mon_num."-01 -1 months")),'id'=>$_REQUEST['id']));  echo $mon.'&nbsp;&nbsp;&nbsp; '.$curr_year; echo CHtml::link('<div class="atnd_arow_r"><img src="images/atnd_arrow.png" border="0" width="7"  height="13" /></div>', array('index',  'mon'=>date("m",strtotime($curr_year."-".$mon_num."-01 +1 months")),'year'=>date("Y",strtotime($curr_year."-".$mon_num."-01 +1 months")),'id'=>$_REQUEST['id']));?></div>
<br />
<div class="ea_pdf" style="top:356px;">

<?php /*?><?php echo CHtml::link('<img src="images/pdf-but.png" border="0" />', array('employeeAttendances/pdf','id'=>$_REQUEST['id']),array('target'=>"_blank")); ?><?php */

if($_REQUEST['mon']&&$_REQUEST['year']){
  echo CHtml::link('<img src="images/pdf-but.png" border="0">', array('employeeAttendances/Deppdf','mon'=>$_REQUEST['mon'],'year'=>$_REQUEST['year'],'id'=>$_REQUEST['id']),array('target'=>'_blank')); 
	}
	else{
		 echo CHtml::link('<img src="images/pdf-but.png" border="0">', array('employeeAttendances/Deppdf','mon'=>date("m"),'year'=>date("Y"),'id'=>$_REQUEST['id']),array('target'=>'_blank')); 
		
	}
?>
</div>
<div class="atnd_Con" style="overflow-x:scroll;">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <th>Name</th>
    <?php
    for($i=1;$i<=$num;$i++)
    {
        echo '<th>'.getweek($i,$mon_num,$curr_year).'<span>'.$i.'</span></th>';
    }
    ?>
</tr>
<?php $posts=Employees::model()->findAll("employee_department_id=:x AND is_deleted=:y", array(':x'=>$_REQUEST['id'], ':y'=>0));
$j=0;
foreach($posts as $posts_1)
{
	if($j%2==0)
	$class = 'class="odd"';	
	else
	$class = 'class="even"';	
	
	
 ?>
<tr <?php echo $class; ?> >
    <td class="name"><?php echo $posts_1->first_name; ?></td>
    <?php
    for($i=1;$i<=$num;$i++)
    {
        echo '<td style="text-align:center"><span  id="td'.$i.$posts_1->id.'">';
          $comDt = date('Y-m-d',strtotime($curr_year."-".$mon_num."-".$i));
           if( $comDt <= date('Y-m-d') && boolval($posts_1->joining_date <= $comDt)){
		echo  $this->renderPartial('ajax',array('day'=>$i,'month'=>$mon_num,'year'=>$curr_year,'emp_id'=>$posts_1->id),array('class'=>'abs'));
		}else{
            echo "<b title='N/A' >-</b>";
        }
                /*echo CHtml::ajaxLink(Yii::t('job','ll'),$this->createUrl('EmployeeAttendances/addnew'),array(
        'onclick'=>'$("#jobDialog").dialog("open"); return false;',
        'update'=>'#jobDialog','type' =>'GET','data'=>array('day' =>$i,'month'=>$mon_num,'year'=>'2012','emp_id'=>$posts_1->id),
        ),array('id'=>'showJobDialog'));
		echo '<div id="jobDialog"></div>';*/
		
		echo '</span><div  id="jobDialog123'.$i.$posts_1->id.'"></div></td>';
		echo '</span><div  id="jobDialogupdate'.$i.$posts_1->id.'"></div></td>';
		
	
		
    }
    ?>
</tr>
<?php $j++; }?>
</table>
<?php } ?>

    </div>



        
    </td>
      </tr></tbody>
</table>
 </div>