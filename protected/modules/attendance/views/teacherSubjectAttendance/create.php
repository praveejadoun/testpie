<?php
$this->breadcrumbs=array(
	'Attendance'=>array('/attendance'),
	'Employee Attendance','Subject Wise'
);
?>
 <div style="background:#fff; min-height:800px;">        

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
  <h1 style="padding:18px 0px 0px 32px;">Teacher Subject Wise Attendances</h1>
     <div class="c_batch_tbar" style="padding:0px; margin:10px 0px 0px 24px;border:none;border-radius:0px;">
        
    <?php if((Yii::app()->controller->id=='batches' and (Yii::app()->controller->action->id=='batchstudents' or Yii::app()->controller->action->id=='settings')) or (Yii::app()->controller->id=='subject' and Yii::app()->controller->action->id=='index') or (Yii::app()->controller->id=='weekdays' and (Yii::app()->controller->action->id=='timetable' or Yii::app()->controller->action->id=='index')) or (Yii::app()->controller->id=='classTiming' and Yii::app()->controller->action->id=='index') or (Yii::app()->controller->id=='studentAttentance' and Yii::app()->controller->action->id=='index') or (Yii::app()->controller->id=='gradingLevels' and Yii::app()->controller->action->id=='index') or (Yii::app()->controller->id=='exam' and Yii::app()->controller->action->id=='index') )
			{
				?>
            
            <?php
			
			$rurl = explode('index.php?r=',Yii::app()->request->getUrl());
                       
			$rurl = explode('&id=',$rurl[1]); 
			echo CHtml::ajaxLink('Change Batch',array('/site/explorer','widget'=>'2','rurl'=>$rurl[0]),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'sb_but','style'=>'top:-40px; right:40px;')); 
                        echo CHtml::link('Teacher Attendance',array('/attendance/teachersubjectattendance'),array('class'=>'sb_but','style'=>'top:-40px; right:170px;'));?>
<?php 
			}else
			{
                            			echo CHtml::link('Teacher Leave Types',array('/attendance/employeeleavetypes'),array('class'=>'sb_but','style'=>'top:-40px; right:40px;')); 

                                                
                                                $rurl = explode('index.php?r=',Yii::app()->request->getUrl());
                       
			$rurl = explode('&id=',$rurl[1]); 
			echo CHtml::ajaxLink('Student Attendance',array('/site/explorer2','widget'=>'2','rurl'=>$rurl[0]),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'sb_but','style'=>'top:-40px; right:170px;')); 
                        
				//echo CHtml::link('Teacher Attendance',array(''),array('class'=>'sb_but','style'=>'top:-40px; right:170px;'));
			}?>
            
            <?php echo CHtml::link('<span>close</span>',array('/attendance'),array('class'=>'sb_but_close','style'=>'top:-40px; right:0px;'));?>
        </div>
    <td valign="top" width="96%" style="padding:23px;">
       


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

        
         <div  style="width:100%">

<div class="">

<?php
 
	if(isset($_REQUEST['id']) and $_REQUEST['id']!=NULL)
	{      
	$times=Batches::model()->findAll("id=:x", array(':x'=>$_REQUEST['id']));
	
	
	$weekdays=Weekdays::model()->findAll("batch_id=:x", array(':x'=>$_REQUEST['id']));
	
	if(count($weekdays)==0)
	$weekdays=Weekdays::model()->findAll("batch_id IS NULL");
	?> <br /><br />
    <?php   $timing = ClassTimings::model()->findAll("batch_id=:x", array(':x'=>$_REQUEST['id']));
	  		$count_timing = count($timing);
			if($timing!=NULL)
			{
	?>
<div class="timetable" style="margin-top:10px;">
<table border="0" align="center" width="100%" id="table" cellspacing="0">
    <tbody><tr>
	
      <td class="loader">&nbsp;
        
        </td><!--timetable_td_tl -->
      <td class="td-blank"></td>
      <?php 
	 
			foreach($timing as $timing_1)
			{
				 $settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
								if($settings!=NULL)
								{	
									$time1=date($settings->timeformat,strtotime($timing_1->start_time));
									$time2=date($settings->timeformat,strtotime($timing_1->end_time));
									
		
								}
			echo '<td class="td"><div class="top">'.$time1.' - '.$time2.'</div></td>';	
			//echo '<td class="td"><div class="top">'.$timing_1->start_time.' - '.$timing_1->end_time.'</div></td>';	
			}
	   ?>
        
      
    </tr> <!-- timetable_tr -->
    <tr class="blank">
      <td></td>
      <td></td>
		  <?php
          for($i=0;$i<$count_timing;$i++)
          {
            echo '<td></td>';  
          }
          ?>
    </tr>
    <?php if($weekdays[0]['weekday']!=0)
	{ ?>
    <tr>
        <td class="td"><div class="name"><?php echo Yii::t('weekdays','SUN');?></div></td>
        <td class="td-blank"></td>
         <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo '<td class="td">
					<div  onclick="" style="position: relative; ">
					
					  <div class="tt-subject">
						<div class="subject">'; ?>
			<?php
$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[0]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break==NULL)
					{	
						echo 	CHtml::ajaxLink(Yii::t('job','Assign'),$this->createUrl('TimetableEntries/settime'),array(
        'onclick'=>'$("#jobDialog'.$timing[$i]['id'].$weekdays[0]['weekday'].'").dialog("open"); return false;',
        'update'=>'#jobDialog'.$timing[$i]['id'].$weekdays[0]['weekday'],'type' =>'GET','data'=>array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[0]['weekday'],'class_timing_id'=>$timing[$i]['id']),'dataType'=>'text',
        ),array('id'=>'showJobDialog'.$timing[$i]['id'].$weekdays[0]['weekday'])) ;
					}
					else
					{
						echo Yii::t('weekdays','Break');
					}		
					
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){echo $time_sub->name.'<br>';}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?','class'=>'delete'));
				}
		 ?>
					<?php echo 	'</div>
						
					  </div>
					</div>
					<div id="jobDialog'.$timing[$i]['id'].$weekdays[0]['weekday'].'"></div>
				  </td>';  
			  }
			  ?>
        
          
        
      </tr>
      <?php } 
	  if($weekdays[1]['weekday']!=0)
	  { ?>
      <tr>
        <td class="td"><div class="name"><?php echo Yii::t('weekdays','MON');?></div></td>
        <td class="td-blank"></td>
        	 <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject">
							<div class="subject">';
		$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[1]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break==NULL)
					{	
						echo CHtml::ajaxLink(Yii::t('job','Assign'),$this->createUrl('TimetableEntries/settime'),array(
        'onclick'=>'$("#jobDialog'.$timing[$i]['id'].$weekdays[1]['weekday'].'").dialog("open"); return false;',
        'update'=>'#jobDialog'.$timing[$i]['id'].$weekdays[1]['weekday'],'type' =>'GET','data'=>array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[1]['weekday'],'class_timing_id'=>$timing[$i]['id']),'dataType'=>'text',
        ),array('id'=>'showJobDialog'.$timing[$i]['id'].$weekdays[1]['weekday'])) ;
					}
					else
					{
						echo Yii::t('weekdays','Break');
					}			
					
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				
				if($time_sub!=NULL){echo $time_sub->name.'<br>';}
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?','class'=>'delete'));
				}

						echo '</div>
						  </div>
						</div>
						<div id="jobDialog'.$timing[$i]['id'].$weekdays[1]['weekday'].'"></div>
					  </td>';  
			 }
			?>
          <!--timetable_td -->
        
      </tr><!--timetable_tr -->
      <?php } 
	  if($weekdays[2]['weekday']!=0)
	  {
	  ?>
          <tr>
        <td class="td"><div class="name"><?php echo Yii::t('weekdays','TUE');?></div></td>
        <td class="td-blank"></td>
         <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject">
							<div class="subject">';
							$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[2]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break==NULL)
					{	
						echo CHtml::ajaxLink(Yii::t('job','Assign'),$this->createUrl('TimetableEntries/settime'),array(
        'onclick'=>'$("#jobDialog'.$timing[$i]['id'].$weekdays[2]['weekday'].'").dialog("open"); return false;',
        'update'=>'#jobDialog'.$timing[$i]['id'].$weekdays[2]['weekday'],'type' =>'GET','data'=>array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[2]['weekday'],'class_timing_id'=>$timing[$i]['id']),'dataType'=>'text',
        ),array('id'=>'showJobDialog'.$timing[$i]['id'].$weekdays[2]['weekday'])) ;
					}
					else
					{
						echo Yii::t('weekdays','Break');
					}				
					
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){echo $time_sub->name.'<br>';}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?','class'=>'delete'));
				}

							
						echo	'</div>
							
						  </div>
						</div>
						<div id="jobDialog'.$timing[$i]['id'].$weekdays[2]['weekday'].'"></div>
					  </td>';  
			 }
			?><!--timetable_td -->
        
      </tr><!--timetable_tr -->
      <?php }
	  if($weekdays[3]['weekday']!=0)
	  { ?>
          <tr>
        <td class="td"><div class="name"><?php echo Yii::t('weekdays','WED');?></div></td>
        <td class="td-blank"></td>
         <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject">
							<div class="subject">';
							$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[3]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break==NULL)
					{	
						echo CHtml::ajaxLink(Yii::t('job','Assign'),$this->createUrl('TimetableEntries/settime'),array(
        'onclick'=>'$("#jobDialog'.$timing[$i]['id'].$weekdays[3]['weekday'].'").dialog("open"); return false;',
        'update'=>'#jobDialog'.$timing[$i]['id'].$weekdays[3]['weekday'],'type' =>'GET','data'=>array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[3]['weekday'],'class_timing_id'=>$timing[$i]['id']),'dataType'=>'text',
        ),array('id'=>'showJobDialog'.$timing[$i]['id'].$weekdays[3]['weekday'])) ;
					}
					else
					{
						echo Yii::t('weekdays','Break');
					}			
					
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){echo $time_sub->name.'<br>';}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?','class'=>'delete'));	
				}
							echo '</div>
							
						  </div>
						</div>
						<div id="jobDialog'.$timing[$i]['id'].$weekdays[3]['weekday'].'"></div>
					  </td>';  
			 }
			?><!--timetable_td -->
        
      </tr><!--timetable_tr -->
      <?php }
	  if($weekdays[4]['weekday']!=0)
	  {  ?>
          <tr>
        <td class="td"><div class="name"><?php echo Yii::t('weekdays','THU');?></div></td>
        <td class="td-blank"></td>
          <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject">
							<div class="subject">';
				$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[4]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{	
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break==NULL)
					{	
						echo CHtml::ajaxLink(Yii::t('job','Assign'),$this->createUrl('TimetableEntries/settime'),array(
        'onclick'=>'$("#jobDialog'.$timing[$i]['id'].$weekdays[4]['weekday'].'").dialog("open"); return false;',
        'update'=>'#jobDialog'.$timing[$i]['id'].$weekdays[4]['weekday'],'type' =>'GET','data'=>array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[4]['weekday'],'class_timing_id'=>$timing[$i]['id']),'dataType'=>'text',
        ),array('id'=>'showJobDialog'.$timing[$i]['id'].$weekdays[4]['weekday'])) ;
					}
					else
					{
						echo Yii::t('weekdays','Break');
					}			
					
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){echo $time_sub->name.'<br>';}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?','class'=>'delete'));
				}
							
						echo '</div>
							
						  </div>
						</div>
						<div id="jobDialog'.$timing[$i]['id'].$weekdays[4]['weekday'].'"></div>
					  </td>';  
			 }
			?><!--timetable_td -->
        
      </tr><!--timetable_tr -->
      <?php }
	  if($weekdays[5]['weekday']!=0)
	  { ?>
	  
          <tr>
        <td class="td"><div class="name"><?php echo Yii::t('weekdays','FRI');?></div></td>
        <td class="td-blank"></td>
         <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject">
							<div class="subject">';
				$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[5]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break==NULL)
					{	
						echo CHtml::ajaxLink(Yii::t('job','Assign'),$this->createUrl('TimetableEntries/settime'),array(
        'onclick'=>'$("#jobDialog'.$timing[$i]['id'].$weekdays[5]['weekday'].'").dialog("open"); return false;',
        'update'=>'#jobDialog'.$timing[$i]['id'].$weekdays[5]['weekday'],'type' =>'GET','data'=>array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[5]['weekday'],'class_timing_id'=>$timing[$i]['id']),'dataType'=>'text',
        ),array('id'=>'showJobDialog'.$timing[$i]['id'].$weekdays[5]['weekday'])) ;
					}
					else
					{
						echo Yii::t('weekdays','Break');
					}				
					
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){echo $time_sub->name.'<br>';}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?','class'=>'delete'));
				}
							echo '</div>
							
						  </div>
						</div>
						<div id="jobDialog'.$timing[$i]['id'].$weekdays[5]['weekday'].'"></div>
					  </td>';  
			 }
			?><!--timetable_td -->
        
      </tr><!--timetable_tr -->
      <?php } 
	  if($weekdays[6]['weekday']!=0)
	  { ?>
      <tr>
        <td class="td"><div class="name"><?php echo Yii::t('weekdays','SAT');?></div></td>
        <td class="td-blank"></td>
          <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject">
							<div class="subject">';
							$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[6]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break==NULL)
					{	
						echo CHtml::ajaxLink(Yii::t('job','Assign'),$this->createUrl('TimetableEntries/settime'),array(
        'onclick'=>'$("#jobDialog'.$timing[$i]['id'].$weekdays[6]['weekday'].'").dialog("open"); return false;',
        'update'=>'#jobDialog'.$timing[$i]['id'].$weekdays[6]['weekday'],'type' =>'GET','data'=>array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[6]['weekday'],'class_timing_id'=>$timing[$i]['id']),'dataType'=>'text',
        ),array('id'=>'showJobDialog'.$timing[$i]['id'].$weekdays[6]['weekday'])) ;
					}
					else
					{
						echo Yii::t('weekdays','Break');
					}			
					
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){echo $time_sub->name.'<br>';}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?','class'=>'delete'));
				}
							echo '</div>
							
						  </div>
						</div>
						<div id="jobDialog'.$timing[$i]['id'].$weekdays[6]['weekday'].'"></div>
					  </td>';  
			 }
			?><!--timetable_td -->
        
      </tr>
    <?php } ?>
  </tbody></table>
  </div>
</div><?php }
     else
	 {
		 echo '<i>'.Yii::t('weekdays','No Class Timings').'</i>';
        }}?>
     
 
	</div>
    </td>
      </tr></tbody>
</table>
 </div>