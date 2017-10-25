<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Assessments',
);


?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <div class="emp_cont_left">
    <?php $this->renderPartial('profileleft');?>
    
    </div>
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    
    <h1 style="margin-top:.67em;"><?php echo Yii::t('students','Student Profile : ');?><?php echo $model->first_name.'&nbsp;'.$model->last_name; ?><br /></h1>
        
    <div class="edit_bttns last">
    <ul>
    <li>
    <?php echo CHtml::link(Yii::t('students','<span>Edit</span>'), array('update', 'id'=>$model->id),array('class'=>' edit ')); ?>
    </li>
     <li>
    <?php echo CHtml::link(Yii::t('students','<span>Students</span>'), array('students/manage'),array('class'=>'edit last'));?>
    </li>
    </ul>
    </div>
    
    
    <div class="clear"></div>
    <div class="emp_right_contner">
    <div class="emp_tabwrapper">
    <?php $this->renderPartial('tab');?>
    <div class="clear"></div>
    <div class="emp_cntntbx" >
    <?php
	$exam = StudentSubjects::model()->findAll("student_id=:x", array(':x'=>$_REQUEST['id']));
	?>
    <div class="tableinnerlist">
    <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
    
    <th><?php echo Yii::t('students','Subject');?></th>
   
    <th><?php echo Yii::t('students','Actions');?></th>
    </tr>

    <?php
	if($exam!=NULL){
		foreach($exam as $exams)
		{
			echo '<tr>';
//			$exm=Exams::model()->findByAttributes(array('id'=>$exams->exam_id));
//			$group=ExamGroups::model()->findByAttributes(array('id'=>$exm->exam_group_id));
//			
			$elective = Electives::model()->findByAttributes(array('id'=>$exams->subject_id));
                        echo '<td>'.$elective->name.'</td>';
			echo '<td>'.CHtml::link(Yii::t('students','Remove'), array('deleterow','id'=>$exams->id,'sid'=>$_REQUEST['id']), array('confirm' => 'Are you sure?')).'</td>';
                    
			echo '</tr>';
                }
	}
	else{
		echo '<tr>';
			echo '<td colspan="4"> No Electives Asiigned!</td>';
		echo '<tr>';
		
	}
	?>    </table>
    </div>
    </div>
    </div>
    
    </div>
    </div>
   
    </td>
  </tr>
</table>