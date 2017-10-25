 <div class="emp_cont_left">
    <div class="empleftbx">
<div class="empimgbx" style="height:128px;">
    <ul>
    <li>
   <?php
   $student= Students::model()->findByAttributes(array('id'=>$_REQUEST['student_id']));
	 if($student->photo_file_name){ 
	 echo '<img  src="'.('/sms/index.php?r=students/students/DisplaySavedImage&id='.$student->primaryKey).'" alt="'.$student->photo_file_name.'" width="170" height="140" />';
   // echo '<img class="imgbrder" src="'.$this->createUrl('DisplaySavedImage&id='.$employee->primaryKey).'" alt="'.$employee->photo_file_name.'" width="170" height="140" />';
	 }else{
		echo '<img class="imgbrder" src="images/super_avatar.png" alt='.$student->first_name.' width="170" height="140" />'; 
	 }
	 ?>
     </li>
    <li class="img_text">
    	<div style="line-height:9px; margin:20px 0px 5px 0px; font-size:14px"><?php echo ucfirst($student->first_name).'&nbsp;'.ucfirst($student->last_name); ?></div>
        <a style="font-size:12px; color:#C30; padding-top:6px; display:block" href="#"><?php echo $student->email; ?></a>
    </li>
    </ul>
    </div>
    <div class="clear"></div>
    
    <div class="prof_detail">
    <ul>
    <li>
    <span><?php echo '<strong>'.Yii::t('students','Course&nbsp;:').'</strong>';?>&nbsp;
        <?php
		$posts=Batches::model()->findByPk($student->batch_id);
		if($posts!=NULL)
		echo $posts->course123->course_name
		 ?>
         </span></li>
         <li>
        <span><?php echo '<strong>'.Yii::t('students','Batch&nbsp;:').'</strong>';?>&nbsp;<?php
		$batch=Batches::model()->findByAttributes(array('id'=>$student->batch_id));
		if($batch!=NULL)
		 echo $batch->name; ?></span></li>
         <li>
        <span><?php echo '<strong>'.Yii::t('students','Adm No&nbsp;:').'</strong>';?>&nbsp;<?php echo $student->admission_no; ?></span></li>
        </ul>
    </div>
    <div class="clear"></div>
    
   
    <!--<div class="left_emp_navbx">
    <div class="left_emp_nav">
    <h2>Your Search</h2>
    <ul>
    <li><a class="icon_emp" href="#">Profile</a></li>
    <li><a href="#">Delete</a></li>
    <li><span class="activearrow"></span><a class="active" href="#">Leaves <span class="active"></span></a></li>
    <li><a class="last" href="#">More</a></li>
    </ul>
    </div>
    <div class="clear"></div>
    <div class="left_emp_btn"><a class="arrowsml" href="#">Saved Searches</a></div>
    </div>-->
    </div>
    
    </div>