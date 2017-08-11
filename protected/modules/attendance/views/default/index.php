<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/promotions.css" />

<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>

 <div style="background:#fff; min-height:800px;">  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" width="75%">
		<div style="padding:20px; position:relative;">
		<h1>Attendance Management</h1>	
            <div class="edit_bttns" style="width:350px; top:30px; right:-15px;">
            	<ul>
                    <li >
                        <?php if(Yii::app()->controller->action->id == 'index') {?>
                      <?php  $rurl = explode('index.php?r=',Yii::app()->request->getUrl());
                       
			$rurl = explode('&id=',$rurl[1]); 
			echo CHtml::ajaxLink('Student Attendance',array('/site/explorer2','widget'=>'2','rurl'=>$rurl[0]),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'addbttn','style'=>'padding:8px 7px 6px 0px;;margin:0px 0px 0px 50px;')); ?>
                        
                        <?php 
			}else
			{
				echo CHtml::ajaxLink('Change Batch',array('/site/explorer','widget'=>'2','rurl'=>'courses/batches/batchstudents'),array('update'=>'#explorer_handler'),array('id'=>'explorer_change'));
			}?>
                        
                      </li> 
                        
                    <li><a><?php echo CHtml::link('Teacher Attendance',array('teacherSubjectAttendance/create'),array('class'=>'addbttn','style'=>'padding:8px 3px 6px 0px;;margin:0px 0px 0px 10px;'))?></a></li>
                 </ul>
           </div> 
            <div class="yellow_bx yb_attendance">
                	<div class="y_bx_head">
                    	Before recording the Attendance, make sure you follow the following instructions                    </div>
                	<div class="y_bx_list timetable_list">
                    	<h1>Set Weekdays</h1>
                        <p>
                        Set the weekdays, where the specific Batch has classes, You can use the school default or custom weekdays.						</p>
                    </div>
                    <div class="y_bx_list timetable_list">
                    	<h1>Set Class Timings</h1>
                        <p>
                        Create class timings for each Batch Enter each period start time and end time,Add break timings etc.						</p>
                    </div>
                    <div class="y_bx_list timetable_list">
                    	<h1>Subjects and Subject Allocation</h1>
                        <p>
                        Add existing subjects to the Batch or create a new subject. Associate each subject with the teacher.						</p>
                    </div>
                    <div class="y_bx_list timetable_list">
                    	<h1>Create Timetable</h1>
                        <p>Assigning each timing/period from the dropdown.</p>
                    </div>
    			</div>
				
                
                
		</td>
       </tr>
     </table>
    </td>
   </tr>
</table>
</div>
