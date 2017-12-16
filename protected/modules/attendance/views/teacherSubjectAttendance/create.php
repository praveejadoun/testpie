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
       


<?php echo $this->renderPartial('_form_1', array('model'=>$model)); ?>

        
       
    </td>
      </tr></tbody>
</table>
 </div>